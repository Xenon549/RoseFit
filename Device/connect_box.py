from httplib2 import Http
from collections import namedtuple
import urlparse
import sys
import web
import Adafruit_DHT
import requests
import json
import time
import RPi.GPIO as GPIO
import time

http = Http()

key = "e10adc3949ba59a"

requrl_in = "http://120.110.113.61:3000/plant/initialize"

headers={'Content-type':'application/json'}

data_in = {'greenhouse_key':key}

resp_in,cont_in = http.request(requrl_in,'POST',headers=headers,body=json.dumps(data_in))

print resp_in
print cont_in


rp_we = cont_in
sp_js_data = json.loads(cont_in)


print str(sp_js_data['response'][0].values()[6])

air_H = sp_js_data['response'][0].values()[6]
air_T = sp_js_data['response'][0].values()[4]
soil_W = sp_js_data['response'][0].values()[3]

air_H_H = air_H + 3
air_H_L = air_H - 3

air_T_H = air_T + 3
air_T_L = air_T - 3

soil_W_H = soil_W + 3
soil_W_L = soil_W - 3



GPIO.setmode(GPIO.BCM)

fan_pin = 13

hot_light = 6

motor = 0

light = 0

soil_hm = 62

contDcOne_1 = 25 #DC1
contDcOne_2 = 8

contDcTwo_1 = 24 #DC2
contDcTwo_2 = 23

contDcThree_1 = 5 #DC3
contDcThree_2 = 9

contDcFour_1 = 7 #DC4
contDcFour_2 = 12

air_hm,air_tm = Adafruit_DHT.read_retry(11,4) #DHT11 setup

fan = 0

hot_light_st = 0

while True:

	try:
		light_st = 1
		if soil_hm < soil_W_L and  air_hm < air_H_L and air_tm < air_T_L:
			GPIO.output(fan_pin, GPIO.HIGH)
			GPIO.output(hot_light,GPIO.HIGH)
                	time.sleep(1500)

			air_hm,air_tm = Adafruit_DHT.read_retry(11,4)

			hot_light_st = 1
			fan = 1
        	#1

		if soil_hm > soil_W_H and air_hm < air_H_L and air_tm < air_T_L:

			GPIO.output(hot_light,GPIO.HIGH)
			time.sleep(1500)

			hot_light_st = 1
			air_hm,air_tm = Adafruit_DHT.read_retry(11,4)
	          #2
		if soil_hm < soil_W_L and air_hm < air_H_L and air_tm > air_T_H:
			GPIO.output(dc1_one, GPIO.HIGH)
			GPIO.output(dc2_one, GPIO.LOW)
			GPIO.output(dc1_two, GPIO.HIGH)
			GPIO.output(dc2_two, GPIO.LOW)
			GPIO.output(dc1_three, GPIO.HIGH)
			GPIO.output(dc2_three, GPIO.LOW)
			GPIO.output(dc1_four, GPIO.HIGH)
			GPIO.output(dc2_four, GPIO.LOW)
			time.sleep(30)
			motor = 1
			air_hm,air_tm = Adafruit_DHT.read_retry(11,4)
		 #3
		if soil_hm > soil_W_H and air_hm < air_H_L and air_tm > air_T_H:
			GPIO.output(fan_pin, GPIO.HIGH)
			time.sleep(1500)

			air_hm,air_tm = Adafruit_DHT.read_retry(11,4)

			fna = 1
		 #4

		if soil_hm < soil_W_L and air_hm > air_H_H and air_tm < air_T_L:
			GPIO.output(dc1_one, GPIO.HIGH)
			GPIO.output(dc2_one, GPIO.LOW)
			GPIO.output(dc1_two, GPIO.HIGH)
			GPIO.output(dc2_two, GPIO.LOW)
			GPIO.output(dc1_three, GPIO.HIGH)
			GPIO.output(dc2_three, GPIO.LOW)
			GPIO.output(dc1_four, GPIO.HIGH)
			GPIO.output(dc2_four, GPIO.LOW)
			time.sleep(30)
			GPIO.output(fan_pin, GPIO.HIGH)
			GPIO.output(hot_light,GPIO.HIGH)
			time.sleep(1500)

			air_hm,air_tm = Adafruit_DHT.read_retry(11,4)
			motor = 1

			fan = 1

			hot_light_st = 1
		 #5

		if soil_hm > soil_W_H and air_hm > air_H_H and air_tm < air_T_L:
			GPIO.output(fan_pin, GPIO.HIGH)
			GPIO.output(hot_light,GPIO.HIGH)
			timr.sleep(30)

			air_hm,air_tm = Adafruit_DHT.read_retry(11,4)
			hot_light_st = 1
			fan = 1

	      	 #6

		if soil_hm < soil_W_L and air_hm > air_H_H and air_tm > air_T_H:
			GPIO.output(dc1_one, GPIO.HIGH)
			GPIO.output(dc2_one, GPIO.LOW)
			GPIO.output(dc1_two, GPIO.HIGH)
			GPIO.output(dc2_two, GPIO.LOW)
			GPIO.output(dc1_three, GPIO.HIGH)
			GPIO.output(dc2_three, GPIO.LOW)
			GPIO.output(dc1_four, GPIO.HIGH)
			GPIO.output(dc2_four, GPIO.LOW)
			time.sleep(30)

			GPIO.output(fan_pin, GPIO.HIGH)
			time.sleep(1500)

			fan = 1
			motor = 1
			air_hm,air_tm = Adafruit_DHT.read_retry(11,4)

		 #7

		if soil_hm > soil_W_H and air_hm > air_H_H and air_tm < air_T_H:
			GPIO.output(fan_pin, GPIO.HIGH)
			time.sleep(1500)
			air_hm,air_tm = Adafruit_DHT.read_retry(11,4)
			fna= 1

		 #8

		sp = 0

		data = {'air_humidity':air_hm,'air_temperature':air_tm,'soil_humidity':soil_hm,'motor_status':motor,'light_status':light_st,'fan_status':fan,'heating_light':hot_light_st,'sprarying_status':sp,'ambient_light':light_st,'greenhouse_key':key}

		requrl = "http://120.110.113.70:3000/plant/update"
        	resp, content = http.request(requrl,'POST',headers=headers,body=json.dumps(data))
        	print(resp)

        	if resp.status == 200:
                	print "OK"
        	else:
	               	print "fal"

		requrl_cont = "http://120.110.113.61:3000/plant/control"

		resp_con,cont_con = http.request(requrl_cont,'POST',headers=headers,body=json.dumps(data_in))
		rp_we_con = cont_in
		sp_js_data_con = json.loads(cont_con)
		air_H_H = sp_js_data_con['response'][0].values()[6]
                air_H_L = sp_js_data_con['response'][0].values()[0]
                air_T_H = sp_js_data_con['response'][0].values()[1]
		air_T_L = sp_js_data_con['response'][0].values()[2]
		soil_H_H = sp_js_data_con['response'][0].values()[7]
                soil_H_H = sp_js_data_con['response'][0].values()[3]

	finally:
		GPIO.cleanup()
