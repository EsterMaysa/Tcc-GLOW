@include('includes.headerFarmacia')
<section class="edit-profile-section" >
    <main>
        <!-- Formulário de Edição do Perfil -->
        <div class="edit-profile-content">
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Imagem Atual do Perfil -->
                <div class="photo-group" style="text-align: center; margin-bottom: 20px;">
                    <img src="{{ asset('/Image/perfilFarmVerde.png')}}" alt="Foto Atual do Admin" class="profile-img" style="width: 150px; height: 150px; object-fit: cover; border-radius: 50%; border: 4px solid #265C4B; margin-bottom: 10px;">
                    <input type="file" id="fotoPerfil" accept="image/*" style="display: none;">
                    <label for="fotoPerfil" style="background-color: #265C4B; color: #ffffff; padding: 10px 20px; border-radius: 5px; cursor: pointer; display: inline-block; text-align: center;">Carregar Foto</label>
                </div>
                <br>
                <!-- Grid de Inputs -->
                <div class="form-grid" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px;">
                    <!-- Nome -->
                    <div class="form-group" style="margin-bottom: 15px;">
                        <label for="name" style="display: block; margin-bottom: 5px; color: #265C4B;"> Nome </label>
                        <input type="text" id="name" name="name" class="form-control" value="Nome da Farmácia" style="width: 100%; padding: 10px; border: 1px solid #d3d3d3; border-radius: 5px; font-size: 16px;">
                    </div>

                    <div class="form-group" style="margin-bottom: 15px;">
                        <label for="cnpj" style="display: block; margin-bottom: 5px; color: #265C4B;"> CNPJ </label>
                        <input type="text" id="cnpj" name="cnpj" class="form-control" value="00.000.000/0001-00" style="width: 100%; padding: 10px; border: 1px solid #d3d3d3; border-radius: 5px; font-size: 16px;">
                    </div>

                    <!-- Email -->
                    <div class="form-group" style="margin-bottom: 15px;">
                        <label for="email" style="display: block; margin-bottom: 5px; color: #265C4B;">Email</label>
                        <input type="email" id="email" name="email" class="form-control" value="admin@example.com" style="width: 100%; padding: 10px; border: 1px solid #d3d3d3; border-radius: 5px; font-size: 16px;">
                    </div>

                    <!-- Telefone -->
                    <div class="form-group" style="margin-bottom: 15px;">
                        <label for="phone" style="display: block; margin-bottom: 5px; color: #265C4B;">Telefone</label>
                        <input type="text" id="phone" name="phone" class="form-control" value="(11) 1234-5678" style="width: 100%; padding: 10px; border: 1px solid #d3d3d3; border-radius: 5px; font-size: 16px;">
                    </div>

                    <!-- CEP -->
                    <div class="form-group" style="margin-bottom: 15px;">
                        <label for="cep" style="display: block; margin-bottom: 5px; color: #265C4B;">CEP</label>
                        <input type="text" id="cep" name="cep" class="form-control" value="00000-000" style="width: 100%; padding: 10px; border: 1px solid #d3d3d3; border-radius: 5px; font-size: 16px;">
                    </div>

                    <!-- Cidade -->
                    <div class="form-group" style="margin-bottom: 15px;">
                        <label for="cidade" style="display: block; margin-bottom: 5px; color: #265C4B;">Cidade</label>
                        <input type="text" id="cidade" name="cidade" class="form-control" value="Cidade" style="width: 100%; padding: 10px; border: 1px solid #d3d3d3; border-radius: 5px; font-size: 16px;">
                    </div>

                    <!-- Bairro -->
                    <div class="form-group" style="margin-bottom: 15px;">
                        <label for="bairro" style="display: block; margin-bottom: 5px; color: #265C4B;">Bairro</label>
                        <input type="text" id="bairro" name="bairro" class="form-control" value="Bairro" style="width: 100%; padding: 10px; border: 1px solid #d3d3d3; border-radius: 5px; font-size: 16px;">
                    </div>

                    <!-- Número -->
                    <div class="form-group" style="margin-bottom: 15px;">
                        <label for="numero" style="display: block; margin-bottom: 5px; color: #265C4B;">Número</label>
                        <input type="text" id="numero" name="numero" class="form-control" value="Número" style="width: 100%; padding: 10px; border: 1px solid #d3d3d3; border-radius: 5px; font-size: 16px;">
                    </div>

                    <!-- Estado -->
                    <div class="form-group" style="margin-bottom: 15px;">
                        <label for="estado" style="display: block; margin-bottom: 5px; color: #265C4B;">Estado</label>
                        <input type="text" id="estado" name="estado" class="form-control" value="Estado" style="width: 100%; padding: 10px; border: 1px solid #d3d3d3; border-radius: 5px; font-size: 16px;">
                    </div>
                </div>
                <!-- Botões para Salvar Alterações e Cancelar -->
                <div class="form-row" style="display: flex; justify-content: space-between; margin-top: 20px;">
                    <div class="col-6" style="flex: 1; margin: 0 10px;">
                        <button type="submit" class="btn btn-primary btn-block" style="background-color: #265C4B; color: #ffffff; border: none; border-radius: 5px; padding: 10px 20px; font-size: 16px; cursor: pointer; transition: background-color 0.3s ease;">Salvar Alterações</button>
                    </div>
                    <div class="col-6" style="flex: 1; margin: 0 10px;">
                        <button type="button" class="btn btn-secondary btn-block" style="background-color: #265C4B; color: #ffffff; border: none; border-radius: 5px; padding: 10px 20px; font-size: 16px; cursor: pointer; transition: background-color 0.3s ease;" onclick="history.back()">Cancelar</button>
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
