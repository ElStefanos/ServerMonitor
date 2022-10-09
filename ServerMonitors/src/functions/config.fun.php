<?php

    function LoadConfig($echo) {
        $stamp = '[NOTIFICATION]['.strtoupper(date('D, d M Y H:i:s')).'] ';
        $stamp_info = '[INFO]['.strtoupper(date('D, d M Y H:i:s')).'] ';
        if($echo == true) {
            print("\033[34m".$stamp."Loading config file...\033[0m\n");
        }

        $xml=simplexml_load_file(__CONFIG__."/ServerMonitor.xml") or die("Error: Cannot create object");
        
        //Output loaded settings
        if($echo == true) {
            foreach($xml as $setting => $value) {
                print("\033[33m".$stamp_info.$setting." is set to: ". $value."\n\033[0m");
            }
        }
        return $xml;
    }