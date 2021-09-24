

var Tabla_paciente = localStorage.getItem("Tablaregistrostorage")
Tabla_paciente = JSON.parse(Tabla_paciente)

var Cantidad_Datos = 0

if(Tabla_paciente == null){
    var  Tabla_paciente = []    
}else{
    Listar();
}

function Listar(){
var datafila = ""
if(Tabla_paciente.length > 0){
    for(const i in Tabla_paciente){

        var varPaciente = JSON.parse(Tabla_paciente[i])
        var ID = parseInt(i)

        if(varPaciente.estado_citar == "Pendiente" || varPaciente.estado_citar == "Activo"){

        Cantidad_Datos += 1

        datafila += "<tr  id='elementos_"+ (ID + 1)  +"' class='Element_Container'>"
        datafila += "<td class='align-middle' id='"+ (ID + 1) + "'>" + (ID + 1) + "</td>"
        datafila += "<td class='align-middle' id='"+ varPaciente.Usuario + "'>" + varPaciente.Usuario + "</td>"
        datafila += "<td class='align-middle' id='"+ varPaciente.Nombre_msc + "'>" + varPaciente.Nombre_msc + "</td>"
        datafila += "<td class='align-middle' id='"+ varPaciente.estado_citar + "'>" + varPaciente.estado_citar + "</td>"
        datafila += "<td  class='d-flex justify-content-evenly pt-4 pb-4'><button class='btn btn-primary ver_mis_datos' id='"+ i +"'>Mis datos</button><button class='Datos_medicos btn btn-success' id='"+ i +"'>Datos medicos</button></td>"

        datafila += "<tr>";
        }
        }
        document.getElementById("Mostrar_New").innerHTML = datafila
    }
}

validar_aler()
function validar_aler(){
if(Cantidad_Datos != 0){
document.getElementById("Nohaydatos").style.display = "none"
}else{
  document.getElementById("Nohaydatos").style.display = ""
}
}

Asignar_Evento()

function Asignar_Evento(){
    var Seleccion_BTN = document.querySelectorAll("#Mostrar_New tr button")
    Seleccion_BTN.forEach(e => {
        if(e.className == "btn btn-primary ver_mis_datos"){
            e.addEventListener('click', () => {
                Mis_datos(e.id)
            })            
        }
        if(e.className == "Datos_medicos btn btn-success")
            e.addEventListener('click', () => {
                Datos_Medic(e.id)
            })            
    })
}

function Mis_datos(Cuenta){
    var Elemento_Most = JSON.parse(Tabla_paciente[Cuenta])
    Swal.fire({
        position: 'center',
        icon: 'question',
        title: 'Introduce tu contraseña para ver tu informacion:',
        input: "password",        
        showCancelButton: true,
        showConfirmButton: true,
        cancelButtonText: "Cancelar",
        confirmButtonText: "Validar usuario",        
      }).then((result) => {
          if(result.isConfirmed){
              if(result.value == Elemento_Most.contraseña){
                Mostrar_Info(Cuenta)
              }else{
                Swal.fire({
                    icon: 'error',
                    title: 'La contraseña es incorrecta',
                    text: 'Al parecer tu contraseña no coicide con la cuenta a la que quieres acceder, no podemos mostrarte la info',
                    confirmButtonText: "Salir de la alerta"
                })   
              }
          }
      })
}


function Datos_Medic(User_Estado){  
    var Estoado_Paciente = JSON.parse(Tabla_paciente[User_Estado])
    var Paciente_Stade = Estoado_Paciente.estado_citar
    var Paciente_Password = Estoado_Paciente.contraseña

    Swal.fire({
        position: 'center',
        icon: 'question',
        title: 'Introduce tu contraseña para ver tu informacion:',
        input: "password",        
        showCancelButton: true,
        showConfirmButton: true,
        cancelButtonText: "Cancelar",
        confirmButtonText: "Validar usuario",        
      }).then((result) => {
          if(result.isConfirmed){
              if(result.value == Paciente_Password){
                if(Paciente_Stade == "Pendiente"){
                    Swal.fire({
                        icon: 'error',
                        title: 'Ahun no hay datos medicos',
                        text: 'Al parecer su mascota, ahun no a acudido a la cita que programo, por lo que no hay info. medica',
                        confirmButtonText: "Continuar"
                        })   
                }else{
                    //Ejecute la funcion que muestra el resultado
                    Mostrar_Info_Medica(Estoado_Paciente)
                }
              }else{
                Swal.fire({
                    icon: 'error',
                    title: 'La contraseña es incorrecta',
                    text: 'Al parecer tu contraseña no coicide con la cuenta a la que quieres acceder, no podemos mostrarte la info',
                    confirmButtonText: "Salir de la alerta"
                    })   
                }
            }
        })
      
}




//Desarrollar Aqui
function Mostrar_Info_Medica(Info){

    if(Info.estado_citar != null){
      if(Info.estado_citar == "Pendiente"){
       var Cita = "Aun en espera" 
        }else{
          var Cita = Info.estado_citar
        }
      }

      if(Info.EstadoSLD != null){
        if(Info.EstadoSLD == ""){
         var Salud = "Ahun sin confirmar" 
          }else{
            var Salud = Info.EstadoSLD
          }
        }


        if(Info.AltaMSC != null){
          if(Info.AltaMSC == ""){
           var Alta = "ahun no programada" 
            }else{
              var Alta = Info.AltaMSC
            }
          }

          if(Info.Precio != null){
            if(Info.Precio == ""){
             var Presio = "Ahun no costeado" 
              }else{
                var Presio = Info.Precio
              }
            }


            if(Info.Cituacion_Medica != null){
              if(Info.Cituacion_Medica == ""){
               var Desc_Medic = "Ahun es demasiado pronto para dar detalles" 
                }else{
                  var Desc_Medic = Info.Cituacion_Medica
                }
              }

      document.getElementById("Mostrar_Info_DR").innerHTML = "";
      document.getElementById("Mostrar_Info_DR").innerHTML = `
        <div class="modal fade" id="Mi_Modal_Vet" tabindex"-1" aria-hidden="true" aria-labelledby="modalTitle">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content pe-4 ps-4 pt-2">
              <div class="modal-header">
                <h3 class="modal-title" id="modalTitle_Mod" style="font-family: 'Josefin Sans', sans-serif; font-weight: 300">Datos de tu medico:</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                  <div class="modal-body">
  
  
  
                    <div class="form-row d-flex justify-content-lg-between mb-4 pb-3 pt-3">
                      
                      <div class="form-group col-12 col-lg-5 flex-column">
                        <label for="Estado_Cita" class="mb-2">Estado de la cita:</label>
                        <p>${Cita}</p>
                      </div>
  
                      <div class="form-group col-12 col-lg-5 flex-column">
                        <label for="Est_Salud" class="mb-2">Estado de salud:</label>
                        <p>${Salud}</p>
                      </div>
  
                    </div>
  
  
  
  
                    <div class="form-row d-flex justify-content-lg-between mb-4 pb-3">
                      
                      <div class="form-group col-12 col-lg-5 flex-column">
                        <label class="mb-2">Alta de la mascota:</label>
                        <p>${Alta}</p>
                      </div>
                      <div class="form-group col-12 col-lg-5 flex-column">
                        <label class="mb-2" for="Precio_Adm">Factura medica:</label>
                        <p>${Presio}</p>
                      </div>
  
                    </div>
  
  
                    <div class="form-row mb-4">
                      <div class="form-group col-12 col-lg-12 flex-column">
                        <label for="Descrip_Admin" class="mb-2">Ingrese la cituacion medica:</label>
                        <p>${Desc_Medic}</p>
                      </div>  
                    </div>
                    
  
  
                         
                  </div>                
                  </div>
                </div>          
              </div>    
    `
    $('#Activar_Visor_Vet').click()
}





function Mostrar_Info(User_Mostrar){


 
        var Ver_Elemt = JSON.parse(Tabla_paciente[User_Mostrar])

        if(Ver_Elemt.estado_citar == "Pendiente"){
        var Estado_cita = "Sin atender" 
        }if(Ver_Elemt.estado_citar == "Activo"){
           var Estado_cita = "En atencion"
        }if(Ver_Elemt.estado_citar == "Inactivo"){
        var Estado_cita = "Ya antendido"                 
        }

        document.getElementById("Mostrar_paciente").innerHTML = "";
        document.getElementById("Mostrar_paciente").innerHTML =   `
        <div class="modal fade" id="miModal" tabindex"-1" aria-hidden="true" aria-labelledby="modalTitle">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content pe-4 ps-4 pt-2">
            <div class="modal-header">
              <h3 class="modal-title" id="modalTitle" style="font-family: 'Josefin Sans', sans-serif; font-weight: 300">#${Ver_Elemt.Usuario}</h3>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
                <div class="modal-body">
                      <div class=" d-flex justify-content-center items-evenly flex-column mb-4">
                        <div class="d-table mb-2">
                        <h4  style="font-family: 'Josefin Sans', sans-serif; font-weight: 300; display: table" class="m-0 p-0" >Datos mascota: <hr size="4" style="border: none; margin-top: 10px; width: 85%" class="mb-0"></h4><br>
                        </div>
                                <div class="w-100 d-flex justify-content-between align-items-center">
                                <h5 style="font-weight: 400 !important; font-size: 0.9rem;">Especie: ${Ver_Elemt.Especie}</h5>
                                <h5 style="font-weight: 400 !important; font-size: 0.9rem;">Edad: ${Ver_Elemt.edad_mascota}</h5>
                                <h5 style="font-weight: 400 !important; font-size: 0.9rem;">Nombre: ${Ver_Elemt.Nombre_msc}</h5>
                                </div>
                            </div>
                            <div class="d-table">
                            <h4 style="font-family: 'Josefin Sans', sans-serif; font-weight: 300; width: auto" class="mt-4 mb-4">Cituacion descripcion:<hr size="4" style="border: none; margin-top: 10px; width: 85%"></h4>
                            </div>
                            <div class="d-flex justify-content-between align-items-start">                                              
                      <p style="font-weight: 400 !important; font-size: 0.9rem; text-align: justify;" class="mt-0 mb-0">${Ver_Elemt.Cituacion}</p>
                      <img src="IMG/Animal.jpg" width="20%" height="auto" alt="Foto_Ver" class="ms-3">
                        </div>
                        <div class="d-flex justify-content-between align-items-start flex-column">
                            <div class="d-flex justify-content-start align-items-center flex-wrap; w-100 pb-2 pt-3">
                              <h5 style="font-weight: 400 !important; font-size: 0.9rem;">Estado: ${Estado_cita}</h5>
                                <h5 style="font-weight: 400 !important; font-size: 0.9rem;" class="ms-4 ps-2">Fech. Cita: ${Ver_Elemt.Fecha_Cita}</h5>
                            </div>
                          </div>

                          
                          <div class="d-flex justify-content-center align-items-start flex-column flex-wrap pt-3 mt-3 mb-3">
                            
                          <h4 style="font-family: 'Josefin Sans', sans-serif; font-weight: 300;" class="mb-0">Datos personales:<hr size="4" style="border: none; margin-top: 10px; width: 85%"></h4>
                          
                            <div class="w-100 d-flex justify-content-evenly mt-3">
                            <h5 style="font-weight: 400 !important; font-size: 0.9rem;" class="pe-4"> Telefono: ${Ver_Elemt.Telefono}</h5>
                            <h5 style="font-weight: 400 !important; font-size: 0.9rem;" class="ps-4"> Direccion: ${Ver_Elemt.direccion}</h5>
                            </div>
                            <div class="w-100 d-flex justify-content-evenly pb-2 mt-4">
                            <h5 style="font-weight: 400 !important; font-size: 0.9rem;" class="pe-4"> Usuario: ${Ver_Elemt.Usuario}</h5>
                            <h5 style="font-weight: 400 !important; font-size: 0.9rem;" class="ps-4"> Contraseña: ${Ver_Elemt.contraseña}</h5>
                            </div>
                        </div>

                      </div>    
                      <div class="modal-footer d-flex justify-content-between">
                      <p>Opciones para usuario: </p>
                      <div>
                      <a href="Fredy_Urgencia.html?Perfil=${User_Mostrar}" class="btn btn-success">Editar informacion</a>
                      </div>
                    </div>            
            </div>
          </div>          
        </div>
        `
        $('#Activar_Visor').click()

    
}


$('#Seach').keypress(function(e) {
  var keycode = (e.keyCode ? e.keyCode : e.which);
  if (keycode == '13') {
      Busqueda();

  }
});
  
  function Busqueda(){

    if(Cantidad_Datos != 0){
      var Borrar_Todo = true

      var All_Dato_Cont = document.getElementsByTagName("tr")   
      var Dato = document.getElementById("Seach").value.toUpperCase()

      for(var a = 1; a < All_Dato_Cont.length; a++){             
          var Contenedor = All_Dato_Cont[a]
          var All_Dato = Contenedor.getElementsByTagName("td")
          var Elemento_Id = Contenedor.getAttribute("id")
          var Borrar = true      
      
          for(var i= 0; i < All_Dato.length; i++){
              var elemento = All_Dato[i]
              var Valor = elemento.textContent || elemento.innerText;
              if(Valor.toUpperCase().indexOf(Dato) > -1){                                     
                  Borrar_Todo = false
                  document.getElementById(Elemento_Id).style.display = ""
                  Borrar = false
              }else{
                  if(Borrar == true){
                  document.getElementById(Elemento_Id).style.display = "none"
                  }
              }
          }

      }
      if(Borrar_Todo == true){
          document.getElementById("Error").style.display = "block"
          document.getElementById("Nohaydatos").style.display = "none"
      }else{
          document.getElementById("Error").style.display = "none"
      }
    }else{
      Swal.fire({
        position: 'center',
        icon: 'error',
        title: 'No hay ningun dato disponible',
        text:  `No se puede usar el buscador, ya que no hay ningun dato registrado en la tabla, para poder buscarlo.`,
        showConfirmButton: true,
        confirmButtonText: "Continuar"
      })
    }
  }
