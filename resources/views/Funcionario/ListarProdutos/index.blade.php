<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sistema ABC</title>
  <link rel="stylesheet" href="{{ asset('scss/theme.css') }}">
  <link rel="stylesheet" href="{{ asset('css/global.css') }}">
  <link rel="stylesheet" href="{{ asset('css/Funcionario/ListarProdutos/styles.css') }}">
</head>

<body>
  <section id="global-layout">
    <aside id="sidebar-container" class="d-flex flex-column align-items-center pt-5 shadow-lg">
      <h3 class="text-white">ABCantinas</h3>
      <ul class="sidebar-nav nav flex-column nav-pills nav-fill mt-5">
        <li class="nav-item text-start">
          <a class="nav-link active" aria-current="page" href="/Funcionario">Produtos</a>
        </li>
        <li class="nav-item text-start">
          <a class="nav-link" href="/Funcionario/responsaveis">Responsáveis</a>
        </li>
        <li class="nav-item text-start">
          <a class="nav-link" href="/Funcionario/alunos">Alunos</a>
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
          <strong>Todos os produtos</strong>
        </h3>
      </div>

      <div class="card mt-5">
        <div class="card-body">
          <div class="container d-flex flex-column justify-content-between align-items-center">
            <div class="row align-self-end">
              <a href="/Funcionario/produtos/adicionar">
                <button type="button" class="btn btn-success">Adicionar produto</button>
              </a>
            </div>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4">
              @foreach ($produtos as $produto)
                <div class="col-md-{{ count($produtos) < 4 ? count($produtos) + 1 : count($produtos) }}">
                  <div class="card mt-3" style="width: 14.5rem;">
                    <img src="{{ $produto->foto }}" height="150" class="card-img-top" alt="produto - carro">
                    <div class="card-body pb-0 px-3">
                      <div class="row align-items-center justify-content-between ">
                        <div class="col-md-7 p-0">
                          <p class="mb-0 fw-bold">
                            #{{ $produto->codigo }}
                          </p>
                          @if ($produto->is_block_produto)
                            <p class="mb-0 text-warning">
                              Bloqueado
                            </p>
                          @endif
                        </div>
                        <div class="col-md-4 p-0 d-flex justify-content-end">
                          <div class="dropdown">
                            <button class="btn more-btn dropdown-toggle" type="button"
                              id="dropdownMenuButton-{{ $produto->id }}" data-bs-toggle="dropdown"
                              aria-expanded="false">
                              <img src="../../assets/Icons/more-icon.svg" alt="icone">
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton-{{ $produto->id }}">
                              @if ($produto->is_block_produto)
                                <li>
                                  <form id="desbloq-{{ $produto->id }}" method="POST"
                                    action="{{ route('funcionario.desbloquear.produto', ['produtoId' => $produto->id]) }}">
                                    @csrf
                                    <a class="dropdown-item"
                                      href="javascript: document.forms['desbloq-{{ $produto->id }}'].submit();"
                                      {{-- onclick="document.getElementById('desbloq-{{ $produto->id }}').submit()" --}}>
                                      Desbloquear
                                    </a>
                                  </form>
                                </li>
                              @else
                                <form id="bloq-{{ $produto->id }}" method="POST"
                                  action="{{ route('funcionario.bloquear.produto', ['produtoId' => $produto->id]) }}">
                                  @csrf
                                  <li>
                                    <a class="dropdown-item"
                                      href="javascript: document.forms['bloq-{{ $produto->id }}'].submit();">
                                      Bloquear
                                    </a>
                                  </li>
                                </form>
                              @endif
                              <li><a class="dropdown-item" href="#" type="button" data-bs-toggle="modal"
                                  data-bs-target="#modalEditProduto-{{ $produto->id }}">Editar</a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class=" row align-items-center justify-content-between mt-2">
                        <div class="col-md-8 p-0">
                          <p class="fw-bold fs-6 mb-1">
                            {{ $produto->nome }}
                          </p>
                        </div>
                        <div class="col-md-4 p-0 text-end">
                          <p class="text-primary mb-1">R$ {{ $produto->preco }}</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal fade" id="modalEditProduto-{{ $produto->id }}" tabindex="-1"
                  aria-labelledby="modalEditarProdutoLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title fw-bold" id="modalEditarProdutoLabel">Editar produto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                          aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="row">
                          <div class="col-sm">
                            <div class="col-sm">
                              <img src="{{$produto->foto}}" class="card-img-top" alt="Coxinha"
                                style="height: 15rem; height: 15rem;">
                            </div>
                            <form id="edit-{{ $produto->id }}" method="POST"
                              action="{{ route('funcionario.editar.produto', ['produtoId' => $produto->id]) }}">
                              @method('PUT')
                              @csrf
                              <div class="row g-3" style="margin-top: 0.5rem;">
                                <div class="col">
                                  <label>Nome</label>
                                  <input type="text" value="{{ $produto->nome }}" class="form-control"
                                    placeholder="Nome" name="nome" aria-label="Nome">
                                </div>
                                <div class="col">
                                  <label>Código</label>
                                  <input type="text" value="{{ $produto->codigo }}" class="form-control"
                                    placeholder="Código" name="codigo" aria-label="Código">
                                </div>
                              </div>
                              <div class="row g-3" style="margin-top: 0.5rem;">
                                <div class="col">
                                  <label>Preço</label>
                                  <input type="text" value="{{ $produto->preco }}" class="form-control"
                                    placeholder="Preço" name="preco" aria-label="Nome">
                                </div>
                                @if ($produto->ingredientes != '')
                                  <div class="col">
                                    <label>Ingredientes</label>
                                    <input type="text" value="{{ $produto->ingredientes }}" class="form-control"
                                      placeholder="Ingredientes" name="ingredientes" aria-label="Ingredientes">
                                  </div>
                                @endif
                                @if ($produto->fornecedor != '')
                                  <div class="col">
                                    <label>Fornecedor</label>
                                    <input type="text" name="fornecedor" value="{{ $produto->fornecedor }}"
                                      class="form-control" placeholder="Ingredientes" aria-label="Ingredientes">
                                  </div>
                                @endif
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" onclick="document.forms['edit-{{ $produto->id }}'].submit();"
                          class="btn btn-primary">Editar</button>
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
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
            <a class="nav-link" href="./Responsaveis/adicionarresponsavel.html">Responsáveis</a>
          </li>
          <li class="nav-item text-start">
            <a class="nav-link" href="#">Alunos</a>
          </li>
          <li class="nav-item text-start">
            <a class="nav-link" href="../Login/index.html">Sair</a>
          </li>
        </ul>
      </div>
    </div>

    <div class="toast-container position-absolute" id="toastPlacement"
      style="position: absolute; top: 5px; right: 40%;">
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
    <div class="toast-container position-absolute" id="toastPlacement"
      style="position: absolute; top: 5px; right: 40%;">
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

  </section>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
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
