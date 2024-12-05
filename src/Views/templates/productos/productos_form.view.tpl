<link rel="stylesheet" href="public/css_src/home.less"/>

<h1>{{modes_dsc}}</h1>
<section class="grid">
    <form action="index.php?page=Productos_ProductosForm&mode={{mode}}&productId={{productId}}" method="post" class="row">
        {{with producto}}
        <div class="row col-6 offset-3">
            <label class="col-4" for="productId">Código</label>
            <input class="col-8" type="text" name="productId" id="productId" value="{{productId}}" readonly />
        </div>
        <div class="row col-6 offset-3">
            <label class="col-4" for="productName">Nombre de producto</label>
            <input class="col-8" type="text" name="productName" id="productName" value="{{productName}}" {{~readonly}} />
            {{if ~productName_haserror}}
                <div class="error">
                    <ul>
                    {{foreach ~productName_error}}
                        <li>{{this}}</li>
                    {{endfor ~productName_error}}
                    </ul>
                </div>
            {{endif ~productName_haserror}}
        </div>
        <div class="row col-6 offset-3">
            <label class="col-4" for="productDescription">Descripción</label>
            <input class="col-8" type="text" name="productDescription" id="productDescription" value="{{productDescription}}" {{~readonly}}/>
            {{if ~productDescription_haserror}}
                <div class="error">
                    <ul>
                    {{foreach ~productDescription_error}}
                        <li>{{this}}</li>
                    {{endfor ~productDescription_error}}
                    </ul>
                </div>
            {{endif ~productDescription_haserror}}
        </div>
        <div class="row col-6 offset-3">
            <label class="col-4" for="productPrice">Precio</label>
            <input class="col-8" type="text" name="productPrice" id="productPrice" value="{{productPrice}}" {{~readonly}} />
        </div>
        <div class="row col-6 offset-3">
            <label class="col-4" for="productImgUrl">URL imagen</label>
            <input class="col-8" type="text" name="productImgUrl" id="productImgUrl" value="{{productImgUrl}}" {{~readonly}} />
        </div>
        <div class="row col-6 offset-3">
            <label class="col-4" for="productStatus">Estado</label>
            <input class="col-8" type="text" name="productStatus" id="productStatus" value="{{productStatus}}" {{~readonly}} />
        </div>
        <div class="row col-6 offset-3 flex-end">
            {{if ~showConfirm}}
                <button type="submit" class="primary">Confirmar</button>&nbsp;
            {{endif ~showConfirm}}
            <button id="btnCancelar" class="btn">Cancelar</button>
        </div>
        {{if ~global_haserror}}
            <div class="error">
                <ul>
                    {{foreach ~global_error}}
                        <li>{{this}}</li>
                    {{endfor ~global_error}}
                </ul>
            </div>
        {{endif ~global_haserror}}
        {{endwith producto}}
    </form>
</section>
<script>
    document.addEventListener("DOMContentLoaded", ()=>{
        document.getElementById("btnCancelar").addEventListener('click', (e)=>{
            e.preventDefault();
            e.stopPropagation();
            window.location.assign("index.php?page=Productos-ProductosList");
        })
    })
</script>