<link rel="stylesheet" href="public/css_src/home.less" />

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
              <a href="index.php?page=Carretilla-AddProducto&productoid={{productId}}">Hola</a>
        </div>
     
    {{endfor productsNew}}
  
</div>
<div class="product-list">
    {{foreach productsNew}}
    <div class="product" data-productId="{{productId}}">
        <img src="{{productImgUrl}}" alt="{{productName}}">
        <h2>{{productName}}</h2>
        <p>{{productDescription}}</p>
        <span class="price">{{productPrice}}</span>
        <button class="add-to-cart">Agregar al Carrito</button>
    </div>
    {{endfor productsNew}}
</div>