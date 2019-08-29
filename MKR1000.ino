#include <ArduinoHttpClient.h>
#include <WiFi101.h>
#include <MPU6050_tockn.h>
#include <Wire.h>
MPU6050 mpu6050(Wire);

long timer = 0;

String contentType = "application/x-www-form-urlencoded";

// ------------- Wifi Settings ------------- //
// Firewall might block the device. If so, de-activated the firewall
char ssid[] = "";          // "ssid of Wifi (the name)"
char pass[] = "";          // "wifi password"
char serverAddress[] = ""; // "server IP address". This address changes automatically over time so needs check
int port = 80; 
WiFiClient wifi;
HttpClient client = HttpClient(wifi, serverAddress, port);

int status = WL_IDLE_STATUS;
String response;
int statusCode = 0;
int count = 0;

void setup() {
  Serial.begin(115200);
  Wire.begin();
  mpu6050.begin();
  mpu6050.calcGyroOffsets(true);
  while ( status != WL_CONNECTED) {
    Serial.print("Attempting to connect to Network named: ");
    Serial.println(ssid);
    // Connect to WPA/WPA2 network:
    status = WiFi.begin(ssid, pass);
  }
  // Print the SSID of the network you're attached to as well as your WiFi shield's IP address
  Serial.print("SSID: ");
  Serial.println(WiFi.SSID());
  IPAddress ip = WiFi.localIP();
  Serial.print("IP Address: ");
  Serial.println(ip);

  // Clearing the database from previous values
  Serial.println("Clearing Data");
  client.post("/project/services/serviceDeleteDB.php", contentType, "");
  delay(500);
  statusCode = client.responseStatusCode();
  response = client.responseBody();
  Serial.println("Data Cleared");
  Serial.print("Status code: ");
  Serial.println(statusCode);
  Serial.print("response: ");
  Serial.println(response);
}

void loop() {
  mpu6050.update();
  Serial.print("Current: ");
  Serial.println(millis());

  // Buffering starts
  /* The buffering happens in four arrays with length of 6.
  Depending on the data rate generation, the length can vary. (MPU's buffer size: 1024 bytes) */
  String values  = "{\"size\":[6],\"data\":[";
  String values1 = "{\"size\":[6],\"data\":[";
  String values2 = "{\"size\":[6],\"data\":[";
  String values3 = "{\"size\":[6],\"data\":[";
  for (int i = 0; i < 6; i++) { 
    values += String(mpu6050.getAccX()) + ",";
    values += String(mpu6050.getAccY()) + ",";
    values += String(mpu6050.getAccZ()) + ",";
    values += String(mpu6050.getGyroX()) + ",";
    values += String(mpu6050.getGyroY()) + ",";
    values += String(mpu6050.getGyroZ()) + ",";
    if (i == 5)
      values += String(mpu6050.getGyroZ()) + "]}";
    else
      values += String(mpu6050.getGyroZ()) + ",";
    delay(10);
  }
  for (int i = 6; i < 12; i++) {
    values1 += String(mpu6050.getAccX()) + ",";
    values1 += String(mpu6050.getAccY()) + ",";
    values1 += String(mpu6050.getAccZ()) + ",";
    values1 += String(mpu6050.getGyroX()) + ",";
    values1 += String(mpu6050.getGyroY()) + ",";
    values1 += String(mpu6050.getGyroZ()) + ",";
    if (i == 11)
      values1 += String(mpu6050.getGyroZ()) + "]}";
    else
      values1 += String(mpu6050.getGyroZ()) + ",";
    delay(10);
  }
  for (int i = 12; i < 18; i++) {
    values2 += String(mpu6050.getAccX()) + ",";
    values2 += String(mpu6050.getAccY()) + ",";
    values2 += String(mpu6050.getAccZ()) + ",";
    values2 += String(mpu6050.getGyroX()) + ",";
    values2 += String(mpu6050.getGyroY()) + ",";
    values2 += String(mpu6050.getGyroZ()) + ",";
    if (i == 17)
      values2 += String(mpu6050.getGyroZ()) + "]}";
    else
      values2 += String(mpu6050.getGyroZ()) + ",";
    delay(10);
  }
  for (int i = 19; i < 25; i++) {
    values3 += String(mpu6050.getAccX()) + ",";
    values3 += String(mpu6050.getAccY()) + ",";
    values3 += String(mpu6050.getAccZ()) + ",";
    values3 += String(mpu6050.getGyroX()) + ",";
    values3 += String(mpu6050.getGyroY()) + ",";
    values3 += String(mpu6050.getGyroZ()) + ",";
    if (i == 24)
      values3 += String(mpu6050.getGyroZ()) + "]}";
    else
      values3 += String(mpu6050.getGyroZ()) + ",";
    delay(10);
  }
  
  // POST of the data
  String contentType = "application/x-www-form-urlencoded";
  String postData  = "arr=" + String(values); 
  String postData1 = "arr=" + String(values1);
  String postData2 = "arr=" + String(values2);
  String postData3 = "arr=" + String(values3);

  Serial.println(postData);
  Serial.println(postData1);
  Serial.println(postData2);
  Serial.println(postData3);

  // POST starts
  client.post("/project/services/serviceJson.php", contentType, postData);
  delay(500);
  Serial.println("1st");
  statusCode = client.responseStatusCode();
  response = client.responseBody();
  Serial.print("Status code: ");
  Serial.println(statusCode);
  Serial.print("response: ");
  Serial.println(response);
  client.post("/project/services/serviceJson.php", contentType, postData1);
  delay(500);
  statusCode = client.responseStatusCode();
  response = client.responseBody();
  Serial.print("Status code: ");
  Serial.println(statusCode);
  Serial.print("response: ");
  Serial.println(response);
  Serial.print("Previous: ");
  Serial.println("2nd");
  client.post("/project/services/serviceJson.php", contentType, postData2);
  delay(500);
  statusCode = client.responseStatusCode();
  response = client.responseBody();
  Serial.print("Status code: ");
  Serial.println(statusCode);
  Serial.print("response: ");
  Serial.println(response);
  Serial.print("Previous: ");
  Serial.println("3rd");
  client.post("/project/services/serviceJson.php", contentType, postData3);
  delay(500);
  statusCode = client.responseStatusCode();
  response = client.responseBody();
  Serial.print("Status code: ");
  Serial.println(statusCode);
  Serial.print("response: ");
  Serial.println(response);
  Serial.print("Previous: ");
  Serial.println("4th");
  delay(5000);
}
