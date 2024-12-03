<link rel="stylesheet" href="public/css_src/home.less" />

<h1>{{modes_dsc}}</h1>
<section class="grid">
    <form
        action="index.php?page=RolesUsuarios-RolesUsuariosForm&mode={{mode}}&usercod={{usercod}}&rolescod={{rolescod}}"
        method="POST" class="row">
        {{with rolUsuario}}
        <div class="row col-6 offset-3">
            <label class="col-4" for="usercod">Código de Usuario</label>
            <input class="col-8" type="text" name="usercod" id="usercod" value="{{usercod}}" {{~readonly}}>
            {{if ~usercod_haserror}}
            <div class="error">
                <ul>
                    {{foreach ~usercod_error}}
                    <li>{{this}}</li>
                    {{endfor ~usercod_error}}
                </ul>
            </div>
            {{endif ~usercod_haserror}}
        </div>

        <div class="row col-6 offset-3">
            <label class="col-4" for="rolescod">Código de Rol</label>
            <input class="col-8" type="text" name="rolescod" id="rolescod" value="{{rolescod}}" {{~readonly_rolescod}}>
            {{if ~rolescod_haserror}}
            <div class="error">
                <ul>
                    {{foreach ~rolescod_error}}
                    <li>{{this}}</li>
                    {{endfor ~rolescod_error}}
                </ul>
            </div>
            {{endif ~rolescod_haserror}}
        </div>

        <div class="row col-6 offset-3">
            <label class="col-4" for="roleuserest">Estado</label>
            <input class="col-8" type="text" name="roleuserest" id="roleuserest" value="{{roleuserest}}" {{~readonly}}>
        </div>

        <div class="row col-6 offset-3">
            <label class="col-4" for="roleuserfch">Fecha de Creación</label>
            <input class="col-8" type="datetime-local" name="roleuserfch" id="roleuserfch" value="{{roleuserfch}}"
                {{~readonly}}>
        </div>

        <div class="row col-6 offset-3">
            <label class="col-4" for="roleuserexp">Expiración del usuario</label>
            <input class="col-8" type="datetime-local" name="roleuserexp" id="roleuserexp" value="{{roleuserexp}}"
                {{~readonly}}>
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

        {{endwith rolUsuario}}
    </form>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            document.getElementById("btnCancelar").addEventListener('click', (e) => {
                e.preventDefault();
                e.stopPropagation();
                window.location.assign("index.php?page=RolesUsuarios-RolesUsuariosList");
            });
        });
    </script>
</section>