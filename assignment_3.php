<?php

/**
 * Problem Set #3
 * Name: Leutrim
 * Time: 5 hours
 */

class Caesar
{

    public function apply_shift($char, $key): string
    {
        $output = "";

        for ($i = 0; $i < strlen($char); $i++) {

            // handle capital letters and non-letter characters, but they'll remain capitalized in the output.
            if (ctype_upper($char[$i]))
                $output = $output.chr((ord($char[$i]) + $key - 65) % 27 + 65); 
                                                        // since the space is calculated
                                                        // we are using 27 letters on modulus operator.
            else
                $output = $output.chr((ord($char[$i]) + $key - 97) % 27 + 97);
            }

        return $output;
    }

}

$test = new Caesar();
var_dump($test->apply_shift('Star Labs!', 3));
