<link rel="stylesheet" href="public/css_src/home.less" />

<h1>Mi historial de pagos</h1>

<section class="WWList">
    <table>
        <thead>
            <tr>
                <th>Pago ID</th>
                <th>Total</th>
                <th>Método de Pago</th>
                <th>Estado</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            {{foreach transacciones}}
            <tr>
                <td>{{pagoId}}</td>
                <td>${{total}}</td>
                <td>{{metodoPago}}</td>
                <td>{{estado}}</td>
                <td>{{fechaPago}}</td>
            </tr>
            {{endfor transacciones}}
        </tbody>
    </table>

    <p>
    <div><button id="btnVolver" class="btn"><a href="index.php?page=HomeController">Volver</a></button></div>
    </p>
</section>