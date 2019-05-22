<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Controle de Series</title>
  </head>
  <body>
    <ul>
      <?php
      foreach ($series as $serie): // forma diferenciada de fazer um foreach com HTML e PHP bem separados
        ?>
        <li><?= $serie?></li>
      <?php endforeach; ?>
    </ul>
  </body>
</html>
