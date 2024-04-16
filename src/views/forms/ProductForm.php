<form method="post" action="index.php?controller=products&action=<?= $_GET["action"] == "edit" ?  "edit&productId=$productId" : "add" ?>">
  <?php if ($error) : ?>
    <script>
      Swal.fire({
        title: 'Information incompleted',
        text: '<?= $error ?>',
        icon: 'warning',
        confirmButtonText: "I'll fix it"
      })
    </script>
  <?php endif ?>
  <div class="mt-3">
    <label for="name">Name</label>
    <input type="text" name="name" id="name" class="form-control" value="<?php echo $name; ?>">
  </div>
  <div class="mt-3">
    <label for="name">Price</label>
    <input type="text" name="price" id="price" class="form-control" value="<?php echo $price; ?>">
  </div>
  <div class="mt-3 text-center ">
    <a href="index.php?controller=home&action=show" class="btn btn-secondary">
      Back
    </a>
    <input type="submit" value="<?= $_GET["action"] == "edit" ?  "Save changes" : "Add" ?>" class="btn btn-success">
  </div>
</form>