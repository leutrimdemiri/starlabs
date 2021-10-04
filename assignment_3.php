<?php

/**
 * Problem Set #3
 * Name: Leutrim
 * Time: 5 hours
 */

class Caesar
{
    public $shift;
    
    const alphabet = array(
    "lowercase" => array("a","b","c","d","e","f","g","h","i","j","k",
    "l","m","n","o","p","q","r","s","t","u","v","w","x","y","z"," "),
    
    "uppercase" => array("A","B","C","D","E","F","G","H","I","J","K",
    "L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"," ")
    );
    
    public function __construct($shift = 0) {
        $this->shift = $shift % 27;
    }
    
    public function encryptCipher($input): string
    {
        $result = str_split($input);
        for ($i = 0; $i < count($result); $i++) {
            for ($k = 0; $k < 27; $k++) {
            if ($result[$i] === Caesar::alphabet["lowercase"][$k]) {
                $result[$i] = Caesar::alphabet["lowercase"][($k + $this->shift) % 27];
                $k = 27;
            } elseif ($result[$i] === Caesar::alphabet["uppercase"][$k]) {
                $result[$i] = Caesar::alphabet["uppercase"][($k + $this->shift) % 27];
                $k = 27;
            }
          }
        }    

        $result  = implode($result);
        return $result;
    }
}

$output = new Caesar(3);
var_dump($output->encryptCipher("Star Labs!"));
