# Internet of Things (IoT) aplication for monitoring machining vibrations

### The hardware used is: Arduino MKR1000 microcontroller and the MPU6050 sensor module that contains a triple axis Gyroscope & Accelerometer IMU.

The project consists of the following modules/components:
- The firmware that is designed in C (Arduino IDE). Its purpose is to manipulate the sensors and collect the data that is generated. 
Chucks of data are stored in a FIFO buffer in the sensors and when sufficient amount of adata is reached, the microcontroller streams the data on the Server.

- The The data is stored in a database and the user can export a CSV file.

- The interface of the app where the data that is aquired, is visualized in real time.
The visualization contains the accelerations and gyros that occurs in all axis and are captured from the sensors.
