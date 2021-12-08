<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sistema ABC</title>
  <link rel="stylesheet" href="{{asset('scss/theme.css')}}">
  <link rel="stylesheet" href="{{asset('css/global.css')}}">
  <link rel="stylesheet" href="{{asset('css/Funcionario/ListarProdutos/styles.css')}}">
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
          <strong>Todos os responsáveis</strong>
        </h3>
      </div>
      <!--
      <section class="addProduto">
        <a href="../AdicionarResponsavel/index.html"><button type="button" class="btn btn-success">Adicionar
            responsável</button></a>
      </section> -->

      <div class="card mt-5">
        <div class="card-body container d-flex flex-column justify-content-between align-items-center">
          <div class="row align-self-end">
            <a href="/Funcionario/responsaveis/adicionar"><button type="button" class="btn btn-success">Adicionar
                responsável</button></a>
          </div>
          <div class="container">
            <div class="div-filtro">
              <input class="form-control form-control-sm" type="text" placeholder="Nome">
              <div class="button-buscar">
                <button type="button" class="btn btn-secondary btn-sm">Buscar</button>
              </div>
            </div>
            <table class="table">
              <thead class="thead-light bg-primary">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nome</th>
                  <th scope="col">E-mail</th>
                  <th scope="col">Telefone</th>
                  <th scope="col">CPF</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Mark</td>
                  <td>mark@hotmail.com</td>
                  <td>(71)99122-3123</td>
                  <td>07432093482</td>
                  <td><a class="btn btn-primary btn-sm" href="/Funcionario/responsaveis/editar"><i
                        class="far fa-edit"></i></a></td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>Jacob</td>
                  <td>jacob@hotmail.com</td>
                  <td>(71)99122-3123</td>
                  <td>43244353455</td>
                  <td><a class="btn btn-primary btn-sm" href="../EditarResponsavel/index.html"><i
                        class="far fa-edit"></i></a></td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td>Larry</td>
                  <td>larry@hotmail.com</td>
                  <td>(72)99122-3123</td>
                  <td>23423423423</td>
                  <td><a class="btn btn-primary btn-sm" href="../EditarResponsavel/index.html"><i
                        class="far fa-edit"></i></a></td>
                </tr>
              </tbody>
            </table>
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
</body>

</html>
