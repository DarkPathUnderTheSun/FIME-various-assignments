arr = [['O', 0.25], ['H', 0.1875], ['L', 0.1875], ['A', 0.125], ['E', 0.125], ['N', 0.0625], ['Ñ', 0.0625]]
palabra = "LEÑO"

palabraComp = []
for each in palabra:
    palabraComp.append(each[0])

alfa = 0
print("cha   L     a     b")
for each in arr:
    each.append(alfa)
    alfa = alfa + each[1]
    beta = alfa
    each.append(beta)
    print(each)


def lenOf(letter):
    for each in arr:
        if each[0] == letter:
            return each[1]

def staOf(letter):
    for each in arr:
        if each[0] == letter:
            return each[2]
def endOf(letter):
    for each in arr:
        if each[0] == letter:
            return each[3]

letra1 = "L"
letra2 = "E"
letra3 = "Ñ"
letra4 = "O"

result = staOf(letra1)+(lenOf(letra1)*staOf(letra2))+(lenOf(letra1)*lenOf(letra2)*staOf(letra3))+(lenOf(letra1)*lenOf(letra2)*lenOf(letra3)*staOf(letra4))
result2 = lenOf(letra1) * lenOf(letra2) * lenOf(letra3) * lenOf(letra4)


print("\nAlfa: "+str(result))
print("Beta: "+str(result+result2))
print("Longitud: "+str(result2))
print("Probabilidades de camino erróneo: "+str(1-result2))

# "inicio del buscado"
# "long1 * long 2 * long 3 ... start4"
# "long 1 * start2"
# "long 1 * long2 * start3"
# 
# "longitud del buscado"
# "long1 * long2 * long3 * long4"
# 
# "Fin del buscado"
# "inicio del buscado  + longitud del buscado"
# 
# 
# "EN CASO DE QUE PIDA PROBABILIDAD DE ENCONTRAR CAMINO NO DESEADO"
# "1 - Longitud"

currentSum = 0
for i in range(0,len(palabra)):
    if i == 0:
        currentSum = currentSum + staOf(palabraComp[i])
    else:
        innerSum = 1
        # print("factors:")
        for j in range(0,i):
            if j == i:
                # print(staOf(palabraComp[i]))
                innerSum = innerSum * staOf(palabraComp[i])
            else:
                # print(lenOf(palabraComp[j]))
                innerSum = innerSum * lenOf(palabraComp[j])
        currentSum = currentSum + innerSum