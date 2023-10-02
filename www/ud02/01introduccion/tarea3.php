<?php

/**Busca en la documentación de PHP las funciones de [manejo de variables](http://www.php.net/manual/es/funcref.php)

Comprueba el resultado devuelto por los siguientes fragmentos de código y analiza el resultado:
```php
- $a = “true”; // imprime el valor devuelto por is_bool($a)...
- $c = “false”; // imprime el valor devuelto por gettype($c);
- $d = “”; // el valor devuelto por empty($d);
- $e = 0.0; // el valor devuelto por empty($e);
- $f = 0; // el valor devuelto por empty($f);
- $g = false; // el valor devuelto por empty($g);
- $h; // el valor devuelto por empty($h);
- $i = “0”; // el valor devuelto por empty($i);
- $j = “0.0”; // el valor devuelto por empty($j);
- $k = true; // el valor devuelto por isset($k);
- $l = false; // el valor devuelto por isset($l);
- $m = true; // el valor devuelto por is_numeric($m);
- $n = “”; // el valor devuelto por is_numeric($n);
```
 */

$a = "true";
echo (is_bool($a));
//No se devuelve nada (false) ya que se está inicializando la variable como string, y se está comprobando si es un booleano; como no lo es, devuelve un string vacío.
 
$b=0;
echo(is_bool($b));
//No devuelve nada (false) ya que la variable es un entero, y se está comprobando si es un booleano; como no lo es, devuelve un string vacío.
if($b){
    echo(is_bool($b));
}
//No devuelve nada (false), ya que se comprueba dentro del if si $b es true; como $b es 0, se considera que es falso (en PHP el valor 0 se considera false y cualquier otro número true), entonces no se ejecuta la instrucción.
 
$c="false";
echo (gettype($c));
//Devuelve el valor "string", ya que es una cadena de texto.
 
$d="";
echo(empty($d));
//Devuelve 1 (true) ya que es una cadena vacía, o sea, que la variable se considera vacía.
 
$e=0.0;
echo(empty($e));
//Devuelve 1 (true) ya que es un flotante con el valor 0.0, o sea, que la variable se considera vacía.
 
$f=0;
echo(empty($f));
//Devuelve 1 (true) ya que es un entero con el valor 0, o sea, que la variable se considera vacía.

$g=false;
echo(empty($g));
//Devuelve 1 (true) ya que es un booleano falso,o sea, que la variable se considera vacía.
 
$h;
echo(empty($h));
//La variable no está inicializada y devuelve 1, que quiere decir true, o sea, que la variable se considera vacía.

$i="0";
echo(empty($i));
//Devuelve 1, ya que la variable está vacía ya que está inicializada con el valor 0 como string.
 
$j="0.0";
echo(empty($j));
//No devuelve nada (false), ya que se inicializa como string con el valor 0.0, y no se considera como vacía.
 
$k=true;
echo(isset($k));
//Devuelve 1 (true) ya que la variable existe y está definida.
 
$l=false;
echo(isset($l));
//Devuelve 1 (true) ya que la variable existe y está definida.
 
$m=true;
echo(is_numeric($m));
//No devuelve nada (false) ya que la variable es un booleano
 
$n="";
echo(is_numeric($n));
//No devuelve nada (false), ya que se está comprobando si n es una variable numérica, y es una cadena vacía.

?>