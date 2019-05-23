<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"/>
    <title>Controle de Series</title>
  </head>
  <body>
    <div class="container">
      <div class="jumbotron">
        <h1>@yield('cabecalho')<!-- local onde sera inserido o cabecalho da pagina --></h1>
      </div>

      @yield('conteudo') <!-- local onde sera inserido o conteudo da pagina -->
    </div>
  </body>
</html>
