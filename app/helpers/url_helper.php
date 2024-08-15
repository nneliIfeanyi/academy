<?php
// Simple page redirect
function redirect($page)
{
  header('location: ' . URLROOT . '/' . $page);
}


function fast_send_sms($phone_number, $course)
{

  $phone_number = ltrim($phone_number, '\0');
  $email = "stanvicbest@gmail.com";
  $password = "824NXJ46mYhmSY$";
  $message = "Congratulations you have successfully enrolled for " . $course . " with STANVIC CODING ACADEMY. Kindly note that you are expected to report at the venue on Monday 19th Aug, by 10AM. Best regards!";
  $sender_name = "Stanvic";
  $recipients = '234' . $phone_number;

  $forcednd = "1";
  $data = array("email" => $email, "password" => $password, "message" => $message, "sender_name" => $sender_name, "recipients" => $recipients, "forcednd" => $forcednd);
  $data_string = json_encode($data);
  $ch = curl_init('https://app.multitexter.com/v2/app/sms');
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
  curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Content-Length: ' . strlen($data_string)));
  $result = curl_exec($ch);
  $res_array = json_decode($result);
  //print_r($res_array);

}
