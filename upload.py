import mysql.connector
import random
import datetime
import time as t

mydb = mysql.connector.connect(
    user="phpmyadmin", 
    port="3306",
    password="srini", 
    host="localhost", 
    database="smarttray"
    ) 



while True:
    sensor1 = random.randint(50,900);
    sensor2 = random.randint(50,900);
    sensor3 = random.randint(50,900);
    sample = "water";
    sample1 = "coconut oil";
    sample2 = "crude oil";
    total_volume = 1000;

    percentage = (sensor1 / total_volume) * 100;
    percentage1 = (sensor2 / total_volume) * 100;
    percentage2 = (sensor3 / total_volume) * 100;

    id=1;
    timestamp = datetime.datetime.now().strftime('%Y-%m-%d %H:%M:%S')
    mycursor = mydb.cursor()


    sql = "INSERT INTO sensor (id, sensor1, sensor2, sensor3, sample, sample1, sample2, percentage, percentage1, percentage2, timestamp) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s )"
    val = (id, sensor1,sensor2,sensor3, sample, sample1, sample2, percentage, percentage1, percentage2, timestamp);
    mycursor.execute(sql, val)

    mydb.commit()
    
    print(mycursor.rowcount, "record inserted.")
    t.sleep(2)