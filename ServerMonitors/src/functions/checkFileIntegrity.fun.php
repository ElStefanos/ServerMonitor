<?php 

    function checkFileIntegrity() {
        $stamp = '[SERVER]['.strtoupper(date('D, d M Y H:i:s')).'] ';
        $stamp_error = '[ERROR]['.strtoupper(date('D, d M Y H:i:s')).'] ';
        $stamp_notification = '[NOTIFICATION]['.strtoupper(date('D, d M Y H:i:s')).'] ';
        printf("\033[34m".$stamp_notification."Starting file integrity check...\033[0m\n");

        if (file_exists(__CONFIG__.'ServerMonitor.xml')) {
            printf("\033[32m".$stamp."Found ServerMonitor.xml\033[0m\n");
        } else {
            printf("\033[31m No".$stamp_error."config file with name 'ServerMonitor.xml' found exiting...\033[0m\n");
            exit();
        }

        if (file_exists(__FUNCTIONS__.'config.fun.php')) {
            printf("\033[32m".$stamp."Found config.fun.php\033[0m\n");
            include __FUNCTIONS__.'config.fun.php';
            printf("\033[32m".$stamp."Loaded config.fun.php\033[0m\n");
        } else {
            printf("\033[31m".$stamp_error."Failed to load 'config.fun.php' exiting...\033[0m\n");
            exit();
        }

        if (file_exists(__FUNCTIONS__.'autoLoader.fun.php')) {
            printf("\033[32m".$stamp."Found autoLoader.fun.php\033[0m\n");
            include __FUNCTIONS__.'autoLoader.fun.php';
            printf("\033[32m".$stamp."Loaded autoLoader.fun.php\033[0m\n");
        } else {
            printf("\033[31m".$stamp_error."Failed to load 'autoLoader.fun.php' exiting...\033[0m\n");
            exit();
        }
        
        if (file_exists(__FUNCTIONS__.'startWebServer.fun.php')) {
            printf("\033[32m".$stamp."Found startWebServer.fun.php\033[0m\n");
        } else {
            printf("\033[31m".$stamp_error."Failed to find 'startWebServer.fun.php' exiting...\033[0m\n");
            exit();
        }

        if (file_exists(__FUNCTIONS__.'getStatus.fun.php')) {
            printf("\033[32m".$stamp."Found getStatus.fun.php\033[0m\n");
        } else {
            printf("\033[31m".$stamp_error."Failed to find 'getStatus.fun.php' exiting...\033[0m\n");
            exit();
        }

        if (file_exists(__FUNCTIONS__.'inputCliHandler.fun.php')) {
            printf("\033[32m".$stamp."Found inputCliHandler.fun.php\033[0m\n");
        } else {
            printf("\033[31m".$stamp_error."Failed to find 'inputCliHandler.fun.php' exiting...\033[0m\n");
            exit();
        } 
        
        if (extension_loaded('Parallel')) {
            printf("\033[32m".$stamp."Using parallel.\033[0m\n");
        } else {
            printf("\033[31m".$stamp_error."Please install Parallel extension...\033[0m\n");
            exit();
        }


    }