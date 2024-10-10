    @include('includes.headerFarmacia')

    <!-- Main content -->
    <div class="col-md-9 col-lg-10 main-content">
        <div class="head-title">
            <div class="left">
                <h1>Editar Quantidade de Medicamento</h1>
                <ul class="breadcrumb">
                    <li><a href="/">Home</a></li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li><a class="active" href="/">Editar Quantidade</a></li>
                </ul>
            </div>
        </div>

        <!-- Mensagens de Sucesso e Erro -->
        <div class="messages">
            @if (session('success_messages'))
                <div class="alert alert-success">
                    {{ session('success_messages') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <!-- Formulário para editar a quantidade -->
        <div class="form-wrapper">
            <form action="{{ url('/medicamentos') }}" method="POST" class="styled-form">
                @csrf <!-- Token de segurança do Laravel -->
                @method('PUT') <!-- Método HTTP PUT para atualizar -->

                <!-- Campo oculto para o ID do Medicamento -->
                <input type="hidden" name="idMedicamento" value="{{ $medicamento->idMedicamento }}">

                <!-- Nome do Medicamento (apenas visualização) -->
                <div class="form-group">
                    <label for="nomeMedicamento">Nome do Medicamento:</label>
                    <input type="text" id="nomeMedicamento" name="nomeMedicamento" value="{{ $medicamento->nomeMedicamento }}" readonly>
                </div>

                <!-- Quantidade do Medicamento -->
                <div class="form-group">
                    <label for="quantMedicamento">Quantidade Atual:</label>
                    <input type="number" id="quantMedicamento" name="quantMedicamento" value="{{ $medicamento->quantMedicamento }}" required min="1">
                </div>

                <!-- Botão para Salvar Alterações -->
                <div class="form-group button-wrapper">
                    <button type="submit" class="submit-btn">Atualizar Quantidade</button>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>

    @include('includes.footer')

    <!-- Estilos CSS -->
    <style>
        .messages {
            margin-bottom: 20px;
            text-align: center;
        }

        .alert {
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
            display: inline-block;
            width: 100%;
            max-width: 400px;
            margin-left: auto;
            margin-right: auto;
        }

        .alert-success {
            background-color: #4CAF50; /* Cor de fundo verde clara */
            color: #155724; /* Texto verde */
        }

        .alert-danger {
            background-color: #f8d7da; /* Cor de fundo vermelha clara */
            color: #721c24; /* Texto vermelho */
            border: 1px solid #f5c6cb; /* Borda vermelha clara */
        }

        .styled-form {
            background-color: #265C4B; /* Verde escuro */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
            margin: 0 auto;
        }

        .form-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 80vh;
        }

        .form-group label {
            display: block;
            font-weight: 600;
            margin-bottom: 6px;
            color: #fff;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #ddd;
            font-size: 14px;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #8FC1B5;
            box-shadow: 0 0 4px rgba(87, 184, 255, 0.3);
        }

        .submit-btn {
            padding: 12px 25px;
            background-color: #2E8B57;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .submit-btn:hover {
            background-color: #3CB371;
        }

        @media (max-width: 768px) {
            .styled-form {
                max-width: 90%;
            }

            .head-title h1 {
                font-size: 1.5em;
            }

            .submit-btn {
                font-size: 14px;
            }

            .breadcrumb li a {
                font-size: 14px;
            }
        }

        @media (max-width: 576px) {
            .styled-form {
                padding: 20px;
            }

            .form-group input,
            .form-group textarea {
                font-size: 12px;
            }

            .submit-btn {
                padding: 10px 20px;
            }
        }
    </style>
