<link rel="stylesheet" href="public/css_src/home.less"/>

<h1>Listado de funciones por roles</h1>
<section class="WWList">
    <table>
        <style>
            th, td {
                text-align: center;
            }
        </style>
        <thead>
            <tr>
                <th>Código de Rol</th>
                <th>Código de Función</th>
                <th>Estado</th>
                <th>Expiración</th>
                <th><a href="index.php?page=FuncionesRoles-FuncionesRolesForm&mode=INS">
                    {{if ~INS_enable}}<i class="fas fa-plus"></i>{{endif ~INS_enable}}
                    </a></th>
            </tr>
        </thead>

        <tbody>
            {{foreach funcionesRoles}}
            <tr>
                <td>{{rolescod}}</td>
                <td>{{fncod}}</td>
                <td>{{fnrolest}}</td>
                <td>{{fnexp}}</td>
                <td>
                    {{if ~UPD_enable}}
                    <a href="index.php?page=FuncionesRoles-FuncionesRolesForm&mode=UPD&rolescod={{rolescod}}&fncod={{fncod}}"><i class="fas fa-edit"></i></a>
                    {{endif ~UPD_enable}}

                    {{if ~DEL_enable}}
                    <a href="index.php?page=FuncionesRoles-FuncionesRolesForm&mode=DEL&rolescod={{rolescod}}&fncod={{fncod}}"><i class="fas fa-trash"></i></a>
                    {{endif ~DEL_enable}}

                    <a href="index.php?page=FuncionesRoles-FuncionesRolesForm&mode=DSP&rolescod={{rolescod}}&fncod={{fncod}}"><i class="fas fa-eye"></i></a>

                </td>
            </tr>
            {{endfor funcionesRoles}}
        </tbody>
    </table>
</section>
