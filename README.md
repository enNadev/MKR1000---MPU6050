## Internet of Things (IoT) aplication for monitoring machining vibrations

#### Hardware: Arduino MKR1000 microcontroller and the MPU6050 sensor module that contains a triple axis Gyroscope & Accelerometer IMU.

The project consists of the following modules/components:
- The firmware that is designed in C (Arduino IDE). Its purpose is to manipulate the sensors and collect the data that is generated. 
Chunks of data are stored in a FIFO buffer in the sensors, and when a sufficient amount of data is reached, the microcontroller streams the data on the Server.

- The data is stored in a database and the user can export a CSV file.

- The interface of the app where the acquired data is visualized in real-time.
The visualization contains the accelerations and gyros that occurs in all axis and are captured from the sensors.

The communication protocol between the microcontroller and the sensors is the I2C bus protocol.
The communication protocol between the microcontroller and the access point is the IEEE 802.11 (WiFi) protocol.
The power supply for the microcontroller (Arduino MKR1000) is a 1400mAh LiPo battery.
