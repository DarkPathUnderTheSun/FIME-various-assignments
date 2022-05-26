import itertools
import logging
from random import randint
import re
from time import sleep
import PySimpleGUI as sg
from numpy import convolve

def algorithm(text, pattern, aggresiveness):
    pattern = pattern.replace("\n","")
    text = text.replace("\n","")
    alphabet = ''.join(sorted(set(text+pattern)))

    map = list(alphabet)

    def mapStringToSequence(string, map):
        result = []
        for each in string:
            result.append(string.index(each))
        return result

    def mapSequenceToString(sequence, map):
        result = []
        for each in sequence:
            result.append(map[each])
        return result

    alphabetSpace = sorted(list(itertools.permutations(alphabet)))

    randomMap = randint(0,len(alphabetSpace)-1)

    matchVector = []
    for i in range(0,len(text)-len(pattern)+1):
        matches = 0
        for j in range(0,len(pattern)):
            if pattern[j]==text[i+j]:
                matches = matches + 1
        matchVector.append(matches)

    matchFound = False
    goodMatch = 0
    for i in range(len(matchVector)):
        if matchVector[i] == len(pattern):
            goodMatch = i
            matchFound = True

    textSequence = mapStringToSequence(text,map)
    patternSequence = mapStringToSequence(pattern,map)
    convolutionOfStrings = list(convolve(patternSequence, textSequence, 'same'))


    maxOfConv = 0
    maxOfConv = int(max(convolutionOfStrings))
    tolerance = 0
    tolerance = maxOfConv - (maxOfConv * (float(aggresiveness)/100))

    apprMatches = []
    for i in range(len(convolutionOfStrings)-len(pattern)):
        if convolutionOfStrings[i] >= tolerance:
            apprMatches.append(i)
    if matchFound:
        apprMatches.append(goodMatch)

    return(apprMatches)


def driver(filename, output, sequence, aggressiveness, delays):
    file = open(filename,'r')
    outPut = output
    logging.basicConfig(filename=outPut, level=logging.DEBUG, format='',filemode = "w+")
    logging.info("\nBuscando secuencia: "+sequence)
    matchCount = 0
    linesOfMatches = []
    logging.info("\n")
    for i, line in enumerate(file):
        # Get protein title
        if '>' in line:
            proteinTitle = line
            proteinTitle = re.sub("(?<=\|)(.*?)(?=\|)", "", proteinTitle)
            proteinTitle = proteinTitle.replace(">gi||||","")
            logging.info(proteinTitle)
        else:
            text = line
            matches = algorithm(text,sequence,aggressiveness)
            if len(matches) == 0:
                logging.info("Linea "+str(i)+" -> "+"No se encontraron coincidencias")
            for each in matches:
                matchCount = matchCount + 1
                buffer = "Linea "+str(i)+" -> "
                lineResult = buffer+(line.replace("\n",""))
                patternResult = " "*(each+len(buffer))+sequence
                logging.info(lineResult)
                logging.info(patternResult)
                window['-OUTPUT-'].update(lineResult+"\n"+patternResult)
                sleep(delays)
                window.Refresh()
                linesOfMatches.append(i)
            logging.info(">===============================================================================")

    logging.info("\n\n")
    logging.info(str(matchCount)+" coincidencias aproximadas encontradas,")
    logging.info("En las lineas: "+str(linesOfMatches))
    file.close()


sg.theme('DarkGrey12')

layout = [  [sg.Text('Selecciona un archivo para ejecutar el algoritmo')],
            [sg.Text('Archivo .FNA'), sg.Push(), sg.Input(size=(70, 1)), sg.FileBrowse()],
            [sg.Text('Patron'), sg.Push(), sg.Input(key='-PATTERN-',size=(70, 1))],
            [sg.Text('Agresividad'), sg.Push(), sg.Input(key='-AGGRESSIVENESS-',size=(70, 1))],
            [sg.Text('Archivo de salida'), sg.Push(), sg.Input(key='-OUTPUTFILENAME-',size=(70, 1))],
            [sg.Button('Iniciar'), sg.Button('Salir'), sg.Checkbox('Modo lento', default=True)],
            [sg.Output(size=(100,2), key='-OUTPUT-')]  ]

window = sg.Window('ProteinSearch', layout)

while True:             # Event Loop
    event, values = window.read()
    if event in (sg.WIN_CLOSED, 'Salir'):
        break
    if event == 'Clear':
        window['-OUTPUT-'].update('')
    if event == 'Iniciar':
# =========================================================== DRIVER CODE GOES HERE
        delays = 0
        if values[1]:
            delays = 0.1
        filename = values['Browse']
        pattern = values['-PATTERN-']
        aggressiveness = values['-AGGRESSIVENESS-']
        outputFilename = values['-OUTPUTFILENAME-']
        print(filename)
        print(pattern)
        print(aggressiveness)
        print(outputFilename)
        driver(filename, outputFilename, pattern, aggressiveness, delays)
        window['-OUTPUT-'].update("Listo. Revisa el archivo "+outputFilename)
# =========================================================== DRIVER CODE ENDS HERE
window.close()