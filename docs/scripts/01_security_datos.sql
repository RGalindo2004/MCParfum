INSERT INTO `usuario` 
(`usercod`, `useremail`, `username`, `userpswd`, `userfching`, `userpswdest`, `userpswdexp`, `userest`, `useractcod`, `userpswdchg`, `usertipo`) 
VALUES 
(1, 'admin@mcparfum.com', 'admin_mcparfum',
    '$2y$10$i/.h8cn90hrKcCfhhkAjOuEPfD6U277ENvgC53XbTxF3KU87ToUJ6', 
    '2024-09-09 00:00:00', 'ACT', '2024-12-08 00:00:00',
    'ACT', 'admin12345', '2024-09-09 00:00:00', 'ADM'),
(2, 'supervisor@mcparfum.com', 'supervisor_mcparfum',
    '$2y$10$NQtoEUJu8B7ETmpgyxWQ4uTN2RWI6JDiR5AFpMeWYnohwNVeQ3P2i', 
    '2024-09-09 00:00:00', 'ACT', '2024-12-08 00:00:00',
    'ACT', 'supervisor123', '2024-09-09 00:00:00', 'SUP');

--La contraseña del administrador es: Admin123! y la de supervisor: Supervisor123!

INSERT INTO `roles` (`rolescod`, `rolesdsc`, `rolesest`) VALUES 
    ('Admin', 'Administrador', 'ACT'),
    ('Supervisor', 'Supervisor de operaciones', 'ACT'),
    ('Cliente', 'Cliente normal', 'ACT');

INSERT INTO `roles_usuarios` 
    (`usercod`, `rolescod`, `roleuserest`, `roleuserfch`, `roleuserexp`) VALUES 
    (1, 'Admin', 'ACT', '2024-09-09 00:00:00', '2024-12-08 00:00:00'),
    (2, 'Supervisor', 'ACT', '2024-09-09 00:00:00', '2024-12-08 00:00:00');

    INSERT INTO `roles_usuarios` 
    (`usercod`, `rolescod`, `roleuserest`, `roleuserfch`, `roleuserexp`) VALUES 
    (3, 'Cliente', 'ACT', '2024-09-09 00:00:00', '2024-12-08 00:00:00');

INSERT INTO `funciones` 
(`fncod`, `fndsc`, `fnest`, `fntyp`) 
VALUES 
('Controllers\\Usuarios\\UsuariosForm', 'Controllers\\Usuarios\\UsuariosForm', 'ACT', 'CTR'),
('Controllers\\Usuarios\\UsuariosList', 'Controllers\\Usuarios\\UsuariosList', 'ACT', 'CTR'),
('Menu_Usuarios', 'Menu_Usuarios', 'ACT', 'MNU'),
('Controllers\\Roles\\RolesForm', 'Controllers\\Usuarios\\RolesForm', 'ACT', 'CTR'),
('Controllers\\Roles\\RolesList', 'Controllers\\Usuarios\\RolesList', 'ACT', 'CTR'),
('Menu_Roles', 'Menu_Roles', 'ACT', 'MNU'),
('Controllers\\Funciones\\FuncionesForm', 'Controllers\\Usuarios\\FuncionesForm', 'ACT', 'CTR'),
('Controllers\\Funciones\\FuncionesList', 'Controllers\\Usuarios\\FuncionesList', 'ACT', 'CTR'),
('Menu_Funciones', 'Menu_Funciones', 'ACT', 'MNU'),
('Controllers\\FuncionesRoles\\FuncionesRolesForm', 'Controllers\\FuncionesRoles\\FuncionesRolesForm', 'ACT', 'CTR'),
('Controllers\\FuncionesRoles\\FuncionesRolesList', 'Controllers\\FuncionesRoles\\FuncionesRolesList', 'ACT', 'CTR'),
('Menu_FuncionesRoles', 'Menu_FuncionesRoles', 'ACT', 'MNU'),
('Controllers\\RolesUsuarios\\RolesUsuariosForm', 'Controllers\\RolesUsuarios\\RolesUsuariosForm', 'ACT', 'CTR'),
('Controllers\\RolesUsuarios\\RolesUsuariosList', 'Controllers\\RolesUsuarios\\RolesUsuariosList', 'ACT', 'CTR'),
('Menu_RolesUsuarios', 'Menu_RolesUsuarios', 'ACT', 'MNU'),
('Controllers\\Productos\\ProductosForm', 'Controllers\\Productos\\ProductosForm', 'ACT', 'CTR'),
('Controllers\\Productos\\ProductosList', 'Controllers\\Productos\\ProductosList', 'ACT', 'CTR'),
('Menu_Productos', 'Menu_Productos', 'ACT', 'MNU'),
('useractcod_enable', 'useractcod_enable', 'ACT', 'FNC'),
('useremail_enable', 'useremail_enable', 'ACT', 'FNC'),
('userest_enable', 'userest_enable', 'ACT', 'FNC'),
('userfching_enable', 'userfching_enable', 'ACT', 'FNC'),
('userpswdchg_enable', 'userpswdchg_enable', 'ACT', 'FNC'),
('userpswdest_enable', 'userpswdest_enable', 'ACT', 'FNC'),
('userpswdexp_enable', 'userpswdexp_enable', 'ACT', 'FNC'),
('userpswd_enable', 'userpswd_enable', 'ACT', 'FNC'),
('usertipo_enable', 'usertipo_enable', 'ACT', 'FNC'),
('usuarios_DEL_enable', 'usuarios_DEL_enable', 'ACT', 'FNC'),
('usuarios_INS_enable', 'usuarios_INS_enable', 'ACT', 'FNC'),
('usuarios_UPD_enable', 'usuarios_UPD_enable', 'ACT', 'FNC'),
('funcionesroles_DEL_enable', 'funcionesroles_DEL_enable', 'ACT', 'FNC'),
('funcionesroles_INS_enable', 'funcionesroles_INS_enable', 'ACT', 'FNC'),
('funcionesroles_UPD_enable', 'funcionesroles_UPD_enable', 'ACT', 'FNC'),
('Controllers\\Checkout\\Checkout', 'Controllers\\Checkout\\Checkout', 'ACT', 'CTR');

INSERT INTO `funciones_roles` 
(`rolescod`, `fncod`, `fnrolest`, `fnexp`) 
VALUES 
('Admin', 'Controllers\\Usuarios\\UsuariosForm', 'ACT', '2024-12-08 00:00:00'),
('Admin', 'Controllers\\Usuarios\\UsuariosList', 'ACT', '2024-12-08 00:00:00'),
('Admin', 'Menu_Usuarios', 'ACT', '2024-12-08 00:00:00'),
('Admin', 'Controllers\\Roles\\RolesForm', 'ACT', '2024-12-08 00:00:00'),
('Admin', 'Controllers\\Roles\\RolesList', 'ACT', '2024-12-08 00:00:00'),
('Admin', 'Menu_Roles', 'ACT', '2024-12-08 00:00:00'),
('Admin', 'Controllers\\Funciones\\FuncionesForm', 'ACT', '2024-12-08 00:00:00'),
('Admin', 'Controllers\\Funciones\\FuncionesList', 'ACT', '2024-12-08 00:00:00'),
('Admin', 'Menu_Funciones', 'ACT', '2024-12-08 00:00:00'),
('Admin', 'Controllers\\FuncionesRoles\\FuncionesRolesForm', 'ACT', '2024-12-08 00:00:00'),
('Admin', 'Controllers\\FuncionesRoles\\FuncionesRolesList', 'ACT', '2024-12-08 00:00:00'),
('Admin', 'Menu_FuncionesRoles', 'ACT', '2024-12-08 00:00:00'),
('Admin', 'Controllers\\RolesUsuarios\\RolesUsuariosForm', 'ACT', '2024-12-08 00:00:00'),
('Admin', 'Controllers\\RolesUsuarios\\RolesUsuariosList', 'ACT', '2024-12-08 00:00:00'),
('Admin', 'Controllers\\Productos\\ProductosForm', 'ACT', '2024-12-08 00:00:00'),
('Admin', 'Controllers\\Productos\\ProductosList', 'ACT', '2024-12-08 00:00:00'),
('Admin', 'Menu_Productos', 'ACT', '2024-12-08 00:00:00'),
('Admin', 'useractcod_enable', 'ACT', '2024-12-08 00:00:00'),
('Admin', 'useremail_enable', 'ACT', '2024-12-08 00:00:00'),
('Admin', 'userest_enable', 'ACT', '2024-12-08 00:00:00'),
('Admin', 'userfching_enable', 'ACT', '2024-12-08 00:00:00'),
('Admin', 'userpswdchg_enable', 'ACT', '2024-12-08 00:00:00'),
('Admin', 'userpswdest_enable', 'ACT', '2024-12-08 00:00:00'),
('Admin', 'userpswdexp_enable', 'ACT', '2024-12-08 00:00:00'),
('Admin', 'userpswd_enable', 'ACT', '2024-12-08 00:00:00'),
('Admin', 'usertipo_enable', 'ACT', '2024-12-08 00:00:00'),
('Admin', 'usuarios_DEL_enable', 'ACT', '2024-12-08 00:00:00'),
('Admin', 'usuarios_INS_enable', 'ACT', '2024-12-08 00:00:00'),
('Admin', 'usuarios_UPD_enable', 'ACT', '2024-12-08 00:00:00'),
('Admin', 'funcionesroles_DEL_enable', 'ACT', '2024-12-08 00:00:00'),
('Admin', 'funcionesroles_INS_enable', 'ACT', '2024-12-08 00:00:00'),
('Admin', 'funcionesroles_UPD_enable', 'ACT', '2024-12-08 00:00:00'),
('Supervisor', 'Controllers\\Usuarios\\UsuariosForm', 'ACT', '2024-12-08 00:00:00'),
('Supervisor', 'Controllers\\Usuarios\\UsuariosList', 'ACT', '2024-12-08 00:00:00'),
('Supervisor', 'Menu_Usuarios', 'ACT', '2024-12-08 00:00:00'),
('Supervisor', 'Controllers\\FuncionesRoles\\FuncionesRolesForm', 'ACT', '2024-12-08 00:00:00'),
('Supervisor', 'Controllers\\FuncionesRoles\\FuncionesRolesList', 'ACT', '2024-12-08 00:00:00'),
('Admin', 'Controllers\\Checkout\\Checkout', 'ACT', '2024-12-08 00:00:00'),
('Supervisor', 'Controllers\\Checkout\\Checkout', 'ACT', '2024-12-08 00:00:00'),
('Cliente', 'Controllers\\Checkout\\Checkout', 'ACT', '2024-12-08 00:00:00');
