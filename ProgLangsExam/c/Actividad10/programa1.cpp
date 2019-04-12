#include <iostream>
float AreaTriangulo( float , float );
int main() {
    float base,alt;
    std::cout << "Escribe la base: " ;
    std::cin >> base;
    std::cout << "Escribe la altura: " ;
    std::cin >> alt;
    std::cout << "El area del triangulo es: " << AreaTriangulo(base,alt);
    return 0;
}
float AreaTriangulo( float b, float h) {
    float tmp = b*h/2.0;
    return tmp;
}

//La sintaxis del programa presentaba errores. Fue corregida.
//
//El programa toma dos valores, denominados
//bbase y altura, para calculr el área de un triángulo.