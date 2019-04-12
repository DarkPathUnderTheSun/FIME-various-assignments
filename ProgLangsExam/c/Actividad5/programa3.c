#include "stdio.h"
//#include "conio.h"
struct X {
    int x;
    char y;
};
void main() {
    struct X a;
    a.x = 10;
    a.y = 'z';
    printf("%d %c\n",a.x,a.y);
}

//Librerías
//stdio
//conio

//Funciones
//printf

//Resultados
//10 z