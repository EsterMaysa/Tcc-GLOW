@include('includes.header') <!-- Inclui o header -->

<section class="settings-section">
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Configurações</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="/">Home</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>
                        <a class="active" href="/">Configurações</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="settings-content">
            <div class="settings-menu">
                <ul>
                    <li><a href="/configuracoes" class="active">Geral</a></li>
                    <li><a href="/configuracoesNotificacoes">Notificações</a></li>
                </ul>
            </div>

            <div class="settings-details">
                <!-- Configurações Gerais -->
                <div id="general-settings" class="settings-tab active">
                    <h2>Configurações Gerais</h2>
                    <form>
                        <div class="form-group">
                            <label for="app-language">Idioma</label>
                            <select id="app-language" name="app_language" class="form-control">
                                <option value="pt-br">Português (BR)</option>
                                <option value="en"> Inglês (ENG)</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="timezone">Fuso Horário</label>
                            <select id="timezone" name="timezone" class="form-control">
                                <option value="Brasilía/Distrito Federal"> Brasilía/Distrito Federal</option>
                                <option value="UTC">UTC</option>
                            </select>
                        </div>
                        <div class="form-row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary btn-block">Salvar Alterações</button>
                            </div>
                            <div class="col-6">
                                <button type="button" class="btn btn-secondary btn-block">Cancelar</button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Gerenciamento de Usuários -->
                <div id="user-management" class="settings-tab">
                    <h2>Gerenciamento de Usuários</h2>
                    <p>Aqui você pode adicionar, remover e gerenciar as permissões dos usuários.</p>
                    <!-- Conteúdo para gerenciamento de usuários -->
                </div>

                <!-- Notificações -->
                <div id="notifications" class="settings-tab">
                    <h2>Configurações de Notificações</h2>
                    <p>Ajuste as preferências de notificações do sistema.</p>
                    <!-- Conteúdo para configurações de notificações -->
                </div>

                <!-- Privacidade -->
                <div id="privacy" class="settings-tab">
                    <h2>Configurações de Privacidade</h2>
                    <p>Aqui você pode ajustar as opções de privacidade do aplicativo.</p>
                    <!-- Conteúdo para configurações de privacidade -->
                </div>
            </div>
        </div>
    </main>
</section>

@include('includes.footer') <!-- Inclui o footer -->
