<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ABC: Bloquear Produtos</title>
  <link rel="stylesheet" href="{{ asset('scss/theme.css') }}">
  <link rel="stylesheet" href="{{ asset('css/global.css') }}">
  <link rel="stylesheet" href="{{ asset('css/Alunos/ExtratoDepositos/styles.css') }}">
</head>

<body>
  <section id="global-layout">
    <aside id="sidebar-container" class="d-flex flex-column align-items-center pt-5 shadow-lg">
      <h3 class="text-white">ABCantinas</h3>
      <ul class="sidebar-nav nav flex-column nav-pills nav-fill mt-5">
        <li class="nav-item text-start">
          <a class="nav-link" href="/Aluno">Saldo disponível</a>
        </li>
        <li class="nav-item text-start">
          <a class="nav-link" href="/Aluno/produtos/comprar">Comprar produtos</a>
        </li>
        <li class="nav-item text-start">
          <a class="nav-link active" href="/Aluno/depositos">Extrato de depósitos</a>
        </li>
        <li class="nav-item text-start">
          <form id="logout-form" action="{{ route('logout.execute') }}" method="POST">
            @csrf
            <a class="nav-link" href="javascript: document.forms['logout-form'].submit();">Sair</a>
          </form>
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
          <strong>Extrato de depósitos</strong>
        </h3>
      </div>
      <div class="card mt-5">
        <div class="card-body">
          <div>
            <table class="table">
              <thead class="bg-primary text-white">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Valor depositado</th>
                  <th scope="col">Data do depósito</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($depositos as $deposito)
                  <tr class="border-primary">
                    <th scope="row">{{ $deposito->id }}</th>
                    <td class="text-black-50">R$ {{ $deposito->valor }}</td>
                    <td class="text-black-50">{{ $deposito->data }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
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
            <a class="nav-link" aria-current="page" href="#">Alunos</a>
          </li>
          <li class="nav-item text-start">
            <a class="nav-link" href="../BloquearProdutos/index.html">Bloquear produtos</a>
          </li>
          <li class="nav-item text-start">
            <a class="nav-link active" href="../ExtratoDepositos/index.html">Extrato de depésitos</a>
          </li>
          <li class="nav-item text-start">
            <a class="nav-link" href="../../Login/index.html">Sair</a>
          </li>
        </ul>
      </div>
    </div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>

</html>
