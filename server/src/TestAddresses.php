<?php

namespace Hackathon\Livefeed;

class TestAddresses {

    private $addr = null;


    public function __construct() {
      $this->addr =  self::getShitLoadOfAddresses();
    }


  private static function getShitLoadOfAddresses() {

        $ch = curl_init(); 

        // set url 
        curl_setopt($ch, CURLOPT_URL, "https://dawa.aws.dk/adresser?q=h*gade&struktur=mini"); 

        //return the transfer as a string 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

        // $output contains the output string 
        $output = json_decode(curl_exec($ch)); 

        // close curl resource to free up system resources 
        curl_close($ch);  
        return $output;    

    }

    public function getRandomAddress() {
       return $this->addr[array_rand($this->addr)];
    }

}
