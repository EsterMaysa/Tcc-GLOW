@include('includes.header')
 <!-- Inclui o header -->
<section class="profile-section">
    <main>
        <!-- Conteúdo do Perfil -->
        <div class="profile-content">
            <div class="current-profile-image">
                <img src="{{ asset('/Image/perfilAzulAdm.png')}}" alt="Foto do Admin" class="profile-img">
            </div>
            <div class="profile-card">
                <div class="profile-info">
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Nome</label>
                                <input type="text" id="name" name="name" class="form-control transparent-input" value="Nome do Admin" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" class="form-control transparent-input" value="admin@example.com" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="role">Cargo</label>
                                <input type="text" id="role" name="role" class="form-control transparent-input" value="Administrador" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">Telefone</label>
                                <input type="text" id="phone" name="phone" class="form-control transparent-input" value="(11) 1234-5678" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Botão para editar perfil -->
            <div class="edit-profile">
                <a href="/editarPerfil" class="btn btn-primary">Editar Perfil</a>
            </div>
        </div>
    </main>
    <!-- MAIN -->
</section>

@include('includes.footer') <!-- Inclui o footer -->
