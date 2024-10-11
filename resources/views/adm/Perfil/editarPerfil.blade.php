@include('includes.header') <!-- Inclui o header -->
<section class="edit-profile-section">
    <main>
        <!-- Formulário de Edição do Perfil -->
        <div class="edit-profile-content">
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Imagem Atual do Perfil -->
                <div class="photo-group">
                    <img src="{{ asset('/Image/perfilAzulAdm.png')}}" alt="Foto Atual do Admin" class="profile-img">
                    <input type="file" id="fotoPerfil" accept="image/*">
                    <label for="fotoPerfil">Carregar Foto</label>
                </div>
                <br>
                <!-- Grid de Inputs -->
                <div class="form-grid">
                    <!-- Nome -->
                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input type="text" id="name" name="name" class="form-control" value="Nome do Admin">
                    </div>

                    <!-- Email -->
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" value="admin@example.com">
                    </div>

                    <!-- Cargo -->
                    <div class="form-group">
                        <label for="role">Cargo</label>
                        <input type="text" id="role" name="role" class="form-control" value="Administrador">
                    </div>

                    <!-- Telefone -->
                    <div class="form-group">
                        <label for="phone">Telefone</label>
                        <input type="text" id="phone" name="phone" class="form-control" value="(11) 1234-5678">
                    </div>
                </div>
                <!-- Botões para Salvar Alterações e Cancelar -->
                <!-- Botões para Salvar Alterações e Cancelar -->
                <div class="form-row">
                    <div class="col-6">
                        <button type="submit" class="btn btn-primary btn-block">Salvar Alterações</button>
                    </div>
                    <div class="col-6">
                        <button type="button" class="btn btn-secondary btn-block" onclick="history.back()">Cancelar</button>
                    </div>
                </div>
            </form>
        </div>
    </main>
</section>
<script>
    const fotoPerfil = document.getElementById('fotoPerfil');
    const perfilImg = document.querySelector('.profile-img');

    fotoPerfil.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                perfilImg.src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    });
</script>

@include('includes.footer') <!-- Inclui o footer -->
