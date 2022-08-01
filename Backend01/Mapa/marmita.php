<?php include 'data/marmitasList.php'; ?>

<?php include 'includes/header.php'; ?>
<style> <?php include 'styles/details.css'; ?> </style>

<main class="container">
  
  <?php
    $marmita;

    for ($i = 0; $i < count($marmitas); $i++) {
      if ($i == $_GET["id"]) {
        $marmita = $marmitas[$i];
      }
    }

    echo "<div class='banner' style='background:linear-gradient(
      90deg,
      rgba(255, 231, 209, 0.5) 0%,
      rgba(75, 142, 141, 0.8) 100%
    ),
    url(".$marmita[1].")
      no-repeat center;background-size: cover;'><h3>".$marmita[0]."</h3></div>";
  ?>

  <section class="details">
    <?php
      echo "<p><strong>Tamanho:</strong> ".$marmita[2]."</p>";
      echo "<p><strong>Preço:</strong> R$".$marmita[3]."</p>";
      echo "<p><strong>Ingredientes:</strong> ".$marmita[4]."</p>";
    ?>

    <hr>
    <strong>Entre em contato e faça sua encomenda!</strong>
    <ul>
      <li>+54 9 8452-1456</li>
      <li>+54 3231-4585</li>
      <li>contato@donarita.com</li>
    </ul>
  </section>

</main>

<?php include 'includes/footer.php'; ?>