<?php

class Ebulksms
{
    private $url = "https://api.ebulksms.com/sendsms.json";
    private $username = 'nnelivictor1@gmail.com';
    private $apikey = '1182ff2a2bccc7228aa67ea33ff9b7039aa9520f';
    private $flash = 0;
    public $sendername = "Stanvic";
    public $messagetext;
    public $recipients;
    public $result;

    public function useJSON($url, $username, $apikey, $flash, $sendername, $messagetext, $recipients)
    {
        $gsm = array();
        $country_code = '234';
        $arr_recipient = explode(',', $recipients);
        foreach ($arr_recipient as $recipient) {
            $mobilenumber = trim($recipient);
            if (substr($mobilenumber, 0, 1) == '0') {
                $mobilenumber = $country_code . substr($mobilenumber, 1);
            } elseif (substr($mobilenumber, 0, 1) == '+') {
                $mobilenumber = substr($mobilenumber, 1);
            }
            $generated_id = uniqid('int_', false);
            $generated_id = substr($generated_id, 0, 30);
            $gsm['gsm'][] = array('msidn' => $mobilenumber, 'msgid' => $generated_id);
        }
        $message = array(
            'sender' => $sendername,
            'messagetext' => $messagetext,
            'flash' => "{$flash}",
        );

        $request = array('SMS' => array(
            'auth' => array(
                'username' => $username,
                'apikey' => $apikey
            ),
            'message' => $message,
            'recipients' => $gsm
        ));
        $json_data = json_encode($request);
        if ($json_data) {
            $response = $this->doPostRequest($url, $json_data, array('Content-Type: application/json'));
            $result = json_decode($response);
            return $result->response->status;
        } else {
            return false;
        }
    }


    //Function to connect to SMS sending server using HTTP POST
    private function doPostRequest($url, $arr_params, $headers = array('Content-Type: application/x-www-form-urlencoded'))
    {
        $response = array('code' => '', 'body' => '');
        $final_url_data = $arr_params;
        if (is_array($arr_params)) {
            $final_url_data = http_build_query($arr_params, '', '&');
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $final_url_data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_NOSIGNAL, 1);
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        try {
            $response['body'] = curl_exec($ch);
            $response['code'] = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            if ($response['code'] != '200') {
                throw new Exception("Problem reading data from $url");
            }
            curl_close($ch);
        } catch (Exception $e) {
            echo 'cURL error: ' . $e->getMessage();
        }
        return $response['body'];
    }

    public function sendSms($reg_name, $reg_phone, $reg_course, $recipient)
    {
        $messageText = "Someone just registered by name:" . $reg_name . ", phone:" . $reg_phone . ", course enrolled:" . $reg_course;
        $this->messagetext = substr($messageText, 0, 160); //Limit this message to one page.
        $this->recipients = $recipient;
        $this->result = $this->useJSON($this->url, $this->username, $this->apikey, $this->flash, $this->sendername, $this->messagetext, $this->recipients);
    }
}
