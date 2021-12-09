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
  <script src="https://kit.fontawesome.com/47d0300dca.js" crossorigin="anonymous"></script>
</head>

<body>
  <section id="global-layout">
    <aside id="sidebar-container" class="d-flex flex-column align-items-center pt-5 shadow-lg">
      <h3 class="text-white">ABCantinas</h3>
      <ul class="sidebar-nav nav flex-column nav-pills nav-fill mt-5">
        <li class="nav-item text-start">
          <a class="nav-link active" aria-current="page" href="/Responsavel">Alunos</a>
        </li>
        <li class="nav-item text-start">
          <a class="nav-link" aria-current="page" href="/Responsavel/alunos/produtos/bloquear">Bloquear
            produtos</a>
        </li>
        <li class="nav-item text-start">
          <a class="nav-link" href="/Responsavel/alunos/depositos">Extrato de depósitos</a>
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
          <strong>Todos os alunos</strong>
        </h3>
      </div>
      <div class="card mt-5">
        <div class="card-body">
          <div class="container d-flex flex-column justify-content-between align-items-center">
            <div class="row align-self-end">
              <a href="/Responsavel/alunos/adicionar">
                <button type="button" class="btn btn-success">Adicionar aluno</button>
              </a>
            </div>
            <div class="row mt-5">
              <table id="grid-alunos" class="table">
                <thead class="thead-light bg-primary">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Matrícula</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($alunos as $aluno)
                    <tr>
                      <th scope="row">{{ $aluno->id }}</th>
                      <td>{{ $aluno->nome }}</td>
                      <td>{{ $aluno->matricula }}</td>
                      <td>
                        <div class="dropdown">
                          <a class="btn-sm btn-primary dropdown rounded-circle" href="#" role="button"
                            id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-ellipsis-h"></i>
                          </a>
                          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item"
                                href="{{ route('responsavel.editarAluno.execute', ['alunoId' => $aluno->id]) }}">Editar</a>
                            </li>
                            <li><a class="dropdown-item"
                                href="{{ route('responsavel.ver.historico', ['alunoId' => $aluno->id]) }}">
                                Ver historico
                                de
                                alimentação
                              </a></li>
                            <li><a class="dropdown-item" type="button" data-bs-toggle="modal"
                                data-bs-target="#depositoModal-{{ $aluno->id }}">Realizar Deposito</a></li>
                            <li><a class="dropdown-item" href="#">Excluir</a></li>
                          </ul>
                        </div>
                      </td>
                    </tr>
                    <div class="modal fade" id="depositoModal-{{ $aluno->id }}" tabindex="-1"
                      aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Realizar Deposito</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                              aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <form
                              action="{{ route('responsavel.depositarAluno.execute', ['alunoId' => $aluno->id]) }}"
                              method="POST">
                              @csrf
                              <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Valor do deposito</label>
                                <input type="number" name="valor" class="form-control" id="exampleInputEmail1"
                                  aria-describedby="emailHelp">
                              </div>
                              <h5 class="modal-title" style="margin-bottom: 10px;" id="exampleModalLabel">Forma de
                                Pagamento</h5>
                              <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Numero do Cartão</label>
                                <input type="text" name="numeroCartao" class="form-control"
                                  id="exampleInputPassword1">
                              </div>
                              <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Nome no Cartão</label>
                                <input type="text" name="nomoCartao" class="form-control" id="exampleInputPassword1">
                              </div>
                              <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Data de Validade</label>
                                <input type="date" name="validade" class="form-control" id="exampleInputPassword1">
                              </div>
                              <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Codigo de Segurança</label>
                                <input type="text" name="cvv" class="form-control" id="exampleInputPassword1">
                              </div>
                              <button type="submit" class="btn btn-primary">Realizar Deposito</button>
                            </form>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  @endforeach
                </tbody>
              </table>
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
