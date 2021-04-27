#include <ESP8266WiFi.h>
#include <WiFiClient.h> 
#include<Wire.h>
#include <LiquidCrystal_I2C.h>
LiquidCrystal_I2C lcd(0x27,16,2);

//-------------------VARIABLES GLOBALES--------------------------

double i = 0;
double a = millis();
double c ;
float arr[6];
int lap = 0;
float Tiempo ;
const int BOTON=15;
bool empezar=false;
// Sustituir con datos de vuestra red
const char* ssid     = "DIGIFIBRA-hKZG";
const char* password = "YtpZRb2ebS";

unsigned long previousMillis = 0;

char host[48];
String strhost = "192.168.1.160";
String strurl = "/pagina/Controlador/tiempoControlador.php";
String chipid = "";

void doThisWhenInterrupt0Falls() {
  lap = 0;
}  
String enviardatos(String datos) {
  String linea = "error";
  WiFiClient client;
  strhost.toCharArray(host, 49);
  if (!client.connect(host, 80)) {
    Serial.println("Fallo de conexion");
    return linea;
  }

  client.print(String("POST ") + strurl + " HTTP/1.1" + "\r\n" + 
               "Host: " + strhost + "\r\n" +
               "Accept: */*" + "*\r\n" +
               "Content-Length: " + datos.length() + "\r\n" +
               "Content-Type: application/x-www-form-urlencoded" + "\r\n" +
               "\r\n" +datos);           
  delay(10);             
  
  Serial.print("Enviando datos a SQL...");
  
  unsigned long timeout = millis();
  while (client.available() == 0) {
    if (millis() - timeout > 5000) {
      Serial.println("Cliente fuera de tiempo!");
      client.stop();
      return linea;
    }
  }
  // Lee todas las lineas que recibe del servidro y las imprime por la terminal serial
  while(client.available()){
    linea = client.readStringUntil('\r');
  }  
  Serial.println(linea);
  return linea;
}

void setup()
{
  Serial.begin(115200);
  delay(10);
  
  WiFi.mode(WIFI_STA);
  WiFi.begin(ssid, password);
  Serial.print("Conectando a:\t");
  Serial.println(ssid); 

  // Esperar a que nos conectemos
  while (WiFi.status() != WL_CONNECTED) 
  {
    delay(200);
   Serial.print('.');
  }

  // Mostrar mensaje de exito y dirección IP asignada
  Serial.println();
  Serial.print("Conectado a:\t");
  Serial.println(WiFi.SSID()); 
  Serial.print("IP address:\t");
  Serial.println(WiFi.localIP());

    lcd.begin(16,2);
    lcd.init();
  lcd.backlight();
  pinMode(2, INPUT);
  digitalWrite(2, HIGH);
   pinMode(BOTON,INPUT);

  lcd.clear();
  lcd.print("Empieza-nombre");
}

void loop()
{
 
if(digitalRead(BOTON) == HIGH)
   {
    empezar = true;
    a = millis();
    Tiempo = millis();
   }
 if (empezar == true){
   if (empezar  && digitalRead(2) == LOW){
   c = millis();
   i = (c - a) / 1000;
   if(i > 1)
    { 
      lap++;

      if(lap > 1){
      lcd.clear();
      lcd.print("Lap: ");
      Serial.print("Lap: ");
      lcd.print(lap-1);
      Serial.print(lap-1);
      lcd.print("\t\t");
      Serial.print("\t");
      lcd.println(i);
      Serial.print(i);
      Serial.println(arr[lap]);
      } else {
        lcd.clear();
        lcd.print("vuelta de prueba");
        Serial.println("prueba");

      }
 

      arr[lap] = i;
      a = millis();
    }

    if(lap==5)
    {
      delay(1000);
      lcd.clear();
      lcd.print("TIEMPO: ");
      Serial.print("TIEMPO: ");
      double valorTotal = arr[4]+arr[5]+arr[2]+arr[3];
      Serial.print("\t");
      Serial.print(valorTotal);
      lcd.print(valorTotal);
      lcd.print(" seg");
      delay(2000);
      lcd.clear();
      lcd.setCursor(0,0);
      lcd.print("Espera un momento ");
      lcd.setCursor(0,1);
      lcd.print("Reiniciando valores");
      Tiempo = millis();
      enviardatos("tiempo=" + String(valorTotal));
      ESP.reset();

     
    }
    
     
   }
 }
   
}
