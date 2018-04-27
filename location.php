<?php

function location($ip){
    
    //Array of IP addresses that will use the system
    $locations = array("::1" => "<LOCATION1>", 
    "::2" => "<LOCATION2>");

    //Loop through the addresses and see if any match the current address
    foreach($locations as $key => $value){
        if($key == $ip){
            return $value;
        }
    }
    return "Unknown Location";
    
}

?>