const BASE_URL = "/pruebanexura";
const form = document.getElementById("formEmpleado");

function eliminarEmpleado(id) {
  try {
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
  } catch (error){
    console.log("Ocurrió un error:", error.message);
  }
}

function crearEmpleado(){
  if(form){
    try {
      fetch("empleados/crear", {
        method: "POST",
        body: new FormData(form)
      }).then(res => res.json())
      .then(data => {
        if(data.success) window.location.href = BASE_URL;
      });
    } catch (error){
      console.log("Ocurrió un error:", error.message);
    }
  }
}



function editar(id){
  window.location.href = BASE_URL+"/empleados/editar/"+id; 
}

function validar(elemento){
  let checkboxes = document.getElementsByName('rol');

  for (let i = 0; i < checkboxes.length; i++) {
    if (checkboxes[i] !== elemento) {
        checkboxes[i].checked = false;
    }
  }
}

form.addEventListener("submit", function(e){
  e.preventDefault();

  const nom = document.getElementById("nombre").value;
  const email = document.getElementById("email").value;
  const area = document.getElementById("area").value;
  const descripcion = document.getElementById("descripcion").value;
  const sexo = document.getElementsByName("sexo");
  const nombre = /^[a-zA-Z]+$/.test(nom);
  const rg = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;  

  if (!nom) {
    alert("Por favor ingrese el nombre del empleado");
  }
  if (!nombre) {
    alert("Por favor ingrese solo letras en el nombre");
  }
  if (!email) {
    alert("Por favor ingrese el email del empleado");
  }
  if(!rg.test(email)){
    alert('Por favor ingrese un correo válido');
  }
  if (!sexo) {
    alert("Por favor seleccione el sexo del empleado");
  }
  if (!area) {
    alert("Por favor seleccione el área del empleado");
  }
  if (!descripcion) {
    alert("Por favor ingrese la descripción del empleado");
  }

  fetch(BASE_URL + '/empleados/guardar', {
    method: "POST",
    body: new FormData(form)
  })
  .then(res => res.json())
  .then(data => {
    if(data.success) window.location.href = BASE_URL
  });
});
