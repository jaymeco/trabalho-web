<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ABC: Bloquear Produtos</title>
  <link rel="stylesheet" href="../../../scss/theme.css" />
  <link rel="stylesheet" href="../../../assets/styles/global.css" />
  <link rel="stylesheet" href="./styles.css" />
</head>

<body>
  <section id="global-layout">
    <aside id="sidebar-container" class="d-flex flex-column align-items-center pt-5 shadow-lg">
      <h3 class="text-white">ABCantinas</h3>
      <ul class="sidebar-nav nav flex-column nav-pills nav-fill mt-5">
        <li class="nav-item text-start">
          <a class="nav-link" aria-current="page" href="/Responsavel">Alunos</a>
        </li>
        <li class="nav-item text-start">
          <a class="nav-link active" aria-current="page" href="/Responsavel/alunos/produtos/bloquear">Bloquear
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
          <strong>Bloquear produtos</strong>
        </h3>
      </div>
      <div class="card mt-5">
        <div class="card-body">
          <div class="row justify-content-between">
            <div class="col-md-10 ">
              <select class="form-select" aria-label="Default select example">
                <option selected disabled>Selecione um aluno</option>
                <option value="1">Carlos</option>
                <option value="2">Julia</option>
                <option value="3">Charles</option>
              </select>
            </div>
            <div class="col-md-2 d-flex flex-row align-items-center justify-content-end">
              <button type="submit" class="btn btn-primary">Consultar</button>
            </div>
          </div>

          <div class="mt-5">
            <div class="d-flex flex-row align-items-center justify-content-between">
              <h5 class="fw-bold">Produtos bloqueados</h5>
              <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Bloquear novos produtos
              </button>
            </div>
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
                        <div class="dropdown">
                          <button class="btn more-btn dropdown-toggle" type="button" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="../../../assets/Icons/more-icon.svg" alt="icone">
                          </button>
                          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="#">Desbloquear</a></li>
                          </ul>
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
            <a class="nav-link" aria-current="page" href="../ListagemAlunos/index.html">Alunos</a>
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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>

</html>l
