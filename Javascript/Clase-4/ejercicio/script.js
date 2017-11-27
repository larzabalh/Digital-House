
//ESTO YA FUNCIONA, LO HAGO DE NUEVO!!!!
// window.onload = function() {
//
// document.getElementById('form').onsubmit=function(e){
// e.preventDefault();
//
// if (document.getElementById('usuario').value == "" ) {
//   document.getElementById('error-usuario').innerHTML='El usuario no puede estar vacio';
// }
//
//
// if (document.getElementById('clave').value == "" ) {
// document.getElementById('error-clave').innerHTML='La clave no puede estar vacia';
// }
//
// }
// };



window.onload = function() {

document.getElementById('form').onsubmit=function(e){
e.preventDefault();

if (document.getElementById('usuario').value == "" ) {
  var mensaje_usuario = document.createElement("DIV");
  mensaje_usuario.innerText = "EL CAMPO ES REQUERIDO";
  document.getElementById('usuario').parentNode.append(mensaje_usuario);
}


if (document.getElementById('clave').value == "" ) {
  var clave = document.querySelector('[name=clave]');
  var mensaje_clave = document.createElement("DIV");
  mensaje_clave.innerText = "EL CAMPO ES REQUERIDO";
  clave.parentNode.append(mensaje_clave);
}

}
};
