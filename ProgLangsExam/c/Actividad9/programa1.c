#include<stdio.h>
int main() {
    int a, b;
    float c;
    printf("Ingrese un número: ");
    scanf("%d", &a);
    printf("Ingrese otro número: ");
    scanf("%d", &b);
    c = a + b;
    printf("%d + %d = %f\n",a,b,c);
    c = a - b;
    printf("%d - %d = %f\n",a,b,c);
    c = a * b;
    printf("%d * %d = %f\n",a,b,c);
    c = a / b;
    printf("%d / %d = %f\n",a,b,c);
}