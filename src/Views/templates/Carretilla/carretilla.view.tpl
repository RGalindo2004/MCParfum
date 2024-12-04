<link rel="stylesheet" href="public/css_src/home.less"/>

<h1>Carrito de Compras</h1>

<section class="WWList">
    <table>
        <thead>
            <tr>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Total</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            {{foreach cartItems}}
                <tr>
                    <td>{{productName}}</td>
                    <td>{{crrprc}}</td>
                    <td>{{crrctd}}</td>
                    <td>{{crrctd * crrprc}}</td>
                    <td>
                        <a href="index.php?page=Carretilla-RemoveProducto&productId={{productId}}">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            {{endfor cartItems}}
        </tbody>
    </table>

    <div class="total">
        <h3>Total: ${{total}}</h3>
    </div>
</section>