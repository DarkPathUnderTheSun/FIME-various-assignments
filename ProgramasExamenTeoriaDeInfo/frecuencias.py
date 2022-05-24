# Generador de Frecuencias

# Todas las palabras en un solo string

palabras = "HOLAHALOHENOLEÑO"

import math

def subSort(sub_li):
    return(sorted(sub_li, key = lambda x: x[1], reverse = True))  

def genBinary(number, length):
    binaryStrip = []
    for i in range(length):
        number = number*2
        if number > 1:
            binaryStrip.append("1")
            number = number - 1
        else:
            binaryStrip.append("0")
    return(''.join(binaryStrip))
letra = 0
frecuencia = 1
acumulada = 2
binaryLength = 3
# superList[i][letra]



alfabeto = list(sorted(set(palabras)))
cardinal = len(palabras)

freqs = []
for letra in alfabeto:
    sumTotal = 0
    for caracter in palabras:
        if letra == caracter:
            sumTotal = sumTotal+1
    frec = sumTotal/cardinal
    freqs.append(round(frec,5))
    # print("frecuencia de "+letra+": "+str(round(frec,5)))

superList = []
for i in range(len(alfabeto)):
    superList.append([alfabeto[i],freqs[i]])

superList = subSort(superList)

print(superList)

# holder = 0
# for i in range(len(superList)):
#     superList[i].append(holder)
#     holder = holder + superList[i][1]
#     superList[i].append(math.ceil(math.log2(1/superList[i][frecuencia])))
#     print(superList[i])
# 
# print(genBinary(superList[1][acumulada],superList[1][binaryLength]))