<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MercadoPago\Client\Common\RequestOptions;
use MercadoPago\Client\Payment\PaymentClient;
use MercadoPago\MercadoPagoConfig;
use MercadoPago\Client\PaymentMethod\PaymentMethodClient;
use MercadoPago\Exceptions\MPApiException;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

use App\Http\Controllers\EmailController;

class ServiciosController extends Controller
{
    public function __construct(Type $var = null) {
        MercadoPagoConfig::setAccessToken($_ENV['MP_ACCESS_TOKEN']);
        MercadoPagoConfig::setRuntimeEnviroment(MercadoPagoConfig::LOCAL);
    }

    public function formularioPagoServicios($id_servicio, $modalidad){
        $servicio = DB::table('icp.servicios')->where('id', $id_servicio)->first();

        if($modalidad == 'presencial'){
            $total = $servicio->costo_presencial;
        }else{
            $total = $servicio->costo_virtual;
        }

        $modalidad = ucfirst($modalidad);

        return view('formularioPagoServicios', compact('servicio', 'modalidad', 'total', 'id_servicio'));
    }

    public function TerminarPagoServicios(Request $request){
        $client = new PaymentClient();
        $request_options = new RequestOptions();
        $idempotencyKey = Str::random(25);
        $device_id = $request->input('deviceId');
        $request_options->setCustomHeaders(
            [
                "X-Idempotency-Key: $idempotencyKey",
                "X-meli-session-id: $device_id"
            ]
        );
    
        $client = new PaymentClient();

        $url_base = $baseUrl = url('/');
        
        $createRequest = [
            "transaction_amount" => (double) $request->input('transactionAmount'),
            "description" =>  $request->input('description'),
            "payment_method_id" => "pse",
            "external_reference" => $url_base . '/estado-pago',
            "callback_url" => $url_base . '/estado-pago',
            "notification_url" => $url_base . '/api/procesar-estado-pago-servicios',
            "transaction_details" => [
                "financial_institution" => $request->input('financialInstitution'),
            ],
            "payer" => [
                "email" => $request->input('email'),
                "entity_type" => "individual",
                "first_name" => strtolower($request->input('firstName')),
                "last_name" => strtolower($request->input('lastName')),
                "identification" => [
                    "type" => $request->input('identificationType'),
                    "number" => $request->input('identificationNumber'),
                ],
                "address" => [
                    "zip_code" => $request->input('zipCode'),
                    "street_name" => $request->input('streetName'),
                    "street_number" => $request->input('streetNumber'),
                    "neighborhood" => $request->input('neighborhood'),
                    "city" => $request->input('city'),
                    "federal_unit" => $request->input('federalUnit'),
                ],
                "phone" => [
                    "area_code" => $request->input('phoneAreaCode'),
                    "number" => $request->input('phoneNumber'),
                ],
            ],
            "statement_descriptor" => "ICP",
            "additional_info" => [
                "ip_address" => $request->ip(),
                "items" => [   
                    [
                        "id" => $request->input('id_servicio'),
                        "category_id" => "electronics",
                        "description" => $request->input('description'),
                        "quantity" => 1,
                        "title" => $request->input('description'),
                        "unit_price" => (double) $request->input('transactionAmount'),
                    ]
                ],
                "payer" => [
                    "first_name" => strtolower($request->input('firstName')),
                    "last_name" => strtolower($request->input('lastName')),
                ]
            ],
        ];

        try {

            $id_servicio = $request->input("id_servicio");
            $servicio = DB::table('icp.servicios')->where('id', $id_servicio)->first();

            $transaction_amount = $request->input('transactionAmount');
            $modalidad = $request->input('modalidad');

            $payment = $client->create($createRequest, $request_options);
            if (in_array($payment->status, ['approved', 'in_process', 'pending'])) {
               
                self::guardarPedido(
                    $servicio->id,
                    $transaction_amount,
                    $modalidad,
                    date('d-m-Y H:i:s'),
                    $createRequest['payer']['first_name'],
                    $createRequest['payer']['last_name'],
                    $createRequest['payer']['identification']['number'],
                    $createRequest['payer']['email'],
                    $payment->id
                );
                

                $emailController = new EmailController();
                $emailController->enviarCorreoServicios(
                    $createRequest['payer']['email'], 
                    $createRequest['payer']['first_name'] . ' ' . $createRequest['payer']['last_name'], 
                    $servicio->nombre, 
                    $modalidad, 
                    $transaction_amount,
                    $payment->id
                );

                return redirect($payment->transaction_details->external_resource_url);
            }else{
                self::guardarPedido(
                    $servicio->id,
                    $transaction_amount,
                    $modalidad,
                    date('d-m-Y H:i:s'),
                    $createRequest['payer']['first_name'],
                    $createRequest['payer']['last_name'],
                    $createRequest['payer']['identification']['number'],
                    $createRequest['payer']['email'],
                    $payment->id
                );
            }
            
        } catch (MPApiException $e) {            
            $errorMessage = $e->getMessage();
            $statusCode = $e->getStatusCode();
            $apiResponse = $e->getApiResponse();
        
            return redirect()->route('error.page')->with([
                'errorMessage' => $errorMessage,
                'statusCode' => $statusCode,
                'apiResponse' => $apiResponse,
            ]);
        }
    }

    public function TerminarPagoTarjetaServicios(Request $request){
        $data = $request->all();

        $client = new PaymentClient();
        $request_options = new RequestOptions();
        $idempotencyKey = Str::random(32);
        $device_id = $data['deviceId'];

        $request_options->setCustomHeaders(
            [
                "X-Idempotency-Key: $idempotencyKey",
                "X-meli-session-id: $device_id"
            ]
        );

        try {
            $url_base = $baseUrl = url('/');

            $data_payment = [
                "transaction_amount" => (float) $data['transactionAmount'],
                "token" => $data['token'],
                "description" => $data['description'],
                "installments" => (int) $data['installments'],
                "payment_method_id" => $data['paymentMethodId'],
                "issuer_id" => $data['issuerId'] ?? null,
                "external_reference" => $url_base . '/estado-pago',
                "notification_url" => $url_base . '/api/procesar-estado-pago-servicios',
                "payer" => [
                    "first_name" => $data['nombres'],
                    "last_name" => $data['apellidos'],
                    "email" => $data['payer']['email'],
                    "identification" => [
                        "type" => $data['payer']['identification']['type'],
                        "number" => $data['payer']['identification']['number'],
                    ],
                ],
                "statement_descriptor" => 'ICP',
                "additional_info" => [
                    "ip_address" => $request->ip(),
                    "items" => [   
                        [
                            "id" => $data['id_servicio'],
                            "category_id" => "electronics",
                            "description" => $data['description'],
                            "quantity" => 1,
                            "title" => $data['description'],
                            "unit_price" => (double) $data['transactionAmount'],
                        ]
                    ],
                    "payer" => [
                        "first_name" => strtolower($data['nombres']),
                        "last_name" => strtolower($data['apellidos']),
                    ]
                ],
            ];

            $payment = $client->create($data_payment, $request_options);

            if (in_array($payment->status, ['approved', 'in_process', 'pending'])) {
                
                self::guardarPedido(
                    $data['id_servicio'], 
                    $data['transactionAmount'],
                    $data['modalidad'],
                    date('d-m-Y H:i:s'),
                    $data['nombres'],
                    $data['apellidos'],
                    $data['payer']['identification']['number'],
                    $data['payer']['email'],
                    $payment->id
                );
                
                
                $emailController = new EmailController();
                $emailController->enviarCorreoServicios(
                    $data['payer']['email'], 
                    $data['nombres'] . ' ' . $data['apellidos'], 
                    $data['description'], 
                    $data['modalidad'], 
                    $data['transactionAmount'],
                    $payment->id
                );

                return response()->json($payment);
            }else{

                $emailController = new EmailController();
                $emailController->enviarCorreoServicios(
                    $data['payer']['email'], 
                    $data['nombres'] . ' ' . $data['apellidos'], 
                    $data['description'], 
                    $data['modalidad'], 
                    $data['transactionAmount'],
                    $payment->id
                );
                
                self::guardarPedido(
                    $data['id_servicio'], 
                    $data['transactionAmount'],
                    $data['modalidad'],
                    date('d-m-Y H:i:s'),
                    $data['nombres'],
                    $data['apellidos'],
                    $data['payer']['identification']['number'],
                    $data['payer']['email'],
                    $payment->id
                );
                
                return response()->json([
                    'error_message' => "Verifique los datos ingresados, e inténtelo nuevamente.",
                ], 500);
            }
        } catch (MPApiException $e) {
            $errorMessage = $e->getMessage();
            $statusCode = $e->getStatusCode();
            $apiResponse = $e->getApiResponse();

            dd($errorMessage, $statusCode, $apiResponse);
        
            return response()->json([
                'error_message' => "Verifique los datos ingresados, e inténtelo nuevamente.",
                'statusCode' => $statusCode,
                'apiResponse' => $apiResponse,
            ], 500);
        }
    }

    public function guardarPedido($id_servicio, $total, $modalidad, $fecha, $nombres, $apellidos, $cedula, $correo, $id_orden){
        DB::table('icp.pedidos')->insert([
            'id_servicio' => $id_servicio,
            'total' => $total,
            'modalidad' => $modalidad,
            'fecha' => $fecha,
            'nombres' => $nombres,
            'apellidos' => $apellidos,
            'identificacion' => $cedula,
            'email' => $correo,
            'id_orden' => (string) $id_orden,
            'estado' => 0
        ]);
    }

    public function procesarEstadoPagoServicios(Request $request){
        \Log::info('Datos del request de MercadoPago:', $request->all());
        try {
            // 1. Intenta extraer el ID desde data.id
            $paymentId = $request->input('data.id');

            // 2. Si no viene, intenta usar el campo raíz "id"
            if (!$paymentId) {
                $paymentId = $request->input('id');
            }

            // 4. Consultar estado del pago en MercadoPago
            $client = new PaymentClient();
            $payment = $client->get((int)$paymentId);

            
            if ($payment->status === 'approved') {
                $response = $this->enviarCredenciales($payment->id);
            }else if ($payment->status === 'rejected' || $payment->status === 'cancelled') {
                $response = $this->enviarCorreoPagoRechazado($payment->id);
            }

            return response()->json(['message' => $response['message']], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function enviarCredenciales($payment_id){
        $id_orden = $payment_id;

        $pedido = DB::table('icp.pedidos')
        ->where("id_orden", ''.$id_orden)
        ->where("estado", 0)
        ->first();

        if(!$pedido){
            return ['success' => false, 'message' => 'No se encontró el pedido'];
        }else{
            
            $emailController = new EmailController();
            $response = $emailController->enviarCorreoPagoServicios(
                $pedido->email, 
                $pedido->nombres . ' ' . $pedido->apellidos, 
                $pedido->id_servicio, 
                $pedido->modalidad, 
                $pedido->total,
                $pedido->id_orden,
                1
            );

            if ($response == 0) {
                DB::table('icp.pedidos')
                ->where("id_orden" , $id_orden)
                ->update([
                    'estado' => 1
                ]);
                return ['success' => true, 'message' => 'Pedido procesado correctamente'];
            } else {
                return ['success' => false, 'message' => 'Error al procesar el pedido'];
            }
        }
    }


    public function enviarCorreoPagoRechazado($payment_id){
        $id_orden = $payment_id;

        $pedido = DB::table('icp.pedidos')
        ->where("id_orden", ''.$id_orden)
        ->where("estado", 0)
        ->first();

        if(!$pedido){
            return ['success' => false, 'message' => 'No se encontró el pedido'];
        }else{
            $emailController = new EmailController();
            $response = $emailController->enviarCorreoPagoServicios(
                $pedido->email, 
                $pedido->nombres . ' ' . $pedido->apellidos, 
                $pedido->id_servicio, 
                $pedido->modalidad, 
                $pedido->total, 
                $pedido->id_orden,
                2
            );

            if ($response == 0) {
                DB::table('icp.pedidos')
                ->where("id_orden" , $id_orden)
                ->update([
                    'estado' => 1
                ]);
                return ['success' => true, 'message' => 'Pedido procesado correctamente'];
            } else {
                return ['success' => false, 'message' => 'Error al procesar el pedido'];
            }
        }
    }
}