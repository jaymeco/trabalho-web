<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="{{ asset('scss/theme.css') }}">
  <link rel="stylesheet" href="{{ asset('css/global.css') }}">
  <link rel="stylesheet" href="{{ asset('css/Login/styles.css') }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100;200;300;400;500&display=swap"
    rel="stylesheet">
</head>

<body>
  <header>
    <img src="{{ asset('assets/images/logomarca.png') }}" alt="Logomarca" />
    <section>
      <h2>ABCantina</h2>
      <span>O melhor sistema de cantinas</span>
    </section>
    <div>
      <span>Entre com seu login</span>
      <form method="POST" action="{{ route('login.execute') }}" id="login-form" class="row g-3 needs-validation"
        novalidate>
        @csrf
        <div class="col-auto">
          <label for="inputPassword2" class="visually-hidden">Login</label>
          <input name="login" type="text" class="form-control" id="inputText" placeholder="Digite seu usuario"
            required>
          <div class="invalid-feedback">
            Informe seu login
          </div>
        </div>
        <div class="col-auto">
          <label for="inputPassword2" class="visually-hidden">Senha</label>
          <input name="password" type="password" class="form-control" id="inputPassword2"
            placeholder="Digite sua senha" required>
          <div class="invalid-feedback">
            Informe seu senha
          </div>
        </div>
        <div class="col-auto">
          <button type="submit" class="btn btn-primary mb-3">Entrar</button>
        </div>
      </form>
      <!-- <span>Cadastre uma nova escola </span> <a href="../CadastroEscola/index.html">clicando aqui</a> -->
    </div>
  </header>

  <div class="row mx-lg-n5 container-fluid">
    <div class="col py-0 px-lg-5 border bg-light">
      <h2 class="text-black mt-3 fs-1 text-wrap">Venha fazer parte dessa história!</h2>
      <p>O ABCantinas tem como objetivo realizar o controle dos gastos dos alunos,
        facilitar a comprar dos lanches, registrar seus gastos através
        do nosso sistema.</p>

      <p>Como responsável, o sistema possui recursos de alerta e bloqueio de produtos,
        fazer a aquisição de um lanche para seu filho.</p>
      <p>Como funcionário, o sistema possibilita adicionar, editar e excluir
        produtos, inserir e editar responsáveis, consultar o saldo dos alunos.</p>
      <p>CADATRE LOGO SUA ESCOLA EM NOSSO SISTEMA!</p>
      <img src="{{ asset('assets/images/escola.jpg') }}" width="280" />
    </div>
    <div class="col py-3 px-lg-5 border bg-light">
      <h2 class="text-black mt-3 fs-1 text-wrap">Vantagens de nosso sistema</h2>
      <section>
        <div class="teste">
          <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-check-lg"
            viewBox="0 0 16 16">
            <path
              d="M13.485 1.431a1.473 1.473 0 0 1 2.104 2.062l-7.84 9.801a1.473 1.473 0 0 1-2.12.04L.431 8.138a1.473 1.473 0 0 1 2.084-2.083l4.111 4.112 6.82-8.69a.486.486 0 0 1 .04-.045z" />
          </svg>
          <span>Redução de Filas</span>
        </div>
        <div class="teste">
          <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-check-lg"
            viewBox="0 0 16 16">
            <path
              d="M13.485 1.431a1.473 1.473 0 0 1 2.104 2.062l-7.84 9.801a1.473 1.473 0 0 1-2.12.04L.431 8.138a1.473 1.473 0 0 1 2.084-2.083l4.111 4.112 6.82-8.69a.486.486 0 0 1 .04-.045z" />
          </svg>
          <span>Aumento da Produtividade</span>
        </div>
        <div class="teste">
          <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-check-lg"
            viewBox="0 0 16 16">
            <path
              d="M13.485 1.431a1.473 1.473 0 0 1 2.104 2.062l-7.84 9.801a1.473 1.473 0 0 1-2.12.04L.431 8.138a1.473 1.473 0 0 1 2.084-2.083l4.111 4.112 6.82-8.69a.486.486 0 0 1 .04-.045z" />
          </svg>
          <span>Atendimento mais rápido</span>
        </div>
        <div class="teste">
          <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-check-lg"
            viewBox="0 0 16 16">
            <path
              d="M13.485 1.431a1.473 1.473 0 0 1 2.104 2.062l-7.84 9.801a1.473 1.473 0 0 1-2.12.04L.431 8.138a1.473 1.473 0 0 1 2.084-2.083l4.111 4.112 6.82-8.69a.486.486 0 0 1 .04-.045z" />
          </svg>
          <span>Gerenciamento de gastos</span>
        </div>
        <div class="teste">
          <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-check-lg"
            viewBox="0 0 16 16">
            <path
              d="M13.485 1.431a1.473 1.473 0 0 1 2.104 2.062l-7.84 9.801a1.473 1.473 0 0 1-2.12.04L.431 8.138a1.473 1.473 0 0 1 2.084-2.083l4.111 4.112 6.82-8.69a.486.486 0 0 1 .04-.045z" />
          </svg>
          <span>Gerenciamento do consumo</span>
        </div>
        <div class="teste">
          <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-check-lg"
            viewBox="0 0 16 16">
            <path
              d="M13.485 1.431a1.473 1.473 0 0 1 2.104 2.062l-7.84 9.801a1.473 1.473 0 0 1-2.12.04L.431 8.138a1.473 1.473 0 0 1 2.084-2.083l4.111 4.112 6.82-8.69a.486.486 0 0 1 .04-.045z" />
          </svg>
          <span>Consulta das transações online</span>
        </div>
        <footer style="display: flex; justify-content: center;">
          <small>&copy; Copyright 2021, ABCantinas</small>
        </footer>
      </section>
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
  @if (session('error'))
    <script>
      var myAlert = document.getElementById('error-toast'); //select id of toast
      var bsAlert = new bootstrap.Toast(myAlert); //inizialize it
      bsAlert.show();
    </script>
  @endif
  <!-- <script src="./script.js"></script> -->
</body>

</html>
