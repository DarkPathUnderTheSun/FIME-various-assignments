#include<stdio.h>
int main() {
    float sum = 0;
    float n = 50;
    float s = 0.001;
    for (int i = n; 1/i > s; i--) 
    {
        sum = sum + 1/i;
    }
}

//Se está tratando de evaluar una expresión que contiene un
//entero y un punto flotante; se debería de manipular solo
//elementos del mismo tipo.

//Semánticamente, debería ser equivalente al programa 2
//y al programa 3, pero presenta varios errores de sintaxis.