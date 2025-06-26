<!DOCTYPE html>
<html>

<head>
    <title>ICP - Compra de Pines</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/inicio/assets/img/icono-icp.png" rel="icon">
    <link href="/inicio/assets/img/icono-icp.png" rel="apple-touch-icon">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://sdk.mercadopago.com/js/v2"></script>
    <script src="https://www.mercadopago.com/v2/security.js" view="checkout" output="deviceId"></script>    
    <link rel="stylesheet" href="{{ asset('css/estilo_page_card.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    body {
        font-family: 'Nunito', sans-serif !important;
    }

    .navbar-dark .navbar-nav .nav-link:hover {
        color: rgba(0, 0, 0, .75);
    }

    .desc {
        width: fit-content;
        background-color: #ff6700;
        border-radius: 10px;
        padding: 1px;
        padding-left: 15px;
        padding-right: 15px;
        color: white;
    }
    </style>
</head>

<body>
    <input type="hidden" id="deviceId">
    <main>
        <nav class="navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="#"
                style="display: flex; justify-content: center; align-items: center; font-style: italic; font-size: 12px">
                <img width="50" src="/logo-icp.png" alt="">
                <p style="margin: 0px; font-size: 13px">Instituto Colombiano <br> de Psicometría</p>
            </a>
            <div class="collapse navbar-collapse" style="justify-content: end;">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-light my-2 my-sm-0" href="/"><i class="fa fa-home"
                                aria-hidden="true"></i> Inicio</a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- Hidden input to store your integration public key  -->
        <input type="hidden" id="mercado-pago-public-key" value="APP_USR-b2918513-7934-42e2-98ea-b146bb689cc9">
        <!-- Payment -->
        <section class="payment-form dark">
            <div class="container__payment" style="padding-top: 1%">
                <div class="form-payment row" style="max-width: 1300px">
                    <div class="products col-lg-4">
                        <h1 style="font-weight: bold; color: #0648486b0641; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); text-align: center; font-size: 30px" class="detalles">RESUMEN DEL PEDIDO</h1>
                        <div class="item" style="margin-top: 10px; padding: 17px; background-color: #f2f3f3;border-radius: 10px;color: #384551;">
                            <span class="price" id="summary-price"></span>
                            <h5 style="color: #171053"><strong>Servicio:</strong> {{ $desc_servicio }}</h5>
                            <h5 style="text-transform: capitalize">{{ $nombre }}</h5>
                            <hr>
                            <p class="item-name">
                                <strong><i class="fa fa-thumb-tack" aria-hidden="true"></i> Cantidad de pines:</strong> 
                                {{ $cantidad_pines }}
                            </p>
                            <p class="item-name">
                                <strong><i class="fa fa-money" aria-hidden="true"></i> Precio por pin: </strong>
                                ${{ number_format($valor_pin, 0, ',', '.') }}
                            </p>
                            <p class="item-name">
                                <strong><i class="fa fa-percent" aria-hidden="true"></i> Descuento: </strong>
                                <label class="desc">{{ $descuento }}%</label>
                            </p>
                            <div class="total">
                                <strong style="font-size: 2rem"><i class="fa fa-money" aria-hidden="true"></i> Total</strong>
                                <span class="price"id="summary-total">
                                    <strong style="font-size: 2rem">
                                        ${{ number_format($total, 0, ',', '.') }}
                                    </strong>
                                </span>
                            </div>
                        </div>
                         <br>
                        <div class="row" style="margin: 10px;">
                            <div class="col-12" style="padding: 10px; background-color: #3776ab47; border-radius: 10px; color: #000000;">
                                <p style="font-size: 10px; text-align: center;">
                                    <strong>🔒 Pago 100% Seguro con MercadoPago</strong> <br><br>
                                    Realiza tu compra con total tranquilidad. Utilizamos MercadoPago, la plataforma de pagos líder en América Latina, que garantiza la seguridad de tus datos y protege tu dinero en cada transacción.
                                    Tus datos están encriptados y protegidos bajo los más altos estándares de seguridad.
                                    <br>
                                    <br>
                                    ✅ Aceptamos tarjetas de crédito, débito y PSE.
                                </p>
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <img src="/img/mercadopago.png" alt="mercadopago" width="40%">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="payment-details col-lg-8 row">
                        <div class="col-12 row">
                            <div class="col-lg-6">
                                <div class="custom-option checked">
                                    <label
                                        class="form-check-label custom-option-content form-check-input-payment d-flex gap-4 align-items-center"
                                        for="customRadioVisa">
                                        <input name="customRadioTemp" class="form-check-input" type="radio"
                                            value="credit-card" id="customRadioVisa" checked>
                                        <span class="custom-option-body" style="margin-left: 10px">
                                            <img src="/assets/card.png" alt="visa-card" width="38"
                                                data-app-light-img="icons/payments/visa-light.png"
                                                data-app-dark-img="icons/payments/visa-dark.png">
                                            <span class="ms-4 fw-medium text-heading"> Tarjeta Crédito / Débito</span>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="custom-option">
                                    <label
                                        class="form-check-label custom-option-content form-check-input-payment d-flex gap-4 align-items-center"
                                        for="customRadioPSE">
                                        <input name="customRadioTemp" class="form-check-input" type="radio" value="pse"
                                            id="customRadioPSE">
                                        <span class="custom-option-body" style="margin-left: 10px">
                                            <img src="/assets/pse.png" alt="pse-card" width="38"
                                                data-app-light-img="icons/payments/visa-light.png"
                                                data-app-dark-img="icons/payments/visa-dark.png">
                                            <span class="ms-4 fw-medium text-heading"> Pago por PSE</span>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div id="card-form-pay" class="col-12" style="display: block">
                                <br>
                                <form id="form-checkout">
                                    @csrf
                                    <h3 class="detalles">Detalles del comprador</h3>
                                    <div class="row">
                                        <div class="form-group col">
                                            <input required id="form-checkout__cardholderEmail" name="cardholderEmail"
                                                type="email" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-sm-5">
                                            <select required id="form-checkout__identificationType1"
                                                name="identificationType" class="form-control"></select>
                                        </div>
                                        <div class="form-group col-sm-7">
                                            <input required id="form-checkout__identificationNumber" name="docNumber"
                                                type="text" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-sm-5">
                                            <input required id="form-nombres" name="nombres" type="text" class="form-control" placeholder="Nombres" />
                                        </div>
                                        <div class="form-group col-sm-7">
                                            <input required id="form-apellidos" name="apellidos" type="text" class="form-control" placeholder="Apellidos" />
                                        </div>
                                    </div>
                                    <br>
                                    <div style="position: relative">
                                        <h3 class="detalles">Detalles de la tarjeta</h3>
                                        <div id="contenedor_type_card" class="imagen_tarjeta_tipo">
                                            <img style="height: 70%; max-width: 100%;" src="" id="type_card" alt="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-sm-12">
                                            <input id="form-checkout__cardholderName" name="cardholderName" type="text"
                                                class="form-control" />
                                        </div>
                                        <div class="form-group col-sm-7">
                                            <div id="form-checkout__cardNumber" class="form-control h-40"></div>
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <div class="input-group expiration-date">
                                                <div id="form-checkout__expirationDate" class="form-control h-40"></div>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-2">
                                            <div id="form-checkout__securityCode" class="form-control h-40"></div>
                                        </div>
                                        <div id="issuerInput" class="form-group col-sm-12 hidden">
                                            <select id="form-checkout__issuer" name="issuer"
                                                class="form-control"></select>
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <select id="form-checkout__installments" name="installments" type="text"
                                                class="form-control"></select>
                                        </div>
                                        <div class="form-group col-sm-12" style="margin-bottom: 0px;">
                                            <button disabled="true" id="form-checkout__submit" type="submit"
                                                class="btn btn-primary btn-block">
                                                Continuar con el pago 
                                                <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div id="pse-pay" class="col-12" style="display: none">
                                <br>
                                <h3 class="detalles">Datos de facturación</h3>
                                <br>
                                <form onsubmit="return confirmPayment()" action="/procesar-pago" method="post">
                                    @csrf
                                    <input type="hidden" name="id_paquete" value="{{$id_paquete}}">
                                    <div class="row">
                                        <div class="col-4 mb-3">
                                            <label for="zipCode" class="form-label form-pse">Código Postal</label>
                                            <input required id="form-checkout__zipCode" name="zipCode" type="text"
                                                class="form-control">
                                        </div>
                                        <div class="col-8 mb-3">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label for="streetName" class="form-label form-pse">Dirección de
                                                        residencia</label>
                                                </div>
                                                <div class="col-6">
                                                    <input required id="form-checkout__streetName" name="streetName"
                                                        type="text" placeholder="Ej: Calle 00 # 9-00" class="form-control">
                                                </div>
                                                <div class="col-6">
                                                    <input required id="form-checkout__streetNumber" name="streetNumber"
                                                        type="text" placeholder="Complemento Ej: casa esquina" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="neighborhood" class="form-label form-pse">Barrio</label>
                                            <input required id="form-checkout__neighborhood" name="neighborhood"
                                                type="text" class="form-control">
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="federalUnit" class="form-label form-pse">Departamento</label>
                                            <select required id="form-checkout__federalUnit" name="federalUnit"
                                                class="form-control">
                                                <option value="">Seleccione un departamento</option>
                                            </select>
                                        </div>
                                        <div class="col-5 mb-3">
                                            <label for="city" class="form-label form-pse">Ciudad</label>
                                            <input required id="form-checkout__city" name="city" type="text"
                                                class="form-control">
                                        </div>
                                        <div class="col-7 mb-3">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label for="phoneNumber" class="form-label form-pse">Número de
                                                        Teléfono</label>
                                                </div>
                                                <div class="col-4">
                                                    <input required id="form-checkout__phoneAreaCode"
                                                        placeholder="(300)" name="phoneAreaCode" class="form-control"
                                                        type="text">
                                                </div>
                                                <div class="col-8">
                                                    <input required id="form-checkout__phoneNumber"
                                                        placeholder="(000 1111)" name="phoneNumber" type="text"
                                                        class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="email" class="form-label form-pse">Correo Electrónico</label>
                                            <input required id="form-checkout__email" name="email" type="text"
                                                class="form-control">
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="personType" class="form-label form-pse">Tipo de Persona</label>
                                            <select required id="form-checkout__personType" name="personType"
                                                class="form-control">
                                                <option value="natural">Natural</option>
                                                <option value="juridica">Jurídica</option>
                                            </select>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="identificationType" class="form-label form-pse">Tipo de
                                                Documento</label>
                                            <select required id="form-checkout__identificationType"
                                                name="identificationType" class="form-control">
                                            </select>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="identificationNumber"
                                                class="form-label form-pse">Documento</label>
                                            <input required id="form-checkout__identificationNumber"
                                                name="identificationNumber" type="text" class="form-control">
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="firstName" class="form-label form-pse">Nombres</label>
                                            <input required id="form-first_name" name="firstName" type="text"
                                                class="form-control">
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="lastName" class="form-label form-pse">Apellidos</label>
                                            <input required id="form-last_name" name="lastName" type="text"
                                                class="form-control">
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label for="banksList" class="form-label form-pse">Banco</label>
                                            <div id="banksList" class="form-control-plaintext"></div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="transactionAmount" id="transactionAmount"
                                        value="{{$total}}">
                                    <input type="hidden" name="description" id="description" value="{{$desc_servicio}}">
                                    <div class="d-grid gap-2">
                                        <button type="submit" style="width: 100%" class="btn btn-primary">Continuar con
                                            el pago <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Result -->
        <section class="shopping-cart dark">
            <div class="container container__result">
                <div class="block-heading" style="padding-top: 45;">
                    <h2>Resultado de la transacción </h2>
                </div>
                <div class="content">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="items product info product-details">
                                <div class="row justify-content-md-center">
                                    <div class="col-md-4 product-detail">
                                        <div class="product-info">
                                            <div id="fail-response" style="display: block;text-align: center;">
                                                <br>
                                                <img src="/img/fail.png" width="100px">
                                                <p class="text-center font-weight-bold" style="font-size: 23px;font-weight: bold !important;!i;!;">Ocurrió un error durante el proceso de pago</p>
                                                <hr>
                                                <p id="error-message" class="text-center" style="font-size: 21px;"></p>
                                                <br>
                                                <button onclick="location.reload();" style="margin-bottom: 20px;" class="btn btn-warning">Intentar Pago Nuevamente <i class="fa fa-refresh" aria-hidden="true"></i></button>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="text-center text-white" style="background-color: #343a40;">
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            <a class="text-white" href="https://mdbootstrap.com/">Instituto Colombiano de Psicometría ICP - Todos los
                derechos reservados</a>
            © 2024 Copyright:
        </div>
        <!-- Copyright -->
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        var id_paquete = "{{$id_paquete}}";

        document.querySelectorAll('input[name="customRadioTemp"]').forEach(input => {
            input.addEventListener('change', function() {
                document.querySelectorAll('.custom-option').forEach(option => {
                    option.classList.remove('checked');
                });


                var custom_option = document.querySelectorAll('.custom-option');
                var tipo = this.value;

                if (tipo === 'pse') {
                    custom_option[1].classList.add('checked');
                    $('#card-form-pay').fadeOut(300, function() {
                        $('#pse-pay').fadeIn(300);
                    });
                } else {
                    custom_option[0].classList.add('checked');
                    $('#pse-pay').fadeOut(300, function() {
                        $('#card-form-pay').fadeIn(300);
                    });
                }

            });
        });

        var tipo = this.value;
        if (tipo === 'pse') {
            $('#card-form-pay').fadeOut(300, function() {
                $('#pse-pay').fadeIn(300);
            });
        } else {
            $('#pse-pay').fadeOut(300, function() {
                $('#card-form-pay').fadeIn(300);
            });
        }
    </script>

    <script>
        const publicKey = document.getElementById("mercado-pago-public-key").value;
        const mercadopago = new MercadoPago(publicKey);

        function loadCardForm() {
            const productCost = "{{$total}}";
            const productDescription = "{{$desc_servicio}}"+" - "+"{{$nombre}}";

            const form = {
                id: "form-checkout",
                cardholderName: {
                    id: "form-checkout__cardholderName",
                    placeholder: "Nombre de la titular",
                },
                cardholderEmail: {
                    id: "form-checkout__cardholderEmail",
                    placeholder: "E-mail",
                },
                cardNumber: {
                    id: "form-checkout__cardNumber",
                    placeholder: "Número de tarjeta",
                    style: {
                        fontSize: "14px"
                    },
                },
                expirationDate: {
                    id: "form-checkout__expirationDate",
                    placeholder: "MM/YYYY",
                    style: {
                        fontSize: "14px"
                    },
                },
                securityCode: {
                    id: "form-checkout__securityCode",
                    placeholder: "CVV",
                    style: {
                        fontSize: "14px"
                    },
                },
                installments: {
                    id: "form-checkout__installments",
                    placeholder: "Cuotas",
                },
                identificationType: {
                    id: "form-checkout__identificationType1",
                },
                identificationNumber: {
                    id: "form-checkout__identificationNumber",
                    placeholder: "Número de identificación",
                },
                issuer: {
                    id: "form-checkout__issuer",
                    placeholder: "Issuer",
                },
            };

            const cardForm = mercadopago.cardForm({
                amount: productCost,
                iframe: true,
                form,
                callbacks: {
                    onFormMounted: error => {
                        if (error)
                            return console.warn("Form Mounted handling error: ", error);
                        console.log("Form mounted");
                    },
                    onSubmit: event => {
                        event.preventDefault();
                    
                        Swal.fire({
                            title: 'Procesando el pago',
                            html: 'Por favor espera, puede tardar varios segundos...',
                            allowOutsideClick: false,
                            didOpen: () => {
                                Swal.showLoading();
                            }
                        });

                        const {
                            paymentMethodId,
                            issuerId,
                            cardholderEmail: email,
                            amount,
                            token,
                            installments,
                            identificationNumber,
                            identificationType,
                        } = cardForm.getCardFormData();

                        fetch("/procesar-pago-tarjeta", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                            },
                            body: JSON.stringify({
                                _token: document.querySelector('input[name="_token"]').value,
                                id_paquete: id_paquete,
                                token,
                                issuerId,
                                paymentMethodId,
                                transactionAmount: Number(amount),
                                installments: Number(installments),
                                description: productDescription,
                                nombres: document.getElementById("form-nombres").value,
                                apellidos: document.getElementById("form-apellidos").value,
                                deviceId: document.getElementById("deviceId").value,
                                payer: {
                                    email,
                                    identification: {
                                        type: identificationType,
                                        number: identificationNumber,
                                    },
                                },
                            }),
                        }).then(response => {
                            swal.close()
                            var respuesta = response.json();
                            return respuesta;
                        }).then(result => {
                            swal.close();
                            if (!result.hasOwnProperty("error_message")) {
                                const baseurl = `${window.location.origin}`;
                                const payment_id = result.id;
                                const redirectUrl = `${baseurl}/estado-pago?payment_id=${payment_id}`;
                                window.open(redirectUrl, '_self');
                            } else {
                                document.getElementById("error-message").textContent = result.error_message;
                                document.getElementById("fail-response").style.display = "block";
                                $('.container__payment').fadeOut(500);
                                setTimeout(() => {
                                    $('.container__result').show(500).fadeIn();
                                }, 500);
                            }
                        }).catch(error => {
                            document.getElementById("error-message").textContent = "Ocurrió un error, intente mas tarde";
                            document.getElementById("fail-response").style.display = "block";
                            $('.container__payment').fadeOut(500);
                            setTimeout(() => {
                                $('.container__result').show(500).fadeIn();
                            }, 500);
                        });
                    },
                    onFetching: (resource) => {
                        console.log("Fetching resource: ", resource);
                    },
                    onPaymentMethodsReceived: (error, paymentMethods) => {
                        if (paymentMethods) {
                            if (paymentMethods.length >= 1) {
                                document.getElementById("contenedor_type_card").style.display = "block";
                                document.getElementById("type_card").setAttribute("src", paymentMethods[0].thumbnail)
                            }
                            document.getElementById("form-checkout__submit").removeAttribute("disabled");
                        } else {
                            document.getElementById("type_card").setAttribute("src", "");
                            document.getElementById("contenedor_type_card").style.display = "none";
                            document.getElementById("form-checkout__submit").setAttribute('disabled', true);
                        }
                    },
                    onCardTokenReceived: (errorData, token) => {
                        if (errorData && errorData.error.fieldErrors.length !== 0) {
                            errorData.error.fieldErrors.forEach(errorMessage => {
                                alert(errorMessage);
                            });
                        }
                        return token;
                    },
                    onValidityChange: (error, field) => {
                        const input = document.getElementById(form[field].id);
                        addFieldErrorMessages(input, error);
                    },
                    onError: (error, event) => {
                        const errorMessages = [{
                                message: "El nombre del titular no puede estar vació."
                            },
                            {
                                message: "El número de tarjeta debe tener una longitud entre '8' y '19'."
                            },
                            {
                                message: "El código de seguridad debe tener una longitud de '3' o '4'."
                            },
                            {
                                message: "El año de expiración debe tener una longitud de '2' o '4'."
                            },
                            {
                                message: 'El mes de expiración debe ser un valor entre 1 y 12.'
                            },
                            {
                                message: 'El año de expiración debe ser mayor o igual al año actual.'
                            }
                        ];

                        const formattedMessages = errorMessages.map(error =>
                            `<li class="error-mensaje-tarjeta">${error.message}</li>`).join('');


                        Swal.fire({
                            title: 'Error de validación',
                            html: `<strong>Tenga en cuenta lo siguiente </strong><br><br><ul style="text-align: left;">${formattedMessages}</ul>`,
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                },
            });
        };

        function addFieldErrorMessages(input, error) {
            if (error) {
                input.classList.add('validation-error');
            } else {
                input.classList.remove('validation-error');
            }
        }

        loadCardForm();
    </script>

    <script>
        document.getElementById('form-checkout__personType').addEventListener('change', e => {
            const personTypesElement = document.getElementById('form-checkout__personType');
            updateSelectOptions(personTypesElement.value);
        });

        function updateSelectOptions(selectedValue) {

            const naturalDocTypes = [
                new Option('C.C', 'CC'),
                new Option('C.E.', 'CE')
            ];
            const juridicaDocTypes = [
                new Option('NIT', 'NIT')
            ];
            const idDocTypes = document.getElementById('form-checkout__identificationType');


            if (selectedValue === 'natural') {
                idDocTypes.options.length = 0;
                naturalDocTypes.forEach(
                    item => idDocTypes.options.add(item, undefined)
                );
            } else {
                idDocTypes.options.length = 0;
                juridicaDocTypes.forEach(item => idDocTypes.options.add(item, undefined));
            }
        }

        function setPse() {
            fetch('/metodos-pago')
                .then(async function(response) {
                    const paymentMethods = await response.json();
                    const pse = paymentMethods.filter((method) => method.id === 'pse')[0];
                    const banksList = pse.financial_institutions;
                    const banksListElement = document.getElementById('banksList');
                    const selectElement = document.createElement('select');
                    selectElement.name = 'financialInstitution';
                    selectElement.classList.add('form-control');

                    banksList.forEach(bank => {
                        const option = document.createElement('option');
                        option.value = bank.id;
                        option.textContent = bank.description;
                        selectElement.appendChild(option);
                    });

                    banksListElement.appendChild(selectElement);

                }).catch(function(reason) {
                    console.error('Failed to get payment methods', reason);
                });
        }


        (function initCheckout() {
            try {
                const docTypeElement = document.getElementById('form-checkout__identificationType');
                setPse();
                updateSelectOptions('natural')
            } catch (e) {
                return console.error('Error getting identificationTypes: ', e);
            }
        })();

        var departamentos = [
            "Amazonas", "Antioquia", "Arauca", "Atlántico", "Bogotá", "Bolívar", "Boyacá",
            "Caldas", "Caquetá", "Casanare", "Cauca", "Cesar", "Chocó", "Córdoba",
            "Cundinamarca", "Guainía", "Guaviare", "Huila", "La Guajira", "Magdalena",
            "Meta", "Nariño", "Norte de Santander", "Putumayo", "Quindío", "Risaralda",
            "San Andrés y Providencia", "Santander", "Sucre", "Tolima", "Valle del Cauca",
            "Vaupés", "Vichada"
        ];


        function setDepartamentos() {
            const select = document.getElementById('form-checkout__federalUnit');
            departamentos.forEach(departamento => {
                const option = document.createElement('option');
                option.value = departamento;
                option.textContent = departamento;
                select.appendChild(option);
            });
        }

        setDepartamentos();

        function confirmPayment() {
            return window.confirm("¿Sera redirigido a la pagina del banco seleccionado para proceder con el pago?");
        }
    </script>
</body>

</html>