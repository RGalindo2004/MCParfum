<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{SITE_TITLE}}</title>
    <style>
        body {
            margin: 0;
            font-family: 'Georgia', serif;
            font-style: italic;
            background-color: #E3CBC7;
            color: black;
            text-align: center;
        }

        .container {
            display: inline-block;
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            max-width: 500px;
            margin: 50px auto;
        }

        .titulo {
            font-size: 2.5em;
            color: #A45D5D;
            margin-bottom: 10px;
        }

        h2 {
            font-size: 1.5em;
            color: #333;
        }

        .logo {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin: 20px 0;
            border: 4px solid #A45D5D;
            object-fit: cover;
        }

        .btnCatalogo {
            display: inline-block;
            background-color: #A45D5D;
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 1em;
            transition: background-color 0.3s ease;
        }

        .btnCatalogo:hover {
            background-color: #833939;
        }
    </style>
</head>

<body>
    <div class="container">
        <img src="img/logo.jpeg" alt="Logo de la empresa" class="logo">
        <h1 class="titulo">{{SITE_TITLE}}</h1>
        <h2>Bienvenido a nuestro sitio</h2>
        <p>Explora nuestro catálogo y descubre lo que tenemos para ofrecerte.</p>
        <a href="/catalogo" class="btnCatalogo">Ver Catálogo</a>
    </div>


</body>

</html>