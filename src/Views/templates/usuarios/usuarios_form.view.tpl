<link rel="stylesheet" href="public/css_src/home.less" />

<h1>{{modes_dsc}}</h1>
<section class="grid">
    <form action="index.php?page=Usuarios-UsuariosForm&mode={{mode}}&usercod={{usercod}}" method="POST" class="row">
        {{with usuario}}
        <div class="row col-6 offset-3">
            <label class="col-4" for="usercod">Código</label>
            <input class="col-8" type="text" name="usercod" id="usercod" value="{{usercod}}" readonly>

            <input type="hidden" name="xssToken" value="{{~xssToken}}" />

        </div>

        {{if ~useremail_enable}}
        <div class="row col-6 offset-3">
            <label class="col-4" for="useremail">Correo Electrónico</label>
            <input class="col-8" type="email" name="useremail" id="useremail" value="{{useremail}}" {{~readonly}}>
            {{if ~useremail_haserror}}
            <div class="error">
                <ul>
                    {{foreach ~useremail_error}}
                    <li>{{this}}</li>
                    {{endfor ~useremail_error}}
                </ul>
            </div>
            {{endif ~useremail_haserror}}
        </div>
        {{endif ~useremail_enable}}

        <div class="row col-6 offset-3">
            <label class="col-4" for="username">Nombre de Usuario</label>
            <input class="col-8" type="text" name="username" id="username" value="{{username}}" {{~readonly}}>
            {{if ~username_haserror}}
            <div class="error">
                <ul>
                    {{foreach ~username_error}}
                    <li>{{this}}</li>
                    {{endfor ~username_error}}
                </ul>
            </div>
            {{endif ~username_haserror}}
        </div>

        {{if ~userpswd_enable}}
        <div class="row col-6 offset-3">
            <label class="col-4" for="userpswd">Contraseña</label>
            <input class="col-8" type="password" name="userpswd" id="userpswd" value="{{userpswd}}" {{~readonly}}>
            {{if ~userpswd_haserror}}
            <div class="error">
                <ul>
                    {{foreach ~userpswd_error}}
                    <li>{{this}}</li>
                    {{endfor ~userpswd_error}}
                </ul>
            </div>
            {{endif ~userpswd_haserror}}
        </div>
        {{endif ~userpswd_enable}}

        {{if ~userfching_enable}}
        <div class="row col-6 offset-3">
            <label class="col-4" for="userfching">Fecha de Ingreso</label>
            <input class="col-8" type="datetime-local" name="userfching" id="userfching" value="{{userfching}}"
                {{~readonly}}>
        </div>
        {{endif ~userfching_enable}}


        <div class="row col-6 offset-3">
    <label class="col-4" for="roleuserest">Estado</label>
    <div class="col-8">
        <label for="roleuserest_ACT">
            <input type="radio" id="roleuserest_ACT" name="roleuserest" value="ACT">
            ACTIVO
        </label>

        <label for="roleuserest_INA">
            <input type="radio" id="roleuserest_INA" name="roleuserest" value="INA">
            INACTIVO
        </label>

        <label for="roleuserest_BLQ">
            <input type="radio" id="roleuserest_BLQ" name="roleuserest" value="BLQ">
            BLOQUEADO
        </label>

        <label for="roleuserest_SUS">
            <input type="radio" id="roleuserest_SUS" name="roleuserest" value="SUS">
            SUSPENDIDO
        </label>
    </div>
</div>

        {{if ~userfching_enable}}
        <div class="row col-6 offset-3">
            <label class="col-4" for="userpswdexp">Fecha de Expiración de la Contraseña</label>
            <input class="col-8" type="datetime-local" name="userpswdexp" id="userpswdexp" value="{{userpswdexp}}"
                {{~readonly}}>
        </div>
        {{endif ~userfching_enable}}

        <div class="row col-6 offset-3">
            <label class="col-4">Estado del Usuario</label>
            <div class="col-8">
                <label for="userest_ACT">
                    <input type="radio" id="userest_ACT" name="userest" value="ACT"> ACTIVO
                </label>
                <label for="userest_INA">
                    <input type="radio" id="userest_INA" name="userest" value="INA"> INACTIVO
                </label>
                <label for="userest_BLQ">
                    <input type="radio" id="userest_BLQ" name="userest" value="BLQ"> BLOQUEADO
                </label>
                <label for="userest_SUS">
                    <input type="radio" id="userest_SUS" name="userest" value="SUS"> SUSPENDIDO
                </label>
            </div>
        </div>

        {{if ~useractcod_enable}}
        <div class="row col-6 offset-3">
            <label class="col-4" for="useractcod">Código de Activación</label>
            <input class="col-8" type="text" name="useractcod" id="useractcod" value="{{useractcod}}" {{~readonly}}>
        </div>
        {{endif ~useractcod_enable}}

        {{if ~userpswdchg_enable}}
        <div class="row col-6 offset-3">
            <label class="col-4" for="userpswdchg">Cambio de Contraseña</label>
            <input class="col-8" type="text" name="userpswdchg" id="userpswdchg" value="{{userpswdchg}}" {{~readonly}}>
        </div>
        {{endif ~userpswdchg_enable}}

        <div class="row col-6 offset-3">
            <label class="col-4" for="usertipo">Tipo de Usuario</label>
            <input class="col-8" type="text" name="usertipo" id="usertipo" value="{{usertipo}}" {{~readonly}}>
        </div>

        <div class="row col-6 offset-3 flex-end">

            {{if ~showConfirm}}
            <p>
                <button type="submit" class="primary">Confirmar</button> &nbsp;
                {{endif ~showConfirm}}

                <button id="btnCancelar" class="btn">Cancelar</button>
            </p>
        </div>

        {{if ~global_haserror}}
        <div class="error">
            <ul>
                {{foreach ~global_error}}
                <li>{{this}}</li>
                {{endfor ~global_error}}
            </ul>
        </div>
        {{endif ~global_haserror}}

        {{endwith usuario}}
    </form>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            document.getElementById("btnCancelar").addEventListener('click', (e) => {
                e.preventDefault();
                e.stopPropagation();
                window.location.assign("index.php?page=Usuarios-UsuariosList");
            })
        })

    </script>
</section>