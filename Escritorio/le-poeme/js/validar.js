function validar() {
var nombre,apellido,usuario,correo,contrasena,telefono, expresion;
nombre = document.getElementById("nombre").value;
apellido = document.getElementById("apellido").value;
usuario= document.getElementById("usuario").value;
correo = document.getElementById("correo").value;
contrasena = document.getElementById("contrasena").value;
telefono = document.getElementById("telefono").value;

expresion = /\w+@\w+\.+[a-z]/;

if(nombre === "" || apellido === "" || usuario === "" || correo === "" || contrasena === "" || telefono === ""){
    alert("Introducir todos los campos");
    return false;
}

else if(nombre.length>100){
    alert("El nombre es muy largo");
    return false;
}

else if(apellido.length>100){
    alert("El apellido es muy largo");
    return false;
}

else if(usuario.length>50){
    alert("El nombre de usuario es muy largo");
    return false;
}

else if(correo.length>100){
    alert("El correo es muy largo");
    return false;
}

else if(!expresion.test(correo)){
    alert("Correo no vlido");
    return false;
}

else if(contrasena.length>50){
    alert("La contraseña es muy larga");
    return false;
}

else if(telefono.length>13){
    alert("El telefono es muy largo");
    return false;
}

else if(isNaN(telefono)){
    alert("Telefono incorrecto");
    return false;
}

}