//Programa 9

#include<stdio.h>

int a,b;
char c;

void main() {
    a=2; b=3;
    switch(a){
    case 1: a= a+b;
    case 2: a= a-b;
    case 3: a= a*b;
    break;
    }
}

//Sintaxis correcta.
//Se sospecha que este no es el resultado esperado,
//pues los tres casos se ejecutan. Se deberían de
//separar por 'break;'

//a = -3
//b = 3
//c = undefined