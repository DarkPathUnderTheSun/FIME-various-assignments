import os
import json
import mysql.connector
import matplotlib.pyplot as plt
from datetime import datetime
import numpy as np
from statistics import variance



def average(num):
    sum_num = 0
    for t in num:
        sum_num = sum_num + t           

    avg = sum_num / len(num)
    return avg

while 1:
    if os.path.exists('graph.json'):
        print("graph request received")
        print("with parameters:")
        file = open('graph.json')
        data = json.load(file)
        file.close()
        os.remove('graph.json') 
        if data["db"] == "temp":
            print('start date: ' + data['startDate'])
            print('end date: ' + data['endDate'])
            print('employee number: ' + data['employeeNumber'])
            print("connecting to database...")
            db = mysql.connector.connect(
            host="localhost",
            user="user",
            password="password",
            database="yada"
            )
            startDate = "'"+str(data["startDate"])+" 00:00:00'"
            endDate = "'"+str(data["endDate"])+" 23:59:59'"
            extra = ''
            if data['onlyAbove37'] == '1':
                extra = ' and temp < 37'
            query = "select * from covid_thermometer where person = "+str(data["employeeNumber"])+" and temp_datetime between "+startDate+" and "+endDate+extra
            cursor = db.cursor()
            cursor.execute(query)
            result = cursor.fetchall()
            tempData = []
            degree37mark = []
            for x in range(0,len(result)):
                tempData.append(result[x][1])
                degree37mark.append(37)
            dateData = []
            for x in range(0,len(result)):
                dateData.append(datetime.strptime(str(result[x][2]), '%Y-%m-%d %H:%M:%S'))
            if ((any(ele > 37 for ele in tempData))):
                color = 'red'
            else:
                color = 'green'
            print("generating graph...")
            plt.plot(dateData,tempData, c=color)
            plt.plot(dateData,degree37mark, c='black')
            plt.gcf().autofmt_xdate()
            plt.savefig('graph.png')
            plt.cla()
            plt.clf()
            print('========================')
        if data["db"] == "quality":
            print('start date: ' + data['startDate'])
            print('end date: ' + data['endDate'])
            print('analysis type: ' + data['analysisType'])
            print('data set: ' + data['measureType'])
            startDate = "'"+str(data["startDate"])+" 00:00:00'"
            endDate = "'"+str(data["endDate"])+" 23:59:59'"
            if data['measureType'] == 'inner1':
                dataSet = 'innerdiameter1'
            if data['measureType'] == 'outer1':
                dataSet = 'outerdiameter1'
            if data['measureType'] == 'inner2':
                dataSet = 'innerdiameter2'
            if data['measureType'] == 'outer2':
                dataSet = 'outerdiameter2'
            print("connecting to database...")
            db = mysql.connector.connect(
            host="localhost",
            user="user",
            password="password",
            database="yada"
            )
            query = "select * from qualityData where measureDate between "+startDate+" and "+endDate
            cursor = db.cursor()
            cursor.execute(query)
            result = cursor.fetchall()
            actualdata = []
            if dataSet == 'innerdiameter1':
                realLowerTolerance = 2.4
                realUpperTolerance = 2.6
                for i in range(0,len(result)):
                    actualdata.append(result[i][0])
            if dataSet == 'outerdiameter1':
                realLowerTolerance = 2.8
                realUpperTolerance = 3.0
                for i in range(0,len(result)):
                    actualdata.append(result[i][1])
            if dataSet == 'innerdiameter2':
                realLowerTolerance = 4.4
                realUpperTolerance = 4.6
                for i in range(0,len(result)):
                    actualdata.append(result[i][2])
            if dataSet == 'outerdiameter2':
                realLowerTolerance = 4.8
                realUpperTolerance = 4.9
                for i in range(0,len(result)):
                    actualdata.append(result[i][3])
            dateData = []
            for i in range(0,len(result)):
                dateData.append(result[i][4])
            print('processing data...')
            if data['analysisType']=='fuzzyLogic':
                if ((any(ele > realUpperTolerance for ele in actualdata) or any(ele < realLowerTolerance for ele in actualdata)) and (average(actualdata)>average([realLowerTolerance,realUpperTolerance]))):
                    color = 'red'
                else:
                    color = 'green'
                realUpperToleranceList = []
                for i in range(0,len(actualdata)):
                    realUpperToleranceList.append(realUpperTolerance)
                realLowerToleranceList = []
                for i in range(0,len(actualdata)):
                    realLowerToleranceList.append(realLowerTolerance)
                realToleranceAverageList = []
                for i in range(0,len(actualdata)):
                    realToleranceAverageList.append(average([realLowerTolerance,realUpperTolerance]))
                actualdataAverageList = []
                for i in range(0,len(actualdata)):
                    actualdataAverageList.append(average(actualdata))
                print('generating graph...')
                plt.plot(dateData,actualdata, c=color)
                plt.plot(dateData,realUpperToleranceList, c='black')
                plt.plot(dateData,realLowerToleranceList, c='black')
                plt.plot(dateData,realToleranceAverageList, c='black')
                plt.plot(dateData,actualdataAverageList, c='gray')
                plt.gcf().autofmt_xdate()
                plt.savefig('qualityGraph.png')
                plt.cla()
                plt.clf()
                print('========================')
            if data['analysisType']=='bollinger':
                varianz = []
                newSet = actualdata
                for i in range(2,len(actualdata)+1):
                    varianz.append(variance(newSet[:i])*20)
                upperBollinger = []
                lowerBollinger = []
                avgBollinger = []
                for i in range(0,len(varianz)):
                    if (i == 0):
                        upperBollinger.append(varianz[0]+newSet[0])
                        lowerBollinger.append(newSet[0]-varianz[0])
                        avgBollinger.append(newSet[0])
                    else:
                        upperBollinger.append(varianz[i]+average(newSet[:i+1]))
                        lowerBollinger.append(average(newSet[:i+1])-varianz[i])
                        avgBollinger.append(average(newSet[:i+1]))
                print('generating graph...')
                bollLength = 0-len(avgBollinger)
                plt.plot(dateData,actualdata, c='black')
                plt.plot(dateData[bollLength:],upperBollinger, c='green')
                plt.plot(dateData[bollLength:],lowerBollinger, c='red')
                plt.plot(dateData[bollLength:],avgBollinger, c='gold')
                plt.gcf().autofmt_xdate()
                plt.savefig('qualityGraph.png')
                plt.cla()
                plt.clf()
                print('========================')