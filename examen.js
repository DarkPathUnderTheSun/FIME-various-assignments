function gets()
{
    var reader = new java.io.InputStreamReader(java.lang.System.in); 
    var buffer = new java.io.BufferedReader(reader); 
    var line = buffer.readLine();
    return line;
}

function puts() {
    for( var i = 0; i < arguments.length; i++ ) {
       var value = arguments[i];
       java.lang.System.out.print( value );
    }
}

function media(set) {
    var suma = 0;
    for (let i = 0; i < set.length; i++) {
        suma = parseInt(set[i]) + suma;
    }
    var result = suma/set.length;
    return result;
}


function varianza (set, average) {
    var diferencia = 0;
    var diferenciaSq = 0;
    var numero = 0;
    for (let iteration = 0; iteration < set.length; iteration++) {
        diferencia = parseInt(average) - parseInt(set[iteration]);
        diferenciaSq = (diferencia*diferencia);
        numero = (numero + diferenciaSq);
    }
    var varianzaAlt = numero/set.length;
    return varianzaAlt;
}

function modaDeConjunto(set) {
    var iteration = 0;
    var iteration_ = 0;
    var repetition = 0;
    var moda = 0;
    var count = 0;
    repetition = -1;
    for(iteration = 0; iteration < set.length; iteration++){
        count = 1;
        for(iteration_ = iteration+1; iteration_ < set.length; iteration_++){
            if(parseInt(set[iteration_]) == parseInt(set[iteration])){
                count++;
                if(count > repetition){
                    repetition = count;
                    moda = parseInt(set[iteration_]);
                }
            }
        }
    }
    return moda;
}




puts("Número de alumnos: ");
var alumnCount = parseInt(gets());
var alumnGrades = new Array(alumnCount);
for (let iteration = 0; iteration < alumnGrades.length; iteration++) {
    var visIndex = iteration + 1;
    puts("Ingrese la calificación del alumno ", visIndex.toString(), ": ");
    alumnGrades[iteration] = gets();
}
const average = media(alumnGrades);
const varianz = varianza(alumnGrades, average).toFixed(6);
const desviac = Math.sqrt(varianz).toFixed(6);
const moda    = modaDeConjunto(alumnGrades);
puts("\n", "Media aritmética   : ", average.toString());
puts("\n", "Varianza           : ", varianz.toString());
puts("\n", "Desviación estándar: ", desviac.toString());
puts("\n", "Moda               : ", moda.toString(),"\n");