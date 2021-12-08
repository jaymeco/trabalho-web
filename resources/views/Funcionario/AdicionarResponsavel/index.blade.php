<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sistema ABC</title>
  <link rel="stylesheet" href="{{asset('scss/theme.css')}}">
  <link rel="stylesheet" href="{{asset('css/global.css')}}">
  <link rel="stylesheet" href="{{asset('css//Funcionario/ListarProdutos/styles.css')}}">
  <script src="https://kit.fontawesome.com/47d0300dca.js" crossorigin="anonymous"></script>
</head>

<body>
  <section id="global-layout">
    <aside id="sidebar-container" class="d-flex flex-column align-items-center pt-5 shadow-lg">
      <h3 class="text-white">ABCantinas</h3>
      <ul class="sidebar-nav nav flex-column nav-pills nav-fill mt-5">
        <li class="nav-item text-start">
          <a class="nav-link" aria-current="page" href="/Funcionario">Produtos</a>
        </li>
        <li class="nav-item text-start">
          <a class="nav-link active" aria-current="page" href="/Funcionario/responsaveis">Responsáveis</a>
        </li>
        <li class="nav-item text-start">
          <a class="nav-link" href="/Funcionario/alunos">Alunos</a>
        </li>
        <li class="nav-item text-start">
          <a class="nav-link" href="/">Sair</a>
        </li>
      </ul>
    </aside>
    <main id="page-container" class="pt-4 pb-5 overflow-auto">
      <div class="d-flex flex-column page-header">
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample"
          aria-controls="offcanvasExample">
          <span class="navbar-toggler-icon"></span>
        </button>
        <h3>
          <strong>Adicionar responsável</strong>
        </h3>
      </div>

      <div class="card mt-5">
        <div class="d-flex justify-content-start m-2 mb-3">
          <a href="/Funcionario/responsaveis">
            <button class="btn btn-primary">
              <i class="fas fa-arrow-left"></i>
              Voltar
            </button>
          </a>
        </div>
        <div class="card-body">
          <div class="container conten-margem">
            <form class="products needs-validation" novalidate>
              <div class="form-group col-md-6">
                <label for="inputNome">Nome</label>
                <input type="text" class="form-control" id="inputNome" placeholder="Ex: Maria" required>
              </div>
              <div class="form-group col-md-6">
                <label for="inputEmail">E-mail</label>
                <input type="text" class="form-control" id="inputEmail" placeholder="Ex: maria@hotmail.com" required>
              </div>
              <div class="row">
                <div class="form-group col-md-3">
                  <label for="inputCel">Telefone</label>
                  <input type="tel" maxlength="11" class="form-control" id="inputCel" required>
                </div>
                <div class="form-group col-md-3">
                  <label for="inputCPF">CPF</label>
                  <input type="text" maxlength="11" class="form-control" id="inputCPF" required>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-3">
                  <label for="inputLogin">Login</label>
                  <input type="email" class="form-control" id="inputLogin" required>
                </div>
                <div class="form-group col-md-3">
                  <label for="inputPassword4">Senha</label>
                  <input type="password" class="form-control" id="inputPassword4" required>
                </div>
              </div>
              <div class="btn-aling">
                <button type="submit" class="btn btn-success btn-position">Adicionar responsável</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </main>

    <div class="offcanvas offcanvas-start bg-primary" tabindex="-1" id="offcanvasExample"
      aria-labelledby="offcanvasExampleLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title text-white" id="offcanvasExampleLabel">
          ABCcantinas
        </h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body px-0">
        <ul class="sidebar-nav nav flex-column nav-pills nav-fill mt-5">
          <li class="nav-item text-start">
            <a class="nav-link active" aria-current="page" href="./produtos.html">Produtos</a>
          </li>
          <li class="nav-item text-start">
            <a class="nav-link" href="#">Responsáveis</a>
          </li>
          <li class="nav-item text-start">
            <a class="nav-link" href="#">Alunos</a>
          </li>
          <li class="nav-item text-start">
            <a class="nav-link" href="../../Login/index.html">Sair</a>
          </li>
        </ul>
      </div>
    </div>
  </section>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
    crossorigin="anonymous"></script>
  <script>
    (function () {
      'use strict'

      var forms = document.querySelectorAll('.needs-validation')

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
