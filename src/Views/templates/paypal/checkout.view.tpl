<link rel="stylesheet" href="public/css_src/home.less" />

<h2>Resumen de la compra</h2>

<section class="WWList">
  <table class="">
    <tr>
      <td><strong>Subtotal:</strong></td>
      <td>${{subtotal}}</td>
    </tr>
    <tr>
      <td><strong>Impuesto (15%):</strong></td>
      <td>${{impuesto}}</td>
    </tr>

    <td colspan="2">
      <hr />
    </td>
    </tr>
    <tr>
      <td><strong>Total:</strong></td>
      <td>${{total}}</td>
    </tr>
  </table>
</section>

<p>
<form action="index.php?page=checkout_checkout" method="post">
  <button type="submit">Pagar</button>
  </p>
</form>