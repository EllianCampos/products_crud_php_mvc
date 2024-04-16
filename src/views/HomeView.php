<?php require "partials/header.php" ?>

<header>
  <?php require "src/views/partials/navbar.php" ?>
</header>

<main>
  <section class="container">
    <table class="table table-striped mt-4">
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Precio</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($products as $product) : ?>
          <tr>
            <td><?= $product["name"] ?></td>
            <td><?= $product["price"] ?></td>
            <td class="d-flex justify-content-end">
              <a href="index.php?controller=products&action=show&productId=<?= $product["id"] ?>" class="btn btn-info me-1">View</a>
              <a href="index.php?controller=products&action=edit&productId=<?= $product["id"] ?>" class="btn btn-primary me-1">Edit</a>
              <button type="button" class="btn btn-danger deleteButton" data-id="<?= $product["id"] ?>" data-name="<?= $product["name"] ?>">Delete</button>
            </td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </section>
</main>

<script src="public/js/confirmDeleteProduct.js"></script>

<?php require "partials/footer.php" ?>