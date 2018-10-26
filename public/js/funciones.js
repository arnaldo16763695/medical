function deletePacientes(url, nombre){

swal({
  title: "Estas Seguro?",
  text: "Vas a eliminar a " + nombre,
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
     window.location.replace(url);
  } 
});

}
