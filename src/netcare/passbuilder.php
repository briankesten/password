<?php
/**
 * Created by PhpStorm.
 * User: bk
 * Date: 10/21/2015
 * Time: 1:29 PM
 */

namespace Netcare;


class Passbuilder
{

    /**
     * Returns a string that contains the final password
     *
     * @param  array  $vocabpassarray  Array of word strings used for password
     * @param  string $specialcharacter Contains special character from form
     * @param  bool   $addnumericprefix Add a random number to the beginning of password
     * @param  bool   $capitlizefirstletter Capitalize the first letter of each word in the password
     * @return string $finalpassword The final password
     **/

    public function password_builder($vocabpassarray, $specialcharacter, $addnumericprefix,$addnumericsuffix,$capitlizefirstletter)
    {
    $finalpassword ="";
    $randomnumber = rand(0,9);

    //Check if password should be prefixed wtih a numbeer. If true add a rand number from 1-9
    if($addnumericprefix == 2)
        {
            $finalpassword .= $randomnumber;
        }

        //count the words in the VocabPass array
        $numitems = count($vocabpassarray);

        //loop through array
        for($i = 0; $i < $numitems ; ++$i) {

            if ($capitlizefirstletter == True)
            {
                $finalpassword .= ucfirst($vocabpassarray[$i]);
            }
            else
            {
                $finalpassword .= $vocabpassarray[$i];
            }
            if ($i < ($numitems - 1))
            {
                $finalpassword .= $specialcharacter;
            }
        }

        //add the number suffix to the password if true
        if($addnumericsuffix == True)
        {
            $finalpassword .= $randomnumber;
        }
       return $finalpassword;
    }

}

//example

/*
$words = array("duck", "mom", "tom", "henry", "stephen", "albert");
$prefix = TRUE;
$schar = "@";
$suffix = TRUE;
$cap = TRUE;

$pass = new Passbuilder();
$final = $pass->password_builder($words, $schar, $prefix, $suffix, $cap);

echo $final;

*/