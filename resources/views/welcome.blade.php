<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <title>Cover Template for Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/cover/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset('themes/css/bootstrap.css') }}">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="{{ asset('themes/css/cover.css') }}">
</head>

<body class="text-center">

    @include('layouts.nav')

    <div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
        <header class="masthead mb-auto">
            <div class="inner">
                <h3 class="masthead-brand">Teste</h3>
                <nav class="nav nav-masthead justify-content-center">
                </nav>
            </div>
        </header>

        <main role="main" class="inner cover">
            <img class="mb-3" src="https://www.jbinformatica.com.br/public/img/logo-alt.png" alt="" width="180" height="70">

            <h2 class="cover-heading">Pontos concluídos no Desafio Técnico</h2>
            <p class="lead"> 1) Cadastrar e editar um cliente</p>
            <p class="lead">2) Listagem de clientes cadastrados</p>
            <p class="lead">3) Botão com a função de modificar o status do cliente para "pago" ou "não pago"</p>
            <p class="lead">4) Botão com a função de modificar o cliente para "inativo " ou "ativo"</p>
            <p class="lead">5) Botão para excluir um cliente</p>
            <p class="lead">6) Cadastrar um dependente através do icone (<i class="fas fa-people-group"></i>) na listagem de clientes</p>
            <p class="lead">2) Listagem de dependentes cadastrados de acordo com o seu cliente</p>
            <p class="lead">3) Botão com a função de editar os dados do dependente</p>
            <p class="lead">4) Botão com a função de excluir o dependente</p>
            <br>

            <h2 class="cover-heading">Pontos Acrescidos ao Teste</h2>
            <p class="lead">1) Pesquisa por cliente</p>
            <p class="lead">2) Consumo de api via cep para preenchimento dos campos de acordo com o CEP</p>
            <p class="lead">3) Máscaras de CEP e de CPF</p>
            <p class="lead">3) Validação CPF e de Email do Dependente</p>
            </br>
            </br>
            </br>

            <p class="lead">Projeto feito em Laravel 8, JS, MySql e Bootstrap</p>

            <p class="lead">Para Acessar o Teste clique no botão logo abaixo</p>

            <p class="lead">
                <a href="cliente" class="btn btn-lg btn-secondary">Sistema Teste - JBI</a>
            </p>
        </main>

        <footer class="mastfoot mt-auto">
            <div class="inner">
                <p>Desenvolvido por: <a href="https://www.linkedin.com/in/pedro-teixeira-530ab089/">Pedro Ivo
                        Teixeira</a>
                </p>
            </div>
        </footer>
    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script>
    window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')
    </script>
</body>

</html>