#include <Servo.h>

int servoPin = 12;

//create a obj of servo class
Servo servo1;

void setup()
{
  //pin2 use for pir input
  pinMode(A5, INPUT);
  //pin9 use for led
  pinMode(9, OUTPUT);
  //set initial pir input as low
  digitalWrite(9, HIGH);
  servo1.attach(servoPin);
  Serial.begin(9600);
  
  delay(3000);
}

void loop()
{
  int ldr = analogRead(A5);
  float analog_Voltage=ldr*(5.0/1024.0);
  Serial.println(analog_Voltage);
  if(analog_Voltage >= 0.25){
    digitalWrite(9, LOW);
    servo1.write(120);
    delay(1000);
  }
  else{
    servo1.write(0);
    
    digitalWrite(9, HIGH);
    delay(1000);
  }
  
}
