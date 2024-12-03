<link rel="stylesheet" href="public/css_src/home.less"/>

<h1>Listado de roles por usuario</h1>
<section class="WWList">
    <table>
        <style>
            th, td {
                text-align: center;
            }
        </style>
        <thead>
            <tr>
                <th>Código de Usuario</th>
                <th>Código de Rol</th>
                <th>Estado</th>
                <th>Fecha de cración</th>
                <th>Expiración del usuario</th>
                <th>
                    <a href="index.php?page=RolesUsuarios-RolesUsuariosForm&mode=INS">
                        <i class="fas fa-plus"></i>
                    </a>
                </th>
            </tr>
        </thead>

        <tbody>
            {{foreach rolesUsuarios}}
            <tr>
                <td>{{usercod}}</td>
                <td>{{rolescod}}</td>
                <td>{{roleuserest}}</td>
                <td>{{roleuserfch}}</td>
                <td>{{roleuserexp}}</td>
                <td>
                    <a href="index.php?page=RolesUsuarios-RolesUsuariosForm&mode=UPD&usercod={{usercod}}&rolescod={{rolescod}}"><i class="fas fa-edit"></i></a>
                    <a href="index.php?page=RolesUsuarios-RolesUsuariosForm&mode=DEL&usercod={{usercod}}&rolescod={{rolescod}}"><i class="fas fa-trash"></i></a>
                    <a href="index.php?page=RolesUsuarios-RolesUsuariosForm&mode=DSP&usercod={{usercod}}&rolescod={{rolescod}}"><i class="fas fa-eye"></i></a>
                </td>
            </tr>
            {{endfor rolesUsuarios}}
        </tbody>
    </table>
</section>
