$(".btn-delete").on("click", function (e) {
  e.preventDefault();
  const href = $(this).attr("href");

  Swal.fire({
    title: "Are You Sure?",
    text: "Post will be deleted.",
    icon: "question",
    showCancelButton: true,
    showCloseButton: true,
    confirmButtonColor: "#198754",
    cancelButtonColor: "#bb2d3b",
    confirmButtonText: "Delete Post",
    showClass: {
      popup: "swal2-show",
      backdrop: "swal2-backdrop-show",
      icon: "swal2-icon-show",
    },
    hideClass: {
      popup: "swal2-hide",
      backdrop: "swal2-backdrop-hide",
      icon: "swal2-icon-hide",
    },
  }).then((result) => {
    if (result.value) {
      Swal.fire({
        icon: "success",
        title: "Success!",
        text: "Post has been deleted.",
        showConfirmButton: false,
        allowOutsideClick: false,
        footer: "You will be forward to the page in few seconds.",
      });

      setTimeout(() => (window.location.href = href), 2000);
    }
  });
});
