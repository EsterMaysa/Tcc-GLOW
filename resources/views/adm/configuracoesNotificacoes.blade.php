@include('includes.header') <!-- Inclui o header -->

<section class="settings-section">
    <main>
        <div class="head-title">
            <div class="left">
                <h1> Configurações de Notificações </h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="/"> Home </a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>
                        <a class="active" href="/configuracoes"> Configurações de Notificações </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="settings-content">
        <div class="settings-menu">
                <ul>
                    <li><a href="/configuracoes" > Geral </a></li>
                    <li><a href="/configuracoesNotificacoes"class="active"> Notificações </a></li>
                </ul>
            </div>
            <div class="settings-details">
                <!-- Configurações de Notificações -->
                <h2>Personalizar Notificações</h2>
                <form action="" method="POST">
                    @csrf

                    <!-- Notificações por E-mail -->
                    <div class="form-group">
                        <label for="email_notifications">Notificações por E-mail</label>
                        <select id="email_notifications" name="email_notifications" class="form-control">
                            <option value="enabled">Ativadas</option>
                            <option value="disabled">Desativadas</option>
                        </select>
                    </div>

                    <!-- Notificações por SMS -->
                    <div class="form-group">
                        <label for="sms_notifications">Notificações por SMS</label>
                        <select id="sms_notifications" name="sms_notifications" class="form-control">
                            <option value="enabled">Ativadas</option>
                            <option value="disabled">Desativadas</option>
                        </select>
                    </div>

                    <!-- Notificações Push -->
                    <div class="form-group">
                        <label for="push_notifications">Notificações Push</label>
                        <select id="push_notifications" name="push_notifications" class="form-control">
                            <option value="enabled">Ativadas</option>
                            <option value="disabled">Desativadas</option>
                        </select>
                    </div>

                    <!-- Frequência de Notificações -->
                    <div class="form-group">
                        <label for="notification_frequency">Frequência das Notificações</label>
                        <select id="notification_frequency" name="notification_frequency" class="form-control">
                            <option value="instant">Instantâneas</option>
                            <option value="daily">Diárias</option>
                            <option value="weekly">Semanais</option>
                        </select>
                    </div>

                    <!-- Botão para Salvar Alterações -->
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</section>

@include('includes.footer') <!-- Inclui o footer -->
