<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand font-weight-bold" href="index.php?controller=home&action=show">Products</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <div class="d-flex justify-content-between w-100">
        <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="index.php?controller=home&action=show">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?controller=products&action=add">Add Product</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?controller=login&action=logout">Logout</a>
            </li>
        </ul>
        <?php if (isset($_SESSION["user"])) : ?>
          <div class="p-2">
            <?= $_SESSION["user"]["email"] ?>
          </div>
        <?php endif ?>
      </div>
    </div>
  </div>
</nav>