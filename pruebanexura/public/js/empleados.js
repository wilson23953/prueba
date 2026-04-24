const form = document.getElementById("formNuevo");

function eliminarEmpleado(id) {
  fetch("empleados/eliminar", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded"
    },
    body: "id="+id,
  }).then(res => res.text())
    .then(data => {
      if (data) {
        document.getElementById("fila" + id).remove();
      }
  })
}

function crearEmpleado(){
  if(form){
    fetch("crear", {
      method: "POST",
      body: new FormData(form)
    }).then(res => res.json())
    .then(data => {
      console.log(data.success)
      if(data.success) window.location.href = "/pruebanexura";
    });
  }
}


function validar(elemento){
  let checkboxes = document.getElementsByName('rol');

  for (let i = 0; i < checkboxes.length; i++) {
    if (checkboxes[i] !== elemento) {
        checkboxes[i].checked = false;
    }
  }
}