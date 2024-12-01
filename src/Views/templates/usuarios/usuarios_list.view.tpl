<link rel="stylesheet" href="public/css_src/home.less"/>

<h1>Listado de Usuarios</h1>
<section class="WWList">
    <table>
        <style>
            th,
            td {
                text-align: center;
            }
        </style>
        <thead>
            <tr>
                <th>Código</th>

                {{if useremail_enable}}
                <th>Correo electrónico</th>
                {{endif useremail_enable}}

                <th>Nombre</th>

                {{if userpswd_enable}}
                <th>Contraseña</th>
                {{endif userpswd_enable}}

                {{if userfching_enable}}
                <th>Fecha de creación</th>
                {{endif userfching_enable}}

                {{if userpswdest_enable}}
                <th>Estado de la contraseña</th>
                {{endif userpswdest_enable}}
                
                {{if userpswdexp_enable}}
                <th>Fecha de expiración de la contraseña</th>
                {{endif userpswdexp_enable}}

                {{if userest_enable}}
                <th>Estado del usuario</th>
                {{endif userest_enable}}

                {{if useractcod_enable}}
                <th>Código de activación</th>
                {{endif useractcod_enable}}

                {{if userpswdchg_enable}}
                <th>Código de cambio de contraseña</th>
                {{endif userpswdchg_enable}}

                {{if usertipo_enable}}
                <th>Tipo de usuario</th>
                {{endif usertipo_enable}}

                {{if INS_enable}}
                <th><a href="index.php?page=Usuarios-UsuariosForm&mode=INS"><i class="fas fa-plus"></i></th>
                {{endif INS_enable}}
                
            </tr>
        </thead>

        <tbody>
            {{foreach usuario}}
            <tr>
                <td>{{usercod}}</td>

                {{if ~useremail_enable}}
                <td>{{useremail}}</td>
                {{endif ~useremail_enable}}

                <td>{{username}}</td>

                {{if ~userpswd_enable}}
                <td>{{userpswd}}</td>
                {{endif ~userpswd_enable}}

                {{if ~userfching_enable}}
                <td>{{userfching}}</td>
                {{endif ~userfching_enable}}

                {{if ~userpswdest_enable}}
                <td>{{userpswdest}}</td>
                {{endif ~userpswdest_enable}}

                {{if ~userpswdexp_enable}}
                <td>{{userpswdexp}}</td>
                {{endif ~userpswdexp_enable}}
                
                {{if ~userest_enable}}
                <td>{{userest}}</td>
                {{endif ~userest_enable}}

                {{if ~useractcod_enable}}
                <td>{{useractcod}}</td>
                {{endif ~useractcod_enable}}

                {{if ~userpswdchg_enable}}
                <td>{{userpswdchg}}</td>
                {{endif ~userpswdchg_enable}}

                {{if ~usertipo_enable}}
                <td>{{usertipo}}</td>
                {{endif ~usertipo_enable}}

                <td>
                    {{if ~UPD_enable}}
                    <a href="index.php?page=Usuarios-UsuariosForm&mode=UPD&usercod={{usercod}}"> <i class="fas fa-edit"></i></a>
                    {{endif ~UPD_enable}}

                    {{if ~DEL_enable}}
                    <a href="index.php?page=Usuarios-UsuariosForm&mode=DEL&usercod={{usercod}}"> <i class="fas fa-trash"></i></a>
                    {{endif ~DEL_enable}}

                    <a href="index.php?page=Usuarios-UsuariosForm&mode=DSP&usercod={{usercod}}"> <i class="fas fa-eye"></i></a>
                </td>
            </tr>
            {{endfor usuario}}
        </tbody>
    </table>
</section>