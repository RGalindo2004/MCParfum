<link rel="stylesheet" href="public/css_src/home.less" />
<link rel="stylesheet" href="public/css/btncarrito.css" />

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
        <a href="index.php?page=Carretilla-ViewCarretilla"><i class="fas fa-shopping-cart"
                id="carritoicono"></i></a>
        <span class="btn-text">
            <div class="texto-animado">
                Carrito de compras
            </div>
        </span>
    </div>
</div>