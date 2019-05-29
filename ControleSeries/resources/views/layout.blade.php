<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8"/>
    <!-- adicionando links uteis -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous"/>
    <title>Controle de Series</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-2 flex justify-content-between">
      <a class="navbar-brand" href="{{route('index')}}">Menu</a>
      @auth
      <a class="text-danger" href="/sair">Sair</a>
      @endauth
    </nav>
    <div class="container">
      <div class="jumbotron">
        <h1>@yield('cabecalho')<!-- local onde sera inserido o cabecalho da pagina --></h1>
      </div>

      @yield('conteudo') <!-- local onde sera inserido o conteudo da pagina -->
    </div>
  </body>
</html>
