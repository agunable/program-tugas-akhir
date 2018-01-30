/* ECG Beats per Minute by Laksman
 * Computer Engineering ITS
 * 
 * Arduino nano config:
 * LO- pin 10
 * LO+ pin 11
 * OUT pin A0
 * 
 */


int UpperThreshold = 520;
int LowerThreshold = 490;
int reading = 0;
float BPM = 0.0;
bool IgnoreReading = false;
bool FirstPulseDetected = false;
unsigned long FirstPulseTime = 0;
unsigned long SecondPulseTime = 0;
unsigned long PulseInterval = 0;
const unsigned long delayTime = 10;
const unsigned long delayTime2 = 1000;
unsigned long previousMillis = 0;
unsigned long previousMillis2 = 0;
int LED = 12;

void setup(){
  Serial.begin(9600);
  pinMode(A0, OUTPUT);
  pinMode(10, INPUT);
  pinMode(11, INPUT);
  digitalWrite(LED, LOW); //LED jika dibutuhkan
}

// Fungsi timer 1 sebagai waktu untuk mengambil heart rate dari sensor
int timer1(long delayTime, long currentMillis){
  if(currentMillis - previousMillis >= delayTime){
    previousMillis = currentMillis;
    return 1;
    }
  else{
    return 0;
    }
}

// Fungsi timer 2 sebagai waktu untuk mengupdate data ke serial monitor
int timer2(long delayTime2, long currentMillis){
  if(currentMillis - previousMillis2 >= delayTime2){
    previousMillis2 = currentMillis;return 1;
    }
  else{
    return 0;
    }
}

void loop(){

  // Mengambil waktu saat ini
  unsigned long currentMillis = millis();

  // Event pertama
  if(timer1(delayTime, currentMillis) == 1){

    reading = analogRead(0); 

    // Edge naik terdeteksi.
    if(reading > UpperThreshold && IgnoreReading == false){
      if(FirstPulseDetected == false){
        FirstPulseTime = millis();
        FirstPulseDetected = true;
      }
      else{
        SecondPulseTime = millis();
        PulseInterval = SecondPulseTime - FirstPulseTime;
        FirstPulseTime = SecondPulseTime;
      }
      IgnoreReading = true;
      digitalWrite(LED, HIGH);
    }

    // Edge turun terdeteksi.
    if(reading < LowerThreshold && IgnoreReading == true){
      IgnoreReading = false;
      digitalWrite(LED, LOW);
    }  

    // Perhitungan BPM
    BPM = (1.0/PulseInterval) * 60.0 * 1000;
  }

  // Event Kedua
  if(timer2(delayTime2, currentMillis) == 1){
    Serial.print(reading);
    Serial.print("\t");
    Serial.print(PulseInterval);
    Serial.print("\t");
    Serial.print(BPM);
    Serial.println(" BPM");
    Serial.flush();
  }
}
