#include <ESP8266WiFi.h>      // Library menghubungkan ESP8266 ke jaringan WiFi
#include <WiFiClientSecure.h> // Library untuk koneksi HTTPS
#include <NewPing.h>          // Library menggunakan sensor ultrasonik HC-SR04

// Konfigurasi ini menentukan SSID dan password untuk menghubungkan ESP8266 ke jaringan WiFi yang dipakai.
const char* ssid = "12345678910";
const char* password = "10987654321";

// Alamat dan port server untuk mengirim data.
const char* serverName = "patarupipwk.my.id"; // Alamat server
const int serverPort = 443; // Port untuk HTTPS (biasanya 443 untuk HTTPS)

// Definisikan pin Trigger dan Echo untuk masing-masing sensor ultrasonik
#define TRIG_PIN_1 D1
#define ECHO_PIN_1 D2
#define TRIG_PIN_2 D3
#define ECHO_PIN_2 D4 
#define TRIG_PIN_3 D5
#define ECHO_PIN_3 D6
#define TRIG_PIN_4 D7
#define ECHO_PIN_4 D8
#define MAX_DISTANCE 200 // Maksimum Pembacaan Jarak (cm)

// Inisialisasi objek NewPing untuk masing-masing sensor
NewPing sonar_1(TRIG_PIN_1, ECHO_PIN_1, MAX_DISTANCE);
NewPing sonar_2(TRIG_PIN_2, ECHO_PIN_2, MAX_DISTANCE);
NewPing sonar_3(TRIG_PIN_3, ECHO_PIN_3, MAX_DISTANCE);
NewPing sonar_4(TRIG_PIN_4, ECHO_PIN_4, MAX_DISTANCE);

//// Fungsi untuk mengirimkan data ke server
void sendData(float sensor1, float sensor2, float sensor3, float sensor4) {
  WiFiClientSecure client; // Menggunakan WiFiClientSecure untuk koneksi HTTPS
  client.setInsecure(); // Mengabaikan verifikasi sertifikat SSL (gunakan dengan hati-hati)

  if (!client.connect(serverName, serverPort)) {
    Serial.println("Koneksi ke server gagal");
    return;
  }

  // Data yang akan dikirim ke server dalam format URL-encoded
  String postData = "sensor1=" + String(sensor1) + "&sensor2=" + String(sensor2) + "&sensor3=" + String(sensor3) + "&sensor4=" + String(sensor4);

  String url = "/update.php";
  client.print(String("POST ") + url + " HTTP/1.1\r\n" +
               "Host: " + serverName + "\r\n" +
               "Content-Type: application/x-www-form-urlencoded\r\n" +
               "Content-Length: " + postData.length() + "\r\n" +
               "Connection: close\r\n\r\n" +
               postData);

  // Membaca respons dari server
  while (client.connected()) {
    String line = client.readStringUntil('\n');
    if (line == "\r") {
      break;
    }
  }
  String response = client.readString();
  Serial.println("Response:");
  Serial.println(response);

  // Menutup koneksi
  client.stop();
}

// Untuk menghubungkan ESP8266 ke jaringan WiFi dan mencetak informasi koneksi ke Serial Monitor.
void setup() {
  Serial.begin(115200);
  
  WiFi.mode(WIFI_STA);
  WiFi.begin(ssid, password);
  Serial.println("");

  Serial.print("Connecting");
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }

  Serial.println("");
  Serial.print("Connected to ");
  Serial.println(ssid);
  Serial.print("IP address: ");
  Serial.println(WiFi.localIP());
}

// Untuk mengukur jarak dengan sensor ultrasonik, mencetak hasilnya, dan mengirimkan data ke server.
void loop() {
  // Pengukuran jarak oleh masing-masing sensor
  float distance_1 = sonar_1.ping_cm();
  float distance_2 = sonar_2.ping_cm();
  float distance_3 = sonar_3.ping_cm();
  float distance_4 = sonar_4.ping_cm();

  // Cetak hasil pengukuran ke Serial Monitor
  Serial.print("Sensor 1: ");
  Serial.print(distance_1);
  Serial.println(" cm");
  Serial.print("Sensor 2: ");
  Serial.print(distance_2);
  Serial.println(" cm");
  Serial.print("Sensor 3: ");
  Serial.print(distance_3);
  Serial.println(" cm");
  Serial.print("Sensor 4: ");
  Serial.print(distance_4);
  Serial.println(" cm");

  // Cetak hasil pengukuran ke Serial Monitor
  Serial.print("sonar 1: ");        //variabel sonar 1
  Serial.println(distance_1 <50);
  Serial.print("sonar 2: ");
  Serial.println(distance_2 <50);
  Serial.print("sonar 3: ");
  Serial.println(distance_3 <50);
  Serial.print("sonar 4: ");
  Serial.println(distance_4 <50);

int sonar_1 = 0;
if (distance_1 <50)
    sonar_1 = 1;  // 1 itu tidak tersedia
  
else
  {
	sonar_1 = 0;   // 0 itu tersedia
  }


int sonar_2 = 0;
if (distance_2 <50)
    sonar_2 = 1;
  
else
  {
	sonar_2 = 0; 
  }

int sonar_3 = 0;
if (distance_4 <50)
    sonar_3 = 1;
  
else
  {
	sonar_3 = 0; 
  }

int sonar_4 = 0;
if (distance_4 <50)
    sonar_4 = 1;
  
else
  {
	sonar_4 = 0; 
  }

  // Menentukan status berdasarkan jarak
  int status_1 = (distance_1 < 50) ? 1 : 0;
  int status_2 = (distance_2 < 50) ? 1 : 0;
  int status_3 = (distance_3 < 50) ? 1 : 0;
  int status_4 = (distance_4 < 50) ? 1 : 0;

  // Kirim data status ke server
  sendData(status_1, status_2, status_3, status_4);

  // Tunggu sebelum mengirim data lagi
  delay(1000); // 1 detik
}
