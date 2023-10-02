<?php

/**
 * Indica cuál de los siguientes son nombres de variables válidas e inválidos, indica por qué (en comentarios) y corrige los fallos:
- valor 

- $_N
- $valor_actual 
- $n
- $#datos 
- $valorInicial0
- $proba,valor 
- $2saldo
- $n
- $meuProblema
- $meu Problema
- $echo
- $m&m
- $registro
- $ABC
- $85 Nome
- $AAAAAAAAA
- $nome_apelidos
- $saldoActual
- $92
- $*143idade
 
*/
/*
- valor: es inválido ya que le falta el símbolo $ para indicar que es una variable. Una posible corrección sería $valor.
- $_N: es válido
- $valor_actual : es válido
- $n: es válido
- $#datos: no es válido, ya que el nombre de una variable tiene que empezar por _ o por letras, y aquí empieza por #. Una posible corrección sería $_datos, $Datos o $datos.
- $valorInicial0: es válido
- $proba,valor: no es válido, ya que lleva una coma de por medio y no puede llevarla. Una posible corrección sería $proba_valor o $probaValor.
- $2saldo: no es válido ya que el nombre comienza por un número y tiene que ser por _ o letras. Una posible corrección sería  $_saldo, $saldo o $Saldo.
- $n: es válido
- $meuProblema: es válido
- $meu Problema: no es válido ya que lleva un espacio en el medio, y sólo es posible que lleve letras, números o _. Una posible corrección sería $meuProblema o $meu_problema.
- $echo: es válido, aunque no se recomienda su uso al ser echo una palabra reservada en PHP (es una función propia).
- $m&m: no es válido ya que contiene un &, no pudiendo usar este (tiene que ser un _, número o letras). Una posible corrección sería $m_m
- $registro: es válido
- $ABC: es válido
- $85 Nome: no es válido ya que empieza por números (tiene que empezar por _ o letras) y lleva un espacio (no puede llevarlos, solo letras, numeros o _). Una posible corrección sería $Nome85 o $_nome_85.
- $AAAAAAAAA: es válido.
- $nome_apelidos: es válido.
- $saldoActual: es válido.
- $92: no es válido ya que empieza por números (tiene que empezar por _ o letras). Una posible corrección sería $_92
- $*143idade: no es válido ya que el nombre de la variable no puede llevar * ni empezar por números (tiene que empezar por _ o letras). Una posible corrección sería $_143idade.
*/
?>