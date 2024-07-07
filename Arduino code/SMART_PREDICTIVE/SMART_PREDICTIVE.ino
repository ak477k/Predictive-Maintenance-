#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <WiFiClient.h>
#include <ArduinoJson.h>
#include <DHT.h>  // Including library for dht
#include <Wire.h>
#include <Adafruit_Sensor.h>
#include <Adafruit_ADXL345_U.h>

const char* ssid = "project";
const char* password = "project007";

// Domain name with URL path or IP address with path
String serverName = "wupdate.php?";
String serverName1 ="http://mycollegeproject.xyz/SmartPredictive/API_KEY_API.php";

#define DHTPIN 14          // Pin where the dht11 is connected
Adafruit_ADXL345_Unified accel = Adafruit_ADXL345_Unified(12345); // Address is ignored here

DHT dht(DHTPIN, DHT11);


unsigned long lastTime = 0;
unsigned long timerDelay = 5000;
int token =123;

String token1;
float magnitude;

void setup() 
{
  Serial.begin(115200);
  WiFi.begin(ssid, password);
  dht.begin();

  if(!accel.begin())
  {
    Serial.println("Failed to initialize the accelerometer!");
    while(1);
  }

  Serial.println("Connecting");
  
  while(WiFi.status() != WL_CONNECTED) 
  {
    delay(500);
    Serial.print(".");
  }
  
  Serial.println("");
  Serial.print("Connected to WiFi network with IP Address: ");
  Serial.println(WiFi.localIP());
  
  if(WiFi.status() == WL_CONNECTED)
  {
    WiFiClient client;
    HTTPClient http;
    http.begin(client, serverName1.c_str());  
   // token1 = doc[0]["Token"].as<String>();
    }
    

  delay(5000);
}

void loop() 
{
  if ((millis() - lastTime) > timerDelay)
  {
    if(WiFi.status()== WL_CONNECTED)
    {
      WiFiClient client;
      HTTPClient http;

      float h = dht.readHumidity();
      float t = dht.readTemperature();
      
      if (isnan(h) || isnan(t))
      {
        Serial.println("Failed to read from DHT sensor!");
        return;
      }

      sensors_event_t event; 
      accel.getEvent(&event);

      // Calculate the magnitude of acceleration
      float magnitude = sqrt(sq(event.acceleration.x) + sq(event.acceleration.y) + sq(event.acceleration.z));
      Serial.print("Acceleration Magnitude: ");
      Serial.println(magnitude);

      Serial.print("TEMPERATURE=");
      Serial.print(t);
      Serial.print("ºC / ");
      Serial.print("HUMIDITY=");
      Serial.print(h);
      
      String serverPath = serverName + "TEMP=" + t + "&HUMIDITY=" + h + "&Magnitude=" + String(magnitude) + "&token=" + String(token);
      Serial.println(serverPath);
      
      http.end();
    } 
    else 
    {
      Serial.println("WiFi Disconnected");
    }
    lastTime = millis();
  }
}

