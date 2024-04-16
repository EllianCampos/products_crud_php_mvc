<?php require "src/views/partials/header.php"; ?>

<header>
  <?php require "src/views/partials/navbar.php" ?>
</header>

<main>
  <section class="container text-center">
    <h1 class="text-center mt-3">Información del producto</h1>
    <p class="fw-bold text-primary fs-2"><?= $product["name"] ?></p>
    <p class="fw-bold fs-3 ">₡ <?= number_format($product["price"]) ?></p>
    <a href="index.php?controller=home&action=show" class="btn btn-secondary">
      Back
    </a>
  </section>
</main>


<?php require "src/views/partials/footer.php" ?>