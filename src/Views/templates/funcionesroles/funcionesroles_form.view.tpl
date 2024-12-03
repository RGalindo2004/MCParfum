<link rel="stylesheet" href="public/css_src/home.less" />

<h1>{{modes_dsc}}</h1>
<section class="grid">
    <form action="index.php?page=FuncionesRoles-FuncionesRolesForm&mode={{mode}}&rolescod={{rolescod}}&fncod={{fncod}}"
        method="POST" class="row">
        {{with funcionRol}}
        <div class="row col-6 offset-3">
            <label class="col-4" for="rolescod">Código de Rol</label>
            <input class="col-8" type="text" name="rolescod" id="rolescod" value="{{rolescod}}" {{~readonly}}>
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
            <label class="col-4" for="fncod">Código de Función</label>
            <input class="col-8" type="text" name="fncod" id="fncod" value="{{fncod}}" {{~readonly}}>
            {{if ~fncod_haserror}}
            <div class="error">
                <ul>
                    {{foreach ~fncod_error}}
                    <li>{{this}}</li>
                    {{endfor ~fncod_error}}
                </ul>
            </div>
            {{endif ~fncod_haserror}}
        </div>

        <div class="row col-6 offset-3">
            <label class="col-4" for="fnrolest">Estado</label>
            <div class="col-8">
                <label for="fnrolest_ACT">
                    <input type="radio" id="fnrolest_ACT" name="fnrolest" value="ACT">
                    ACTIVO
                </label>
                <label for="fnrolest_INA">
                    <input type="radio" id="fnrolest_INA" name="fnrolest" value="INA">
                    INACTIVO
                </label>
                <label for="fnrolest_BLQ">
                    <input type="radio" id="fnrolest_BLQ" name="fnrolest" value="BLQ">
                    BLOQUEADO
                </label>
                <label for="fnrolest_SUS">
                    <input type="radio" id="fnrolest_SUS" name="fnrolest" value="SUS">
                    SUSPENDIDO
                </label>
            </div>
        </div>

        <div class="row col-6 offset-3">
            <label class="col-4" for="fnexp">Expiración</label>
            <input class="col-8" type="datetime-local" name="fnexp" id="fnexp" value="{{fnexp}}" {{~readonly}}>
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

        {{endwith funcionRol}}
    </form>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            document.getElementById("btnCancelar").addEventListener('click', (e) => {
                e.preventDefault();
                e.stopPropagation();
                window.location.assign("index.php?page=FuncionesRoles-FuncionesRolesList");
            });
        });
    </script>
</section>