<?php

    function clear() {
        popen('cls', 'w');
        print("\033[032mCleared...\n\033[0m");
    }

    function dumpToLog() {
        print("\033[032mWiP...\n\033[0m");
    }

    function pid() {
        $pid = getmypid();
        print("\033[032mPID: ".$pid."\n\033[0m");
    }