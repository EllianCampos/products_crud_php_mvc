const deleteButtons = document.querySelectorAll('.deleteButton')

deleteButtons.forEach(button => {
  button.addEventListener('click', () => {
    const id = button.getAttribute('data-id')
    const name = button.getAttribute('data-name')

    Swal.fire({
      title: "Delete Product",
      text: `Do you want to delete the product (${name})`,
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, delete it!"
    }).then((result) => {
      if (result.isConfirmed) {
        location.href = `index.php?controller=products&action=delete&productId=${id}`
        // Swal.fire({
        //   title: "Deleted!",
        //   text: "The product has been deleted.",
        //   icon: "success"
        // });
      }
    });
  })
})