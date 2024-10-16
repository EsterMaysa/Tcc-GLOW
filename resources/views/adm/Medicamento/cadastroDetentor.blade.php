@include('includes.header')
<main>
    <div class="head-title">
        <div class="left">
            <h1> Cadastro Detentor </h1>
        </div>
    </div>


    <div class="container">

        <form action="/cadastroDetentor" method="POST">
            @csrf

            <div class="form-group">
                <label for="nomeDetentor">Nome do Detentor</label>
                <input type="text" class="form-control" id="nomeDetentor" name="nome" required>
            </div>

            <div class="form-group">
                <label for="cnpjDetentor">CNPJ</label>
                <input type="text" class="form-control" id="cnpjDetentor" name="cnpj" required>
            </div>

            <div class="form-group">
                <label for="emailDetentor">Email</label>
                <input type="email" class="form-control" id="emailDetentor" name="email" required>
            </div>

            <div class="form-group">
                <label for="logradouroDetentor">Logradouro</label>
                <input type="text" class="form-control" id="logradouroDetentor" name="logradouro" required>
            </div>

            <div class="form-group">
                <label for="bairroDetentor">Bairro</label>
                <input type="text" class="form-control" id="bairroDetentor" name="bairro" required>
            </div>

            <div class="form-group">
                <label for="cidadeDetentor">Cidade</label>
                <input type="text" class="form-control" id="cidadeDetentor" name="cidade" required>
            </div>

            <div class="form-group">
                <label for="estadoDetentor">Estado</label>
                <select class="form-control" id="estadoDetentor" name="estado" required>
                    <option value="">Selecione um Estado</option>
                    <option value="AC">Acre (AC)</option>
                    <option value="AL">Alagoas (AL)</option>
                    <option value="AP">Amapá (AP)</option>
                    <option value="AM">Amazonas (AM)</option>
                    <option value="BA">Bahia (BA)</option>
                    <option value="CE">Ceará (CE)</option>
                    <option value="DF">Distrito Federal (DF)</option>
                    <option value="ES">Espírito Santo (ES)</option>
                    <option value="GO">Goiás (GO)</option>
                    <option value="MA">Maranhão (MA)</option>
                    <option value="MT">Mato Grosso (MT)</option>
                    <option value="MS">Mato Grosso do Sul (MS)</option>
                    <option value="MG">Minas Gerais (MG)</option>
                    <option value="PA">Pará (PA)</option>
                    <option value="PB">Paraíba (PB)</option>
                    <option value="PR">Paraná (PR)</option>
                    <option value="PE">Pernambuco (PE)</option>
                    <option value="PI">Piauí (PI)</option>
                    <option value="RJ">Rio de Janeiro (RJ)</option>
                    <option value="RN">Rio Grande do Norte (RN)</option>
                    <option value="RS">Rio Grande do Sul (RS)</option>
                    <option value="RO">Rondônia (RO)</option>
                    <option value="RR">Roraima (RR)</option>
                    <option value="SC">Santa Catarina (SC)</option>
                    <option value="SP">São Paulo (SP)</option>
                    <option value="SE">Sergipe (SE)</option>
                    <option value="TO">Tocantins (TO)</option>
                </select>
            </div>


            <div class="form-group">
                <label for="ufDetentor">UF</label>
                <select class="form-control" id="ufDetentor" name="uf" required>
                    <option value="">Selecione uma UF</option>
                    <option value="AC">AC</option>
                    <option value="AL">AL</option>
                    <option value="AP">AP</option>
                    <option value="AM">AM</option>
                    <option value="BA">BA</option>
                    <option value="CE">CE</option>
                    <option value="DF">DF</option>
                    <option value="ES">ES</option>
                    <option value="GO">GO</option>
                    <option value="MA">MA</option>
                    <option value="MT">MT</option>
                    <option value="MS">MS</option>
                    <option value="MG">MG</option>
                    <option value="PA">PA</option>
                    <option value="PB">PB</option>
                    <option value="PR">PR</option>
                    <option value="PE">PE</option>
                    <option value="PI">PI</option>
                    <option value="RJ">RJ</option>
                    <option value="RN">RN</option>
                    <option value="RS">RS</option>
                    <option value="RO">RO</option>
                    <option value="RR">RR</option>
                    <option value="SC">SC</option>
                    <option value="SP">SP</option>
                    <option value="SE">SE</option>
                    <option value="TO">TO</option>
                </select>
            </div>


            <div class="form-group">
                <label for="cepDetentor">CEP</label>
                <input type="text" class="form-control" id="cepDetentor" name="cep" required>
            </div>

            <div class="form-group">
                <label for="numeroDetentor">Número</label>
                <input type="text" class="form-control" id="numeroDetentor" name="numero" required>
            </div>

            <div class="form-group">
                <label for="complementoDetentor">Complemento</label>
                <input type="text" class="form-control" id="complementoDetentor" name="complemento">
            </div>


            <button type="submit" class="btn btn-primary">Cadastrar Detentor</button>
        </form>
    </div>
</main>
</section>
@include('includes.footer')