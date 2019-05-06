<?php
session_start();
//randomname
// function generateRandomString($length = 10) {
//     return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
// }
//
// $randomFileName = $_POST['service'];
//--------------Initial variables to mimic the server------------
//Electricity
$oldReadingE=0;
$Q1=150;
$Q3=570;
$IQR=$Q3-$Q1;
$maxE=$IQR+$Q3;
$minE=$IQR-$Q1;
//Water
$oldReadingW=0;
$Q1=19;
$Q3=53;
$IQR=$Q3-$Q1;
$maxW=$IQR+$Q3;
$minW=$IQR-$Q1;
//NaturalGas
$oldReadingN=0;
$Q1=23;
$Q3=54;
$IQR=$Q3-$Q1;
$maxN=$IQR+$Q3;
$minN=$IQR-$Q1;
//--------------Getting and saving the image from the user------------------
if($_POST['service']=='electricity'){
    $fileName = $_POST['service'].".png";
}
else{
  $fileName="normal.png";
}
//Get the base-64 string from data
$filteredData=substr($_POST['data'], strpos($_POST['data'], ",")+1);
//Decode the string
$unencodedData=base64_decode($filteredData);
//Save the image
file_put_contents($fileName, $unencodedData);


//--------------LCD or traditional?-----------------------
if($fileName=='electricity.png'){
  //LCD
  $command = escapeshellcmd('python3.7 /var/www/html/pputest.tk/PPU/server/LCDdetection.py');
  $output = shell_exec($command);
  echo $output;

  $command2 = escapeshellcmd('python3.7 /var/www/html/pputest.tk/PPU/server/LCD_OCR.py');
  $output2 = shell_exec($command2);
  $reading=preg_replace('/\s+/', '', $output2);
  $reading=preg_replace("/^[a-zA-Z]+$/",'5',$reading);
  $usage=intval($reading)-$oldReadingE;
  if($usage<$minE){
    //Theif or faulty meter
    echo $msg = "Your Usage is too low: ".$usage;

  }
  elseif ($usage>$maxE) {
    // faulty meter or high usage
    echo $msg = "Your Usage is too high: ".$usage;
  }
  else{
    //success your reading is
    echo $msg = "Your Usage is: ".$usage;
  }
}
else{

  //traditional
  $scriptCommand = escapeshellcmd('python3.7 /var/www/html/pputest.tk/PPU/server/main.py');
  shell_exec($scriptCommand);
  //--------------OCR API-------------------------------------
  //------------Upload-------------------------
  $uploadCommand = escapeshellcmd('curl -H "Expect:" -F file=@/var/www/html/pputest.tk/PPU/server/mainOutput.jpg http://api.newocr.com/v1/upload?key=81c6b3a28fb450bd1bd8b4356923b37b');
  $output2 = shell_exec($uploadCommand);
  $result = json_decode($output2, true);
    //------------Recognize-------------------------
    $ch = curl_init('http://api.newocr.com/v1/ocr?key=81c6b3a28fb450bd1bd8b4356923b37b&file_id='.$result['data']['file_id'].'&page=1&lang=eng&psm=6');
   curl_setopt($ch, CURLOPT_HEADER, 0);
   $resultRecognize = curl_exec($ch);
   //{"status":"success","data":{"text":"2210 5 g |","progress":"100"}}bool(true)
   $reading= preg_replace('/\s+/', '', $resultRecognize['data']['text']);
   curl_close($ch);
   $reading=preg_replace("/^[a-zA-Z]+$/",'5',$reading);
   if($_POST['service']=='water'){
     $usage=intval($reading)-$oldReadingW;
     if($usage<$minW){
       //Theif or faulty meter
       echo $msg = "Your Usage is too low: ".$usage;
     }
     elseif ($usage>$maxW) {
       // faulty meter or high usage
       echo $msg = "Your Usage is too high: ".$usage;
     }
     else{
       //success your reading is
       echo $msg = "Your Usage is: ".$usage;
     }
   }
   else{
     $usage=intval($reading)-$oldReadingN;
     if($usage<$minN){
       //Theif or faulty meter
       echo $msg = "Your Usage is too low: ".$usage;
     }
     elseif ($usage>$maxN) {
       // faulty meter or high usage
       echo $msg = "Your Usage is too high: ".$usage;
     }
     else{
       //success your reading is
       echo $msg = "Your Usage is: ".$usage;
     }
   }


}
?>
