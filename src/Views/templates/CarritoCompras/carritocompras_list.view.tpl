<link rel="stylesheet" href="public/css_src/home.less" />

<h1>Listado de Carrito de Compras</h1>
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
                <th>Código de Carrito</th>
                <th>Código Anónimo</th>
                <th>Código de Producto</th>
                <th>Nombre del Producto</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Fecha de Compra</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            {{foreach carrito}}
            <tr>
                <td>{{codcarretilla}}</td>
                <td>{{anoncod}}</td>
                <td>{{productId}}</td>
                <td>{{productName}}</td>
                <td>{{crrctd}}</td>
                <td>{{productPrice}}</td>
                <td>{{crrfching}}</td>
                <td>
                    <a href="index.php?page=CarritoCompras-CarritoComprasList&id={{codcarretilla}}">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
            {{endfor carrito}}
        </tbody>
    </table>
    <p>
    <button id="btnCancelar" class="btn"><a href="index.php?page=HomeController" class="">Volver</a></button>
    </p>
</section>