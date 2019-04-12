#include<iostream>

class Alumno {
    private:
    std::string nombre;
    // Una posible alternativa: char *nombre;
    int edad;
    long long telefono;
    public:
    Alumno(); // Constructor (Inicializa los atributos con la cadena vacía o con el valor 0)
    Alumno(const std::string &nom, int ed, long long telf); // Constructor con argumentos
    ~Alumno(); // Destructor (necesario si se implementa el atributo nombre como un array de caracteres).
    //Interfaz.
    void setNombre (const std::string &nom);
    void setEdad (int ed);
    void setTelefono (long long telef);
    std::string getNombre();
    int getEdad();
    long long getTelefono();
    void Print();
};