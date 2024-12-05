<link rel="stylesheet" href="public/css_src/home.less" />

<h1>Lista de todos los pagos y transacciones</h1>

<section class="WWList">
    <table>
        <style>
            th, td {
                text-align: center;
            }
        </style>
        <thead>
            <tr>
                <th>Pago ID</th>
                <th>Cliente ID</th>
                <th>Total</th>
                <th>Método de pago</th>
                <th>Estado</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            {{foreach pagosTransacciones}}
            <tr>
                <td>{{pagoId}}</td>
                <td>{{usercod}}</td>
                <td>${{total}}</td>
                <td>{{metodoPago}}</td>
                <td>{{estado}}</td>
                <td>{{fechaPago}}</td>
            </tr>
            {{endfor pagosTransacciones}}
        </tbody>
    </table>

    <p><b>Suma total de todas las transacciones: ${{sumaTotal}}</b></p>

    <p>
    <button id="btnCancelar" class="btn"><a href="index.php?page=HomeController">Volver</a></button>
    </p>
</section>