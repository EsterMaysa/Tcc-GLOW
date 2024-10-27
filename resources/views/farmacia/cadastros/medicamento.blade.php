@include('includes.headerFarmacia')
        <!-- Main content -->
        <div class="col-md-9 col-lg-10 main-content">

                <!-- Relatórios de Estoque -->
                <div class="card">
                    <div class="card-header">
                        Cadastro do medicamento                    
                    </div>
                    <div class="card-body">
                        <div class="form-wrapper">
                            <form action="/MedicamentoSus" method="POST" class="styled-form">
                                @csrf <!-- Token de segurança do Laravel -->

                                <div class="form-group">
                                    <label for="codigo">codigo de barra:</label>
                                    <input type="text" id="codgigo" name="codigo" required placeholder="Codigo de barras">
                                </div>

                                <div class="form-group">
                                    <label for="cnsCliente">Nome Medicamento:</label>
                                    <input type="text" id="nome medicamento" name="nome" required placeholder="nome do medicamento">
                                </div>

                                <div class="form-group">
                                    <label for="Nome Generico">Nome Generico:</label>
                                    <input type="text" id="nomeGenerico" name="nomeGenerico" required placeholder="nome generico">
                                </div>

                                <div class="form-group">
                                    <label for="Validade">Validade:</label>
                                    <input type="text" id="nomeGenerico" name="validade" required placeholder="validade">
                                </div>

                                <div class="form-group">
                                    <label for="Lote">Lote:</label>
                                    <input type="text" id="nomeGenerico" name="lote" required placeholder="lote">
                                </div>

                                <div class="form-group">
                                    <label for="fabricacao">Fabricação:</label>
                                    <input type="text" id="nomeGenerico" name="fabricacao" required placeholder="data fabricaçao">
                                </div>

                                <div class="form-group">
                                    <label for="dosagem">Dosagem:</label>
                                    <input type="text" id="dosagem" name="dosagem" required placeholder="dosagem">
                                </div>

                                <div class="form-group">
                                    <label for="forma">Forma Farmaceutica:</label>
                                    <input type="text" id="forma" name="forma" required placeholder="forma farmaceutica">
                                </div>

                                <div class="form-group">
                                    <label for="fabricante">Fabricante:</label>
                                    <input type="text" id="fabricante" name="fabricante" required placeholder="fabricante">
                                </div>

                                <div class="form-group">
                                    <label for="quant">Quantidade:</label>
                                    <input type="text" id="quant" name="quant" required placeholder="quantidade">
                                </div>

                                <div class="form-group">
                                    <label for="composicao">Composição:</label>
                                    <input type="text" id="composicao" name="composicao" required placeholder="composicao">
                                </div>


                                <div class="form-group button-wrapper">
                                    <button type="submit" class="submit-btn">Cadastrar Cliente</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Visão Geral do Estoque -->
                
        </div>
    </div>

    <script src="{{ asset('vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- Adicione aqui os scripts necessários para os gráficos -->
</body>
</html>
