#include<stdio.h>
#include <math.h>

float sumaDeConjunto (int set[], int cardinality) {
    int suma = 0;
    for (int iteration = 0; iteration < cardinality; iteration++) {
        suma = suma + set[iteration];
    }
    return suma;
}

float varianza (int set[], int cardinality, float average) {
    float diferencia;
    float diferenciaSq;
    float numero;
    for (int iteration = 0; iteration < cardinality; iteration++) {
        diferencia = average - set[iteration];
        diferenciaSq = (diferencia*diferencia);
        numero = (numero + diferenciaSq);
    }
    float varianzaAlt = (numero/cardinality);
    return varianzaAlt;
}

int modaDeConjunto(int set[], int cardinality) {
    int iteration, iteration_, repetition, moda, count;
    repetition = -1;
    for(iteration = 0; iteration< cardinality; iteration++){
        count = 1;
        for(iteration_ = iteration+1; iteration_ < cardinality; iteration_++){
            if(set[iteration_] == set[iteration]){
                count++;
                if(count > repetition){
                    repetition = count;
                    moda = set[iteration_];
                }
            }
        }
    }
    return moda;
}

int main()
{
    int alumnCount;
    printf("Número de alumnos: ");
    scanf("%d", &alumnCount);
    int alumnGrades[alumnCount];
    for (int iteration = 0; iteration < alumnCount; iteration++) {
        printf("Calificación del alumno %d: ", iteration+1);
        scanf("%d", &alumnGrades[iteration]);
    }

    float mediaAritmetica = (sumaDeConjunto(alumnGrades, alumnCount)/alumnCount);
    printf("\nMedia aritmética: %g",mediaAritmetica);
    float Varianza = varianza(alumnGrades, alumnCount, mediaAritmetica);
    printf("\nVarianza: %g\n", Varianza);
    float desviacionEstandar = sqrt(Varianza);
    printf("Desviación estándar: %g\n", desviacionEstandar);
    int moda = modaDeConjunto(alumnGrades, alumnCount);
    printf("Moda: %d\n", moda);
}