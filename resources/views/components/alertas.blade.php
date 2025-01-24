@session('mensaje')
<script>
    let timerInterval;
Swal.fire({
  title: "{{session('mensaje')}}",
  html: "Cerrando en <b></b> milisegundos.",
  timer: 2000,
  timerProgressBar: true,
  didOpen: () => {
    Swal.showLoading();
    const timer = Swal.getPopup().querySelector("b");
    timerInterval = setInterval(() => {
      timer.textContent = `${Swal.getTimerLeft()}`;
    }, 100);
  },
  willClose: () => {
    clearInterval(timerInterval);
  }
}).then((result) => {
  /* Read more about handling dismissals below */
  if (result.dismiss === Swal.DismissReason.timer) {
    console.log("Cerre a tiempo");
  }
});
</script>
@endsession
