<?php include 'data/marmitasList.php'; ?>
<style> <?php include 'styles/products.css'; ?> </style>

<h2>Marmitas</h2>

<section class="productsList">
  <?php
    for ($i = 0; $i < count($marmitas); $i++) {
      echo "<div class='product' style='background:linear-gradient(
        0deg,
        rgba(0, 0, 0, 0.8) 0%,
        rgba(0, 0, 0, 0) 100%
      ),
      url(".$marmitas[$i][1].")
        no-repeat center;background-size: cover;'>";
      echo "<p>".$marmitas[$i][0]."</p>";
      echo "<a href='marmita.php?id=".$i."'>Ver mais</a>";
      echo "</div>";
    }
  ?>
</section>