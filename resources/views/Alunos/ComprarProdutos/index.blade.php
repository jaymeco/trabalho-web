<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ABC: Comprar Produtos</title>
  <link rel="stylesheet" href="{{ asset('scss/theme.css') }}">
  <link rel="stylesheet" href="{{ asset('css/global.css') }}">
  <link rel="stylesheet" href="{{ asset('css/Alunos/ComprarProdutos/styles.css') }}">

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
          <a class="nav-link active" href="/Aluno/produtos/comprar">Comprar produtos</a>
        </li>
        <li class="nav-item text-start">
          <a class="nav-link " href="/Aluno/depositos">Extrato de depósitos</a>
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
          <strong>Comprar produtos</strong>
        </h3>
      </div>
      <div class="card mt-5">
        <div class="card-body">
          <div class="row">
            <div class="d-flex flex-row align-items-center justify-content-between">
              <h5 class="fw-bold">Comidas</h5>
            </div>
            @foreach ($produtos as $produto)
              @if ($produto->tipo == 'comida')

                <div class="col-sm">
                  <div class="col-sm">
                    <a type="button" data-bs-toggle="modal" data-bs-target="#modalcomprarproduto-{{ $produto->id }}">
                      <div class="mt-1 d-flex flex-wrap">
                        <div class="col-md-3">
                          <div class="card mt-3" style="width: 14.5rem;">
                            <img src="{{ $produto->foto }}" class="card-img-top" alt="produto - carro">
                            <div class="card-body pb-0 px-3">
                              <div class="row align-items-center justify-content-between ">
                                <div class="col-md-7 p-0">
                                  <p class="mb-0 fw-bold">
                                    #{{ $produto->codigo }}
                                  </p>
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
                      </div>
                    </a>
                  </div>
                </div>
                <div class="modal fade" id="modalcomprarproduto-{{ $produto->id }}" tabindex="-1"
                  aria-labelledby="modalcomprarprodutoLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title fw-bold" id="modalcomprarprodutoLabel">{{ $produto->nome }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                          aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="row">
                          <div class="col-sm">
                            <img src="{{ $produto->foto }}" class="card-img-top" alt="produto - carro">
                          </div>
                          <div class="col-sm">
                            <p>Ingredientes:
                              <span class="font-p">
                                {{ $produto->ingredientes }}
                              </span>
                            </p>
                            <p class="text-primary mb-1">R$ {{ $produto->preco }}</p>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <form method="POST" action="{{ route('aluno.comprar.produtos.execute', ['produtoId' => $produto->id]) }}">
                          @csrf
                          <input type="hidden" name="valor" value="{{ $produto->preco }}">
                          <button type="submit" class="btn btn-primary">Comprar</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              @endif
            @endforeach
          </div>
          <div class="d-flex flex-row align-items-center justify-content-between m-t-50">
            <h5 class="fw-bold">Bebidas</h5>
          </div>
          <div class="mt-1 d-flex flex-wrap">
            @foreach ($produtos as $produto)
              @if ($produto->tipo == 'bebida')
                <a type="button" data-bs-toggle="modal" data-bs-target="#modalcomprarproduto-{{ $produto->id }}">
                  <div class="col-md-3">
                    <div class="card mt-3" style="width: 14.5rem;">
                      <img src="{{ $produto->foto }}" class="card-img-top" alt="produto - carro">
                      <div class="card-body pb-0 px-3">
                        <div class="row align-items-center justify-content-between ">
                          <div class="col-md-7 p-0">
                            <p class="mb-0 fw-bold">
                              #{{ $produto->codigo }}
                            </p>
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
                </a>
                <div class="modal fade" id="modalcomprarproduto-{{ $produto->id }}" tabindex="-1"
                  aria-labelledby="modalcomprarprodutoLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title fw-bold" id="modalcomprarprodutoLabel">{{ $produto->nome }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                          aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="row">
                          <div class="col-sm">
                            <img src="{{ $produto->foto }}" class="card-img-top" alt="produto - carro">
                          </div>
                          <div class="col-sm">
                            <p>Fornecedor:
                              <span class="font-p">
                                {{ $produto->fornecedor }}
                              </span>
                            </p>
                            <p class="text-primary mb-1">R$ {{ $produto->preco }}</p>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <form method="POST" action="{{ route('aluno.comprar.produtos.execute', ['produtoId' => $produto->id]) }}">
                          @csrf
                          <input type="hidden" name="valor" value="{{ $produto->preco }}">
                          <button type="submit" class="btn btn-primary">Comprar</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              @endif
            @endforeach
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
            <a class="nav-link active" href="../BloquearProdutos/index.html">Bloquear produtos</a>
          </li>
          <li class="nav-item text-start">
            <a class="nav-link" href="../ExtratoDepositos/index.html">Extrato de depésitos</a>
          </li>
          <li class="nav-item text-start">
            <a class="nav-link" href="../../Login/index.html">Sair</a>
          </li>
        </ul>
      </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Bloquear produtos</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="mt-1 d-flex flex-wrap">
              <div class="col-md-3">
                <div class="card mt-3" style="width: 14.5rem;">
                  <img src="../../../assets/images/suco.jpg" class="card-img-top" alt="produto - carro">
                  <div class="card-body pb-0 px-3">
                    <div class="row align-items-center justify-content-between ">
                      <div class="col-md-7 p-0">
                        <p class="mb-0 fw-bold">
                          #000000
                        </p>
                      </div>
                      <div class="col-md-4 p-0 d-flex justify-content-end">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        </div>
                      </div>
                    </div>
                    <div class=" row align-items-center justify-content-between mt-2">
                      <div class="col-md-8 p-0">
                        <p class="fw-bold fs-6 mb-1">
                          Pastel de frango
                        </p>
                      </div>
                      <div class="col-md-4 p-0 text-end">
                        <p class="text-primary mb-1">R$ 10,00</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-primary">Salvar mudanças</button>
          </div>
        </div>
      </div>
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
