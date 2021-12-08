<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastrar escola</title>
  <link rel="stylesheet" href="{{asset('scss/theme.css')}}">
  <link rel="stylesheet" href="{{asset('css/global.css')}}">
  <link rel="stylesheet" href="{{asset('css/cadastroEscola/styles.css')}}">
</head>

<body>
  <section class="row">
    <div class="col-md-6 d-flex flex-column">
      <h2 class="mt-4 ps-4 fw-bold">Cadastrar escola</h2>
      <form action="" id="form-cadastro"
        class="d-flex flex-column justify-content-center align-items-center needs-validation" novalidate>
        <div class="container mb-5">
          <h5 class="mb-4 ps-3">Informações da escola</h5>
          <div class="row">
            <div class="col-md-6">
              <div class="form-floating mb-3">
                <input name="name" type="text" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                <label for="floatingInput">Nome</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating mb-3">
                <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                <label for="floatingInput">E-mail</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating mb-3">
                <input name="address" type="text" class="form-control" id="floatingInput"
                  placeholder="name@example.com" required>
                <label for="floatingInput">Endereço</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating mb-3">
                <input name="phone" type="tel" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                <label for="floatingInput">Telefone</label>
              </div>
            </div>

          </div>
        </div>
        <div class="container mb-3">
          <h5 class="mb-4 ps-3">Informações do funcionário</h5>
          <div class="row">
            <div class="col-md-6">
              <div class="form-floating mb-3">
                <input name="login" type="text" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                <label for="floatingInput">Login</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating mb-3">
                <input name="password" type="password" class="form-control" id="floatingInput"
                  placeholder="name@example.com" required>
                <label for="floatingInput">Senha</label>
              </div>
            </div>
          </div>
        </div>
        <button class="btn btn-primary mb-2" type="submit">Cadastrar</button>
        <a href="/" class="text-decoration-none">
          Ir para o Login
        </a>
      </form>
    </div>
    <div id="banner-image" class="col-md-6 bg-info d-flex flex-column align-items-center">
      <img alt="Imagem banner" width="450" height="450" src="../../assets/images/onboarding-image.svg" />
      <h2 class="text-white mt-3 fs-1 fw-bold text-wrap">Venha fazer parte dessa história</h2>
    </div>
  </section>
  <script>
    (function () {
      'use strict'

      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      let forms = document.querySelectorAll('.needs-validation')

      // Loop over them and prevent submission
      Array.prototype.slice.call(forms)
        .forEach(function (form) {
          form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
              event.preventDefault()
              event.stopPropagation()
            }

            form.classList.add('was-validated')
          }, false)
        })
    })()
  </script>
</body>

</html>
