<link rel="stylesheet" href="public/css_src/home.less" />
<link rel="stylesheet" href="public/css/btncarrito.css" />

<h1>Ofertas del Día</h1>
<div class="product-list">
    {{foreach productsOnSale}}
    <form action="index.php?page=Carretilla-AddProducto" method="POST" class="row">
        <div class="product" data-productId="{{productId}}">
            <img src="{{productImgUrl}}" alt="{{productName}}">
            <h2>{{productName}}</h2>
            <p>{{productDescription}}</p>
            <span class="price">{{productPrice}}</span>
            <button class="add-to-cart">estoyaqui</button>
        </div>
    </form>
    {{endfor productsOnSale}}
</div>

<h1>Destacados</h1>
<div class="product-list">
    {{foreach productsHighlighted}}
    <div class="product" data-productId="{{productId}}">
        <img src="{{productImgUrl}}" alt="{{productName}}">
        <h2>{{productName}}</h2>
        <p>{{productDescription}}</p>
        <span class="price">{{productPrice}}</span>
        <button class="add-to-cart">Agregar al Carrito</button>
    </div>
    {{endfor productsHighlighted}}
</div>

<h1>Novedades</h1>
<div class="product-list">
    {{foreach productsNew}}
    <div class="product" data-productId="{{productId}}">
        <img src="{{productImgUrl}}" alt="{{productName}}">
        <h2>{{productName}}</h2>
        <p>{{productDescription}}</p>
        <span class="price">{{productPrice}}</span>
        <a href="index.php?page=Carretilla-AddProducto&productid={{productId}}&productPrice={{productPrice}}&productName={{productName}}">
            <button class="add-to-cart">Agregar al Carrito</button>
        </a>
    </div>
    {{endfor productsNew}}
    <div class="carritobtn">
        <a href="index.php?page=CarritoCompras-CarritoComprasList"><i class="fas fa-shopping-cart"
                id="carritoicono"></i></a>
        <span class="btn-text">
            <div class="texto-animado">
                Carrito de compras
            </div>
        </span>
    </div>
</div>
