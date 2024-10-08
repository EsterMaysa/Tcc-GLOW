@include('includes.headerFarmacia')
<section class="profile-section">
    <main>
        <div class="profile-content">
            <div class="current-profile-image">
                <img src="{{ asset('/Image/perfilFarm.png')}}" alt="Foto da Farmacia" class="profile-img">
            </div>
            <div class="profile-card">
                <div class="profile-info">
                    <div class="form-row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name"> Nome </label>
                                <input type="text" id="name" name="name" class="form-control transparent-input" value="Nome da Farmácia" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="cnpj"> CNPJ </label>
                                <input type="text" id="cnpj" name="cnpj" class="form-control transparent-input" value="78889463000143" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="email"> Email </label>
                                <input type="email" id="email" name="email" class="form-control transparent-input" value="farmacia@exemplo.com" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="phone"> Telefone </label>
                                <input type="text" id="phone" name="phone" class="form-control transparent-input" value="(11) 2534-5678" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="cep"> CEP </label>
                                <input type="text" id="cep" name="cep" class="form-control transparent-input" value="08411-280" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="cidade"> Cidade </label>
                                <input type="text" id="cidade" name="cidade" class="form-control transparent-input" value="São Paulo" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="bairro"> Bairro </label>
                                <input type="text" id="bairro" name="bairro" class="form-control transparent-input" value="São Miguel Paulista" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="numero"> Número </label>
                                <input type="text" id="numero" name="numero" class="form-control transparent-input" value="500" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="estado"> Estado</label>
                                <input type="text" id="estado" name="estado" class="form-control transparent-input" value="São Paulo" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="edit-profile">
                <a href="/editarPerfilFarmacia" class="btn btn-primary" > Editar Perfil </a>
            </div>
        </div>
    </main>
</section>
@include('includes.footer') <!-- Inclui o footer -->
