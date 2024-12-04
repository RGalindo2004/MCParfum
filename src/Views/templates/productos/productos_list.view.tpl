<h1>Listado de Productos</h1>
<section class="WWList">
    <table>
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Nombre producto</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Imagen</th>
                <th>Estado</th>
                <th><a href="index.php?page=Productos_ProductosForm&mode=INS"><i class="fas fa-solid fa-plus"></i></a></th>
            </tr>
        </thead>
        <tbody>
            {{foreach productos}}
                <tr>
                    <td>{{productId}}</td>
                    <td>{{productName}}</td>
                    <td>{{productDescription}}</td>
                    <td>{{productPrice}}</td>
                    <td>{{productImgUrl}}</td>
                    <td>{{estadoDsc}}</td>
                    <td style="display:flex; gap:1rem; justify-content:center; align-items:center">
                        <a href="index.php?page=Productos_ProductosForm&mode=UPD&productId={{productId}}">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="index.php?page=Productos_ProductosForm&mode=DEL&productId={{productId}}">
                            <i class="fas fa-trash"></i>
                        </a>
                        <a href="index.php?page=Productos_ProductosForm&mode=DSP&productId={{productId}}">
                            <i class="fas fa-eye"></i>
                        </a>
                    </td>
                </tr>
            {{endfor productos}}
        </tbody>
    </table>
</section>