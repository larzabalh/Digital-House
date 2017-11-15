entreDiez = function (x){
    return (x>=0 && x<=10)
}
entreDiez(12)



Crear una variable llamada ​ num1 ​ con el valor numérico 123.
Modificar la variable num1 para cambiar su valor a ​ texto ​ , quedando: ​ “123” ​ .
Crear una variable llamada ​ num2 ​ con el valor textual ​ “234”
Modificar la variable ​ num2 ​ para cambiar su valor a ​ ńumero ​ , quedando: ​ 234 ​ .
Crear una variable ​ suma ​ que tenga la suma de ​ num1 ​ y ​ num2 ​ .

var num1 = 123
num1 ="123"
var num2 ="234"
num2= 234
console.log (num1, num2)

Escribir una función que se llame ​ recibiTexto ​ que reciba un texto por parámetro y
pregunte si el texto que pasaron es vacio devuelve true

recibiTexto = function (texto){

  if (texto ==""){
    return "es vacio"
  }else{
    return "no es igual"
  }
}

recibiTexto("buenas")
