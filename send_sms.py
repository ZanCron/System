import serial
import sys
import time

phone_number = sys.argv[1]
message = sys.argv[2]

try:
    ser = serial.Serial('COM3', 9600, timeout=1)
    print("Serial port opened successfully")
except serial.SerialException as e:
    print(f"Error opening serial port: {e}")
    sys.exit(1)

def send_sms(phone_number, message):
    try:

        ser.write(b'AT+CMGF=1\r')
        time.sleep(0.5)


        ser.write(b'AT+CMGS="' + phone_number.encode() + b'"\r')
        time.sleep(0.5)


        ser.write(message.encode() + b'\r')
        time.sleep(0.5)

        ser.write(b'\x1A')
        time.sleep(0.5)

        response = ser.read_all().decode('utf-8')
        print(f"Response: {response}")

        if 'OK' in response:
            print(f"SMS sent successfully to {phone_number}!")
        else:
            print(f"Failed to send SMS. Response: {response}")

    except Exception as e:
        print(f"Error sending SMS: {e}")

send_sms(phone_number, message)

ser.close()
