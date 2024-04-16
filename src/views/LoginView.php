<?php require "partials/header.php" ?>

<header class="bg-dark text-light p-3 position-absolute fixed-top ">
  <h1 class="text-center">Products Maintenance</h1>
</header>

<main class="d-flex justify-content-center align-items-center min-vh-100 ">
  <div class="bg-dark rounded-4 overflow-hidden ">
    <div class="row">
      <a href="index.php?controller=login&action=login" class="col-6 p-2 btn btn-success rounded-0">
        Login
      </a>
      <a href="index.php?controller=login&action=register" class="col-6 p-2 btn btn-primary rounded-0">
        Register
      </a>
    </div>
    <form action="index.php?controller=login&action=login" method="POST" class="row text-light p-3">
      <div class="mt-3">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control">
      </div>
      <div class="mt-3">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="form-control">
      </div>
      <div class="mt-3 text-center">
        <input type="submit" value="  Login  " class="btn btn-success">
      </div>
    </form>
  </div>
</main>

<?php if ($error) : ?>
  <script>
    Swal.fire({
      title: 'Information incompleted',
      text: '<?= $error ?>',
      icon: 'error',
      confirmButtonText: "Accept"
    })
  </script>
<?php endif ?>

<?php require "partials/footer.php" ?>