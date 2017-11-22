// // Ejercicio 1
// // alert(5+4)
//
//
// // Ejercicio 2
// console.log('hola')
//
//
// // Ejercicio 3
// var manzana = 100;
// console.log(manzana)
//
//
// window.onload = function() {
// //esto se ejecuta cuando la página carga
// document.write(' Bienvenido ' + nombre );
//
// console.log(' Bienvenido %s' , nombre );
// };
//
//
// var nombre =prompt("Dime tu nombre");
//
//
// var mayor = confirm ("sos mayor de edad?");
// if (mayor ==true){
// document.write('sos mayor')
//   }
//   else {
//     window.location.href = 'http://sidanmor.com';
//   }
//
// console.log(location.href);
// console.log(location.host);
// console.log(location.pathname);
// console.log(location.search);

// var boton = document.getElementById('boton');
// boton.onclick = function() {
// window.location.href = 'http://www.google.com.ar';
// };
//
// numeros = function (){
//   var numero1 =prompt("numero 1");
//   var numero2 =prompt("numero 2");
// }
//
// numeros();
// confirmacion = function (){
//
//
// }
//
// var confirm = confirm("estas seguro de los numeros que ingresaste?");
// if (confirm ==true){
//
// masgrande = function (){
//   if (numero1>numero2) {
//     return masgrande=numero1
//   }else {
//     return masgrande=numero2
//   }
// }
//
// return alert('El numero mas grande es ' + masgrande())
//
//   }
//   else {
//     numeros();
//     confirmacion();
//   }

  var a,b
  do{
    a = prompt('valor a');
    b = prompt('valor b');
  } while (!confirm ('estas seguros de los valores ingresados a=' + a + ' el valor b=' +b))

  if (a>b){
    alert ('el valor mas grande es A='+a )
  }else {
    alert ('el valor mas grande es B='+b )
  }
