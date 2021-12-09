<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sistema ABC</title>
  <link rel="stylesheet" href="{{ asset('scss/theme.css') }}">
  <link rel="stylesheet" href="{{ asset('css/global.css') }}">
  <link rel="stylesheet" href="{{ asset('css/Funcionario/AdicionarProduto/styles.css') }}">
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
            <a href="{{ route('funcionario.adicionar.produto', ['flag' => 'comida']) }}">
              <button class="w3-bar-item w3-button btn-primary btn">
                Comida
                {{ app('request')->input('test') }}
              </button>
            </a>
            <a href="{{ route('funcionario.adicionar.produto', ['flag' => 'bebida']) }}">
              <button class="w3-bar-item w3-button btn-primary btn">Bebida</button>
            </a>
          </div>

          <form id="form-produto" method="POST" action="{{ route('funcionario.adicionar.produto.execute') }}"
            class="products needs-validation" novalidate>
            @csrf
            <div class="row g-2">
              <div class="col-sm-4">
                <label>Código</label>
                <input name="codigo" type="text" class="form-control" placeholder="Código" aria-label="products"
                  required>
              </div>
              <div class="col-sm-8">
                <label>Nome</label>
                <input name="nome" type="text" class="form-control" placeholder="Nome da comida" aria-label="Nome"
                  required>
              </div>
            </div>
            <div class="row g-2" style="margin-top: 1rem;">
              <div class="col-sm-4">
                <label>Preço</label>
                <input name="preco" type="text" class="form-control" placeholder="Preço" aria-label="products"
                  required>
              </div>
              <div class="col-sm-8">
                <div class="mb-3">
                  <label>Foto</label>
                  <input name="foto" placeholder="Ex.: https://example.com.br/image.png" class="form-control"
                    type="text" id="formFile" required>
                </div>
              </div>
            </div>
            @if ($initialFlag == app('request')->input('flag') || app('request')->input('flag') == '')
              <div id="comida-diff">
                <h2 class="col-sm-4 ingrediente">Ingredientes</h2>
                <div id="myDIV" class="header" style="margin-top: 1rem;">
                  <input type="text" id="myInput" placeholder="Digite o ingrediente" class="col-sm-4 inputIngrediente">
                  <span onclick="newElement()" class="addBtn col-sm-4">Adicionar</span>
                </div>
                <input type="hidden" name="flag" value="comida" class="col-sm-4">

                <ul id="myUL">
                </ul>
              </div>
            @else
              <div id="bebida-diff">
                <input type="hidden" name="flag" value="bebida" class="col-sm-4">
                <div class="row g-2" style="margin-top: 1rem;">
                  <div class="col-sm-12">
                    <div class="mb-3">
                      <label>Fornecedor</label>
                      <input name="fornecedor" type="text" class="form-control" placeholder="Fornecedor"
                        aria-label="Fornecedor" required>
                    </div>
                  </div>
                </div>
              </div>
            @endif


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
  <script>
    function produtos(produto) {
      // var i;
      // var x = document.getElementsByClassName("products");
      // for (i = 0; i < x.length; i++) {
      //   x[i].style.display = "none";
      // }
      switch (produto) {
        case 'comida':
          console.log(produto);
          document.getElementById('bebida-diff').style.display = "none";
          document.getElementById('comida-diff').style.display = "block";
          break;
        case 'bebida':
          document.getElementById('comida-diff').style.display = "none";
          document.getElementById('bebida-diff').style.display = "block";
          break;
        default:
          break;
      }
    }
  </script>

  <script>
    var myNodelist = document.getElementsByTagName("LI");
    var i;

    var close = document.getElementsByClassName("close");
    var i;
    for (i = 0; i < close.length; i++) {
      close[i].onclick = function() {
        var div = this.parentElement;
        document.getElementById(`ingrediente_${i}`).remove();
        div.remove();
        // div.style.display = "none";
      }
    }

    function newElement() {
      var li = document.createElement("li");
      li.className = 'ingrediente-item';
      let input = document.createElement('input');

      let num = document.getElementsByClassName('ingrediente-item').length;
      input.setAttribute('type', 'hidden');
      input.setAttribute('id', `ingrediente_${num+1}`);
      input.setAttribute('name', `ingrediente_${num+1}`);

      var inputValue = document.getElementById("myInput").value;
      let form = document.getElementById('form-produto');
      var t = document.createTextNode(inputValue);
      li.appendChild(t);
      if (inputValue === '') {
        alert("Você deve escrever algo");
      } else {
        document.getElementById("myUL").appendChild(li);
        input.value = inputValue;
        form.appendChild(input);
      }
      document.getElementById("myInput").value = "";

      var span = document.createElement("SPAN");
      var txt = document.createTextNode("\u00D7");
      span.className = "close";
      span.appendChild(txt);
      li.appendChild(span);

      for (i = 0; i < close.length; i++) {
        close[i].onclick = function() {
          var div = this.parentElement;
          document.getElementById(`ingrediente_${i}`).remove();
          div.remove();
          // div.style.display = "none";
        }
      }
    }
  </script>
  <script>
    (function() {
      'use strict'

      var forms = document.querySelectorAll('.needs-validation')

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
