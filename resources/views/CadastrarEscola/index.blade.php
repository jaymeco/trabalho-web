<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastrar escola</title>
  <link rel="stylesheet" href="{{ asset('scss/theme.css') }}">
  <link rel="stylesheet" href="{{ asset('css/global.css') }}">
  <link rel="stylesheet" href="{{ asset('css/cadastroEscola/styles.css') }}">
</head>

<body>
  <section class="row">
    <div class="col-md-6 d-flex flex-column">
      <h2 class="mt-4 ps-4 fw-bold">Cadastrar escola</h2>
      <form method="POST" action="{{ route('tecnico.cadastro') }}" id="form-cadastro"
        class="d-flex flex-column justify-content-center align-items-center needs-validation" novalidate>
        @csrf
        <div class="container mb-5">
          <h5 class="mb-4 ps-3">Informações da escola</h5>
          <div class="row">
            <div class="col-md-6">
              <div class="form-floating mb-3">
                <input name="nome" type="text" class="form-control" id="floatingInput" placeholder="name@example.com"
                  required>
                <label for="floatingInput">Nome</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating mb-3">
                <input name="email" type="email" class="form-control" id="floatingInput"
                  placeholder="name@example.com" required>
                <label for="floatingInput">E-mail</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating mb-3">
                <input name="endereco" type="text" class="form-control" id="floatingInput"
                  placeholder="name@example.com" required>
                <label for="floatingInput">Endereço</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating mb-3">
                <input name="telefone" type="tel" class="form-control" id="floatingInput"
                  placeholder="name@example.com" required>
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
                <input name="loginFuncionario" type="text" class="form-control" id="floatingInput"
                  placeholder="name@example.com" required>
                <label for="floatingInput">Login</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating mb-3">
                <input name="senhaFuncionario" type="password" class="form-control" id="floatingInput"
                  placeholder="name@example.com" required>
                <label for="floatingInput">Senha</label>
              </div>
            </div>
          </div>
        </div>
        <button class="btn btn-primary mb-2" type="submit">Cadastrar</button>
      </form>
      <form id="logout-form" class="align-self-center" action="{{ route('logout.execute') }}" method="POST">
        @csrf
        <a class="nav-link" href="javascript: document.forms['logout-form'].submit();">Ir para o login</a>
      </form>
    </div>
    <div id="banner-image" class="col-md-6 bg-info d-flex flex-column align-items-center">
      <img alt="Imagem banner" width="450" height="450" src="../../assets/images/onboarding-image.svg" />
      <h2 class="text-white mt-3 fs-1 fw-bold text-wrap">Venha fazer parte dessa história</h2>
    </div>
  </section>
  <div class="toast-container position-absolute" id="toastPlacement" style="position: absolute; top: 5px; right: 40%;">
    <div id="success-toast" class="toast align-items-center text-white bg-success border-0" role="alert"
      aria-live="assertive" aria-atomic="true">
      <div class="d-flex">
        <div class="toast-body">
          @if (session('success'))
            {{ session('success') }}
          @endif
        </div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
          aria-label="Close"></button>
      </div>
    </div>
  </div>
  <div class="toast-container position-absolute" id="toastPlacement" style="position: absolute; top: 5px; right: 40%;">
    <div id="error-toast" class="toast align-items-center text-white bg-danger border-0" role="alert"
      aria-live="assertive" aria-atomic="true">
      <div class="d-flex">
        <div class="toast-body">
          @if (session('error'))
            {{ session('error') }}
          @endif
        </div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
          aria-label="Close"></button>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
  <script>
    (function() {
      'use strict'

      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      let forms = document.querySelectorAll('.needs-validation')

      // Loop over them and prevent submission
      Array.prototype.slice.call(forms)
        .forEach(function(form) {
          form.addEventListener('submit', function(event) {
            if (!form.checkValidity()) {
              event.preventDefault()
              event.stopPropagation()
            }

            form.classList.add('was-validated')
          }, false)
        })
    })()
  </script>
  @if (session('success'))
    <script>
      var mySuccessAlert = document.getElementById('success-toast'); //select id of toast
      var bsSuccessAlert = new bootstrap.Toast(mySuccessAlert); //inizialize it
      bsSuccessAlert.show();
    </script>
  @endif
  @if (session('error'))
    <script>
      var myAlert = document.getElementById('error-toast'); //select id of toast
      var bsAlert = new bootstrap.Toast(myAlert); //inizialize it
      bsAlert.show();
    </script>
  @endif
</body>

</html>
