
//----------marcar naranja el boton--------------------------

function remarcar(e){
    e.target.style.borderColor="orange";
    
}
function desmarcar(e){
    e.target.style.borderColor="";
}


let almacenBoton=document.getElementById("boton");
almacenBoton.addEventListener("mouseover",remarcar);
almacenBoton.addEventListener("mouseout",desmarcar);



//----------------validacion formulario---------------------------

function validarNombre(){
    var inputNombre = document.getElementById("nombre");
    if(inputNombre.value.length<2){
        inputNombre.style.borderColor="red";
        return false;
    }
    else{ 

        inputNombre.style.borderColor="blue";
        return true;
    }

}
function validarEmail(){
    var inputemail=document.getElementById("email");
    
   
    if(inputemail.value.lastIndexOf('.')<0){
        inputemail.style.borderColor="red";
        return false;
        
    }
    else if(inputemail.value.lastIndexOf("@")>inputemail.value.lastIndexOf('.')){
        inputemail.style.borderColor="red";
        return false;
    }
    
    else if(inputemail.value.length-(inputemail.value.lastIndexOf('.')+1)<2 || inputemail.value.length-(inputemail.value.lastIndexOf('.')+1)>=4){
        inputemail.style.borderColor="red";
        return false;
    }
    else{
        inputemail.style.borderColor="blue";
        return true;
    }
}


function validarAlEnviar() {
    try {   
        return validarNombre() && validarEmail();
        
    } catch (ex) {   
        console.error(ex);
    } finally { 
        
        
    }
}

window.onload=function(){
document.forms.registro.onsubmit=validarAlEnviar;
document.getElementById("nombre").onblur =validarAlEnviar;
document.getElementById("email").onblur =validarAlEnviar;
}