<?php 

    function stop() {
        print("Stopping the server....\n");
        $pid = getmypid();
        system('TASKKILL /f /pid '.$pid);
    }