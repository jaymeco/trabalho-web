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

              <div class="col-md-3">
                <div class="card mt-3" style="width: 14.5rem;">
                  <img src="../../assets/images/sanduiche.jfif" class="card-img-top" alt="produto - carro">
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
                            <img src="../../assets/Icons/more-icon.svg" alt="icone">
                          </button>
                          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="#">Bloquear</a></li>
                            <li><a class="dropdown-item" href="#" type="button" data-bs-toggle="modal"
                                data-bs-target="#modalEditProduto">Editar</a></li>
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

              <div class="col-md-3">
                <div class="card mt-3" style="width: 14.5rem;">
                  <img src="../../assets/images/sanduiche.jfif" class="card-img-top" alt="produto - carro">
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
                            <img src="../../assets/Icons/more-icon.svg" alt="icone">
                          </button>
                          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="#">Bloquear</a></li>
                            <li><a class="dropdown-item" href="#" type="button" data-bs-toggle="modal"
                                data-bs-target="#modalEditProduto">Editar</a></li>
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

              <div class="col-md-3">
                <div class="card mt-3" style="width: 14.5rem;">
                  <img src="../../assets/images/sanduiche.jfif" class="card-img-top" alt="produto - carro">
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
                            <img src="../../assets/Icons/more-icon.svg" alt="icone">
                          </button>
                          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="#">Bloquear</a></li>
                            <li><a class="dropdown-item" href="#" type="button" data-bs-toggle="modal"
                                data-bs-target="#modalEditProduto">Editar</a></li>
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

              <div class="col-md-3">
                <div class="card mt-3" style="width: 14.5rem;">
                  <img src="../../assets/images/sanduiche.jfif" class="card-img-top" alt="produto - carro">
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
                            <img src="../../assets/Icons/more-icon.svg" alt="icone">
                          </button>
                          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="#">Bloquear</a></li>
                            <li><a class="dropdown-item" href="#" type="button" data-bs-toggle="modal"
                                data-bs-target="#modalEditProduto">Editar</a></li>
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

    <div class="modal fade" id="modalEditProduto" tabindex="-1" aria-labelledby="modalEditarProdutoLabel"
      aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title fw-bold" id="modalEditarProdutoLabel">Editar produto</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-sm">
                <div class="col-sm">
                  <img src="../../assets/images/sanduiche.jfif" class="card-img-top" alt="Coxinha"
                    style="height: 15rem; height: 15rem;">
                </div>
                <div class="row g-3" style="margin-top: 0.5rem;">
                  <div class="col">
                    <label>Nome</label>
                    <input type="text" class="form-control" placeholder="Nome" aria-label="Nome">
                  </div>
                  <div class="col">
                    <label>Código</label>
                    <input type="text" class="form-control" placeholder="Código" aria-label="Código">
                  </div>
                </div>
                <div class="row g-3" style="margin-top: 0.5rem;">
                  <div class="col">
                    <label>Preço</label>
                    <input type="text" class="form-control" placeholder="Preço" aria-label="Nome">
                  </div>
                  <div class="col">
                    <label>Ingredientes</label>
                    <input type="text" class="form-control" placeholder="Ingredientes" aria-label="Código">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary"
              onclick="alert('Produto editado com sucesso.')">Editar</button>
          </div>
        </div>
      </div>
    </div>

  </section>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
    crossorigin="anonymous"></script>
</body>

</html>
