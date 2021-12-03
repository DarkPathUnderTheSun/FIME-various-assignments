import mysql.connector

db = mysql.connector.connect(
    host="localhost",
    user="user",
    password="password",
    database="yada"
)
# query = "select * from qualityData where measureDate between "+startDate+" and "+endDate
# cursor = db.cursor()
# cursor.execute(query)

import random

for day in range(1,31+1):
    if day == 1:
        day = "01"
    if day == 2:
        day = "02"
    if day == 3:
        day = "03"
    if day == 4:
        day = "04"
    if day == 5:
        day = "05"
    if day == 6:
        day = "06"
    if day == 7:
        day = "07"
    if day == 8:
        day = "08"
    if day == 9:
        day = "09"

    # 7 am
    inner1 = round(random.uniform(2.4,2.6), 2)
    outer1 = round(random.uniform(2.8,3.0), 2)
    inner2 = round(random.uniform(4.4,4.6), 2)
    outer2 = round(random.uniform(4.8,5.0), 2)
    minute = random.randint(10,45)
    second = random.randint(1,59)
    query = "INSERT INTO qualityData VALUES ("+str(inner1)+", "+str(outer1)+", "+str(inner2)+", "+str(outer2)+", '2021-10-"+str(day)+" 07:"+str(minute)+":"+str(second)+"')"
    cursor = db.cursor()
    cursor.execute(query)

    # 10 am
    inner1 = round(random.uniform(2.4,2.6), 2)
    outer1 = round(random.uniform(2.8,3.0), 2)
    inner2 = round(random.uniform(4.4,4.6), 2)
    outer2 = round(random.uniform(4.8,5.0), 2)
    minute = random.randint(10,45)
    second = random.randint(1,59)
    query = "INSERT INTO qualityData VALUES ("+str(inner1)+", "+str(outer1)+", "+str(inner2)+", "+str(outer2)+", '2021-10-"+str(day)+" 10:"+str(minute)+":"+str(second)+"')"
    cursor = db.cursor()
    cursor.execute(query)

    # 3 pm
    inner1 = round(random.uniform(2.4,2.6), 2)
    outer1 = round(random.uniform(2.8,3.0), 2)
    inner2 = round(random.uniform(4.4,4.6), 2)
    outer2 = round(random.uniform(4.8,5.0), 2)
    minute = random.randint(10,45)
    second = random.randint(1,59)
    query = "INSERT INTO qualityData VALUES ("+str(inner1)+", "+str(outer1)+", "+str(inner2)+", "+str(outer2)+", '2021-10-"+str(day)+" 15:"+str(minute)+":"+str(second)+"')"
    cursor = db.cursor()
    cursor.execute(query)

db.commit()
