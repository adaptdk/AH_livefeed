<?php

namespace Hackathon\Livefeed;

class TestAddresses {

    public $addr;

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

    public static function getRandomAddress() {
        if (!$addr) $addr = self::getShitLoadOfAddresses();
//        var_dump($addr);
        return $addr[array_rand($addr)];
    }

}
