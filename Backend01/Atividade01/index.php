<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
  <title>Vale apena álcool?</title>

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    
    body {
      min-height: 100vh;
      width: 100%;
      background: #201d26;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 1rem;
      font-family: 'Inter', sans-serif;
      color: #fff;
      flex-direction: column;
    }

    h1 {
      font-size: 2rem;
      text-align: center;
    }

    section {
      padding: 1rem 2rem;
      background: #2b2733;
      border: 1px solid #2d273b;
      border-radius: 1rem;
      font-size: 1rem;
      width: 100%;
      max-width: 600px;
    }

    p {
      line-height: 1.25rem;
    }

    strong {
      font-weight: 700;
      color: #9c6bff;
    }
  </style>
</head>
<body>
  <h1>Seja bem vinda Juliana!</h1>
  <section>
    <?php
      $precoLitroGasolina = 5.8;
      $precoLitroAlcool = 6.5;

      $valeApenaAlcool = ($precoLitroAlcool / $precoLitroGasolina) < 0.7;

      $quantidade = 50;

      if($valeApenaAlcool) {
        echo "<p>Hoje compensa abastecer o seu carro com <strong>álcool</strong>, devido a porcentagem estar abaixo de 0.7 e você gastará <strong>".$precoLitroAlcool * $quantidade." reais</strong></p>";
      } else {
        echo "<p>Hoje não compensa abastecer o seu carro com álcool, e sim abastecer com <strong>gasolina</strong>, devido a porcentagem estar acima de 0.7 e você gastará <strong>".$precoLitroGasolina * $quantidade." reais</strong></p>";
      }
    ?>
  </section>
</body>
</html>