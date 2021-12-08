<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sistema ABC</title>
  <link rel="stylesheet" href="{{asset('scss/theme.css')}}">
  <link rel="stylesheet" href="{{asset('css/global.css')}}">
  <link rel="stylesheet" href="{{asset('css/Funcionario/AdicionarProduto/styles.css')}}">
  <script src="https://kit.fontawesome.com/47d0300dca.js" crossorigin="anonymous"></script>
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
          <a class="nav-link" href="/Funcionario/Responsaveis">Responsáveis</a>
        </li>
        <li class="nav-item text-start">
          <a class="nav-link" href="/Alunos">Alunos</a>
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
          <strong>Adicionar produto</strong>
        </h3>
      </div>




      <div class="card mt-5 cardMain">
        <div class="d-flex justify-content-start m-2 mb-3">
          <a href="/Funcionario">
            <button class="btn btn-primary">
              <i class="fas fa-arrow-left"></i>
              Voltar
            </button>
          </a>
        </div>
        <div class="card-body cardSecondary">
          <div class="w3-bar w3-black addProduto mb-5">
            <button class="w3-bar-item w3-button btn-primary btn" onclick="produtos('comida')">Comida</button>
            <button class="w3-bar-item w3-button btn-primary btn" onclick="produtos('bebida')">Bebida</button>
          </div>

          <form id="comida" class="products needs-validation" novalidate>
            <div class="row g-2">
              <div class="col-sm-4">
                <label>Código</label>
                <input type="text" class="form-control" placeholder="Código" aria-label="products" required>
              </div>
              <div class="col-sm-8">
                <label>Nome</label>
                <input type="text" class="form-control" placeholder="Nome da comida" aria-label="Nome" required>
              </div>
            </div>
            <div class="row g-2" style="margin-top: 1rem;">
              <div class="col-sm-4">
                <label>Preço</label>
                <input type="text" class="form-control" placeholder="Preço" aria-label="products" required>
              </div>
              <div class="col-sm-8">
                <div class="mb-3">
                  <label>Foto</label>
                  <input class="form-control" type="file" id="formFile" required>
                </div>
              </div>
            </div>
            <h2 class="col-sm-4 ingrediente">Ingredientes</h2>
            <div id="myDIV" class="header" style="margin-top: 1rem;">
              <input type="text" id="myInput" placeholder="Digite o ingrediente" class="col-sm-4 inputIngrediente">
              <span onclick="newElement()" class="addBtn col-sm-4">Adicionar</span>
            </div>

            <ul id="myUL">
            </ul>
            <section class="addComida">
              <button type="submit" class="btn btn-success">Adicionar produto</button>
            </section>
          </form>

          <form id="bebida" class="products needs-validation" novalidate style="display:none">
            <div class="row g-2">
              <div class="col-sm-6">
                <label>Código</label>
                <input type="text" class="form-control" placeholder="Código" aria-label="products" required>
              </div>
              <div class="col-sm-6">
                <label>Nome</label>
                <input type="text" class="form-control" placeholder="Nome da bebida" aria-label="Nome" required>
              </div>
            </div>
            <div class="row g-2" style="margin-top: 1rem;">
              <div class="col-sm-6">
                <label>Preço</label>
                <input type="text" class="form-control" placeholder="Preço" aria-label="products" required>
              </div>
              <div class="col-sm-6">
                <label>Fornecedor</label>
                <input type="text" class="form-control" placeholder="Fornecedor" aria-label="Fornecedor" required>
              </div>
            </div>
            <div class="row g-2" style="margin-top: 1rem;">
              <div class="col-sm-12">
                <div class="mb-3">
                  <label>Foto</label>
                  <input class="form-control" type="file" id="formFile" required>
                </div>
              </div>
            </div>
            <section class="addComida">
              <button type="submit" class="btn btn-success">Adicionar produto</button>
            </section>
          </form>

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
            <a class="nav-link active" aria-current="page" href="../produtos.html">Produtos</a>
          </li>
          <li class="nav-item text-start">
            <a class="nav-link" href="../Responsaveis/listaresponsaveis.html">Responsáveis</a>
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
    function produtos(produto) {
      var i;
      var x = document.getElementsByClassName("products");
      for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
      }
      document.getElementById(produto).style.display = "block";
    }
  </script>

  <script>
    var myNodelist = document.getElementsByTagName("LI");
    var i;

    var close = document.getElementsByClassName("close");
    var i;
    for (i = 0; i < close.length; i++) {
      close[i].onclick = function () {
        var div = this.parentElement;
        div.style.display = "none";
      }
    }

    function newElement() {
      var li = document.createElement("li");
      var inputValue = document.getElementById("myInput").value;
      var t = document.createTextNode(inputValue);
      li.appendChild(t);
      if (inputValue === '') {
        alert("Você deve escrever algo");
      } else {
        document.getElementById("myUL").appendChild(li);
      }
      document.getElementById("myInput").value = "";

      var span = document.createElement("SPAN");
      var txt = document.createTextNode("\u00D7");
      span.className = "close";
      span.appendChild(txt);
      li.appendChild(span);

      for (i = 0; i < close.length; i++) {
        close[i].onclick = function () {
          var div = this.parentElement;
          div.style.display = "none";
        }
      }
    }
  </script>
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
