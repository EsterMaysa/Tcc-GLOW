<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/animate/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/css-hamburgers/hamburgers.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/select2/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/util.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cadfarmacia.css')}}">

    <title>Cadastro de Farmácia | FarmaSUS</title>
    <link rel="shortcut icon" href="{{ asset('Image/favicon (1).ico') }}" type="image/x-icon">
</head>
<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt id="logo">
                    <img src="{{ asset('Image/logoFarma.png') }}" alt="IMG" width="120%">
                </div>

                <form class="login100-form validate-form" action="/farmacia" method="POST">
                         @csrf

                    <span class="login100-form-title" style="font-size: 20px;">
                        Cadastro | Farmácia
                    </span>

                    <div class="row">
                        <div class="col-md-6">
                            <!-- Campo Nome -->
                            <div class="wrap-input100 validate-input" data-validate="Nome é obrigatório">
                                <input class="input100" type="text" name="nome" placeholder="Nome da Farmácia" required>
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="fa fa-hospital-o" aria-hidden="true"></i>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!-- Campo Email -->
                            <div class="wrap-input100 validate-input" data-validate="Email válido é obrigatório: ex@abc.xyz">
                                <input class="input100" type="email" name="email" placeholder="Email" required>
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <!-- Campo uf -->
                            <div class="wrap-input100 validate-input" data-validate="UF é obrigatório">
                                <input class="input100" type="text" name="uf" placeholder="UF" required>
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="fa fa-location-arrow" aria-hidden="true"></i>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!-- Campo CNPJ -->
                            <div class="wrap-input100 validate-input" data-validate="CNPJ válido é obrigatório">
                                <input class="input100" type="text" name="cnpj" placeholder="CNPJ" required>
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="fa fa-file-text" aria-hidden="true"></i>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <!-- Campo Telefone -->
                            <div class="wrap-input100 validate-input" data-validate="Telefone é obrigatório">
                                <input class="input100" type="tel" name="numero" placeholder="numero" required>
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!-- Campo CEP -->
                            <div class="wrap-input100 validate-input" data-validate="CEP é obrigatório">
                                <input class="input100" type="text" name="cep" placeholder="CEP" required>
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="fa fa-location-arrow" aria-hidden="true"></i>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <!-- Campo Cidade -->
                            <div class="wrap-input100 validate-input" data-validate="Cidade é obrigatória">
                                <input class="input100" type="text" name="cidade" placeholder="Cidade" required>
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!-- Campo Bairro -->
                            <div class="wrap-input100 validate-input" data-validate="Bairro é obrigatório">
                                <input class="input100" type="text" name="bairro" placeholder="Bairro" required>
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <!-- Campo Estado -->
                            <div class="wrap-input100 validate-input" data-validate="Estado é obrigatório">
                                <input class="input100" type="text" name="estado" placeholder="Estado" required>
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!-- Campo Complemento -->
                            <div class="wrap-input100 validate-input">
                                <input class="input100" type="text" name="complemento" placeholder="Complemento">
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <!-- Campo lougradouro -->
                            <div class="wrap-input100 validate-input" data-validate="logradouro é obrigatório">
                                <input class="input100" type="text" name="logradouro" placeholder="logradouro" required>
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="wrap-input100 validate-input" data-validate="Senha é obrigatória">
                                <input class="input100" type="password" name="senha" placeholder="Senha" required>
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="fa fa-lock" aria-hidden="true"></i>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn"  type="submit" > Cadastrar </button>
                    </div>

                    <div class="text-center p-t-24" style="margin-left: 50px;">
                        <a class="txt2" href="/loginFarmacia"> Já possui um cadastro? <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i></a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal de Confirmação 
    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalLabel">Confirmação de Cadastro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Farmácia cadastrada com sucesso!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="window.location.href='/homeFarmacia'"> Ir para Dashboard </button>
                </div>
            </div>
        </div>
    </div>-->

    <script src="{{ asset('vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
    <script src="{{ asset('vendor/tilt/tilt.jquery.min.js') }}"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>