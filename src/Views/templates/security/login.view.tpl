<link rel="stylesheet" href="public/css_src/home.less" />

<section class="fullCenter">
  <form class="grid" method="post" action="index.php?page=sec_login{{if redirto}}&redirto={{redirto}}{{endif redirto}}">
    <section class="depth-1 row col-12 col-m-8 offset-m-2 col-xl-6 offset-xl-3">
      <h1 class="col-12">Iniciar Sesión</h1>
    </section>
    <section class="depth-1 py-5 row col-12 col-m-8 offset-m-2 col-xl-6 offset-xl-3">
      <div class="row">
        <label class="col-12 col-m-4 flex align-center" for="txtUserEmail">Usuario o Correo Electrónico</label>
        <div class="col-12 col-m-8">
          <input class="width-full" type="text" id="txtUserEmail" name="txtUserEmail" value="{{txtUserEmail}}" />
        </div>
        {{if errorUserEmail}}
          <div class="error col-12 py-2 col-m-8 offset-m-4">{{errorUserEmail}}</div>
        {{endif errorUserEmail}}
      </div>
      <div class="row">
        <label class="col-12 col-m-4 flex align-center" for="txtPswd">Contraseña</label>
        <div class="col-12 col-m-8">
         <input class="width-full" type="password" id="txtPswd" name="txtPswd" value="{{txtPswd}}" />
        </div>
        {{if errorPswd}}
        <div class="error col-12 py-2 col-m-8 offset-m-4">{{errorPswd}}</div>
        {{endif errorPswd}}
      </div>
    {{if generalError}}
      <div class="row">
        {{generalError}}
      </div>
    {{endif generalError}}
    <div>
      <a href="index.php?page=Sec_Register"><u>¿No tienes cuenta? ¡Regístrate!</u></a>
    </div>
    <div class="row right flex-end px-4">
      <button class="primary" id="btnLogin" type="submit">Iniciar Sesión</button>
    </div>
    </section>
  </form>
</section>