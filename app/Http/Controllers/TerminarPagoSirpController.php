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

class TerminarPagoSirpController extends Controller
{
    public function __construct(Type $var = null) {
        MercadoPagoConfig::setAccessToken($_ENV['MP_ACCESS_TOKEN']);
        MercadoPagoConfig::setRuntimeEnviroment(MercadoPagoConfig::LOCAL);
    }

    public function TerminarPagoSirp(Request $request){
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
            "notification_url" => $url_base . '/api/procesar-estado-pago-sirp',
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
                        "id" => $request->input('id_paquete'),
                        "category_id" => "electronics",
                        "description" => "Paquete de pines para SIRP",
                        "quantity" => 1,
                        "title" => "Paquete de pines para SIRP",
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

            $id_paquete = $request->input("id_paquete");
            $apiUrl = "https://sirp.icp360rh.com/acciones/consultarInfopaquete.php?id=" . $id_paquete;
            $response = Http::get($apiUrl);
            $paquete = $response->json();
            $paquete = $paquete['paquete'];
          
            $payment = $client->create($createRequest, $request_options);
            if (in_array($payment->status, ['approved', 'in_process', 'pending'])) {
               
                self::guardarPedido(
                    $paquete['numero_pines'], 
                    $paquete['precio_pin'],
                    $paquete['total'],
                    $paquete['id'],
                    date('d-m-Y H:i:s'),
                    $createRequest['payer']['first_name'],
                    $createRequest['payer']['last_name'],
                    $createRequest['payer']['identification']['number'],
                    $createRequest['payer']['email'],
                    $payment->id
                );
                

                $emailController = new EmailController();
                $emailController->enviarCorreo(
                    3, 
                    $createRequest['payer']['email'], 
                    $createRequest['payer']['first_name'], 
                    $paquete['numero_pines'], 
                    $paquete['precio_pin'], 
                    $paquete['total'],
                    $payment->id
                );

                return redirect($payment->transaction_details->external_resource_url);
            }else{
                self::guardarPedido(
                    $paquete['numero_pines'], 
                    $paquete['precio_pin'],
                    $paquete['total'],
                    $paquete['id'],
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

    public function TerminarPagoTarjetaSirp(Request $request){
        $data = $request->all();

        if (
            !isset(
                $data['transactionAmount'], $data['token'], $data['description'], $data['installments'],
                $data['paymentMethodId'], $data['payer']['email'], 
                $data['payer']['identification']['type'], $data['payer']['identification']['number']
            )
        ) {
            return response()->json(['error' => 'Faltan datos requeridos en la solicitud.'], 400);
        }

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
                "notification_url" => $url_base . '/api/procesar-estado-pago-sirp',
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
                            "id" => $data['id_paquete'],
                            "category_id" => "electronics",
                            "description" => "Paquete de pines para SIRP",
                            "quantity" => 1,
                            "title" => "Paquete de pines para SIRP",
                            "unit_price" => (double) $data['transactionAmount'],
                        ]
                    ],
                    "payer" => [
                        "first_name" => strtolower($data['nombres']),
                        "last_name" => strtolower($data['apellidos']),
                    ]
                ],
            ];

            $id_paquete = $data["id_paquete"];
            $apiUrl = "https://sirp.icp360rh.com/acciones/consultarInfopaquete.php?id=" . $id_paquete;
            $response = Http::get($apiUrl);
            $paquete = $response->json();
            $paquete = $paquete['paquete'];

            $payment = $client->create($data_payment, $request_options);

            if (in_array($payment->status, ['approved', 'in_process', 'pending'])) {
                
                self::guardarPedido(
                    $paquete['numero_pines'], 
                    $paquete['precio_pin'],
                    $paquete['total'],
                    $paquete['id'],
                    date('d-m-Y H:i:s'),
                    $data['nombres'],
                    $data['apellidos'],
                    $data['payer']['identification']['number'],
                    $data['payer']['email'],
                    $payment->id
                );
                
                
                $emailController = new EmailController();
                $emailController->enviarCorreo(
                    3, 
                    $data['payer']['email'], 
                    $data['nombres'], 
                    $paquete['numero_pines'], 
                    $paquete['precio_pin'], 
                    $paquete['total'],
                    $payment->id
                );

                return response()->json($payment);
            }else{

                $emailController = new EmailController();
                $emailController->enviarCorreo(
                    3, 
                    $data['payer']['email'], 
                    $data['nombres'], 
                    $paquete['numero_pines'], 
                    $paquete['precio_pin'], 
                    $paquete['total'],
                    $payment->id
                );
                
                self::guardarPedido(
                    $paquete['numero_pines'], 
                    $paquete['precio_pin'],
                    $paquete['total'],
                    $paquete['id'],
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
        
            return response()->json([
                'error_message' => "Verifique los datos ingresados, e inténtelo nuevamente.",
                'statusCode' => $statusCode,
                'apiResponse' => $apiResponse,
            ], 500);
        }
    }

    public function guardarPedido($np, $pp, $t, $idp, $f, $n, $a, $c, $co, $ido){
        DB::table('pedidos_sirp')->insert([
            'pines_comprados' => $np,
            'precio_pin' => $pp,
            'total' => $t,
            'id_paquete' => $idp,
            'fecha' => $f,
            'nombres' => $n,
            'apellidos' => $a,
            'cedula' => $c,
            'correo' => $co,
            'id_orden' => (string) $ido
        ]);
    }

    public function procesarEstadoPagoSirp(Request $request){
        try {
            $paymentId = $request->input('data.id'); 

            $client = new PaymentClient();
            $payment = $client->get($paymentId);

            if ($payment->status === 'approved') {
                $response = $this->enviarCredenciales($payment->id);
            }else if ($payment->status === 'rejected' || $payment->status === 'cancelled') {
                $response = $this->enviarCorreoPagoRechazado($payment->id);
            }

            $response = json_decode(json_encode($response), true);
            return response()->json(['message' => $response["original"]["message"]], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function enviarCredenciales($payment_id){
        $id_orden = $payment_id;

        $pedido = DB::table('pedidos_sirp')
        ->where("id_orden", ''.$id_orden)
        ->where("estado", 0)
        ->first();

        if(!$pedido){
            return response()->json(['success' => false, 'message' => 'No se encontró el pedido'], 200);
        }else{
            $data = [
                'nombres' => $pedido->nombres,
                'apellidos' => $pedido->apellidos,
                'cedula' => $pedido->cedula,
                'correo' => $pedido->correo,
                'pines_comprados' => $pedido->pines_comprados,
                'precio_pin' => $pedido->precio_pin,
                'fecha' => $pedido->fecha,
                'total' => $pedido->total,
                'orden' => $pedido->id_orden
            ];
        
            $apiUrl = 'https://sirp.icp360rh.com/phpmailer/enviar-correo-credenciales.php'; 
            $response = Http::post($apiUrl, $data);
            $response = $response->json();
        
            if ($response[1] == 0) {
                $id_orden = $pedido->id_orden;
                DB::table('pedidos_sirp')
                ->where("id_orden" , $id_orden)
                ->update([
                    'estado' => 1
                ]);
                return response()->json(['success' => true, 'message' => $response[0]], 200);
            } else {
                return response()->json(['success' => false, 'message' => $response[0]], 200);
            }
        }
    }

    public function enviarCorreoPagoRechazado($payment_id){
        $id_orden = $payment_id;

        $pedido = DB::table('pedidos_sirp')
        ->where("id_orden", ''.$id_orden)
        ->where("estado", 0)
        ->first();

        if(!$pedido){
            return response()->json(['success' => false, 'message' => 'No se encontró el pedido rechazado'], 200);
        }else{
            $data = [
                'nombres_apellidos' => $pedido->nombres . ' ' . $pedido->apellidos,
                'correo' => $pedido->correo,
                'orden' => $pedido->id_orden
            ];

            $apiUrl = 'https://sirp.icp360rh.com/phpmailer/enviar-pago-rechazado.php'; 
            $response = Http::post($apiUrl, $data); 
            $response = $response->json();

            if ($response[1] == 0) {
                $id_orden = $pedido->id_orden;
                DB::table('pedidos_sirp')
                ->where("id_orden" , $id_orden)
                ->update([
                    'estado' => 1
                ]);
                return response()->json(['success' => true, 'message' => $response[0]], 200);
            } else {
                return response()->json(['success' => false, 'message' => $response[0]], 200);
            }
        }
    }
}