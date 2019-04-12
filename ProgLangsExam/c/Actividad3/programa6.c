//Programa 6

#include<stdio.h>

int a,b;
char c;

void main() {
    a = 1;
    b = 1;
    if (a < b)
    b = a;
    a = 0;
    else
    a = b;
    b = 0;
}

//Sintaxis incorrecta.
//'else' tiene que estar a una linea de distancia del anterior 'if'.
//para agregar mas de una linea entre 'estos, se deberia usar llaves '{}'.

//a = 3
//b = 1
//c = undefined