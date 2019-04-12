#include "stdio.h"
#include "stdlib.h"
void main() {
    int x,yy;
    char aux[10];
    gets (aux);
    x = atoi (aux);
    gets (aux);
    yy = atoi (aux);
    x = x + yy;
    yy = x - yy;
    x = x - yy;
    printf("%d %d\n",x,yy);
}

//Librerías
//stdio
//stdlib

//Funciones
//printf
//gets

//Resultados
//3 1