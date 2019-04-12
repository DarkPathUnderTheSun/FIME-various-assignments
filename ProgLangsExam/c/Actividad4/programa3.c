#include<stdio.h>
int main() {
    float sum = 0;
    float n = 50;
    float s = 0.001;
    for (float sum = 0, int i = n; 1/i > s; i--){
    sum = sum + 1/i;
    }
}

//La función for no debería de terminarse con ';', pues esto
//finalizala sentencia. Al haber finalizado el ciclo for, la
//variable 'i' no esta inicializada en este rango.
//Se está declarando una variable en una parte del argumento
//de for donde no es valido.

//Semánticamente, debería ser equivalente al programa 2
//y al programa 3, pero presenta varios errores de sintaxis.
