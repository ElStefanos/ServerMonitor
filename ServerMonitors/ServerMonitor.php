<?php
    include_once 'logo.ascii';

    $stamp_notification = '[NOTIFICATION]['.strtoupper(date('D, d M Y H:i:s')).'] ';
    $stamp_error = '[ERROR]['.strtoupper(date('D, d M Y H:i:s')).'] ';
    $stamp_server = '[SERVER]['.strtoupper(date('D, d M Y H:i:s')).'] ';
    $stamp_important = '[IMPORTANT]['.strtoupper(date('D, d M Y H:i:s')).'] ';
    $stamp_info = '[INFO]['.strtoupper(date('D, d M Y H:i:s')).'] ';
    $pid = getmypid();
    echo "\n\n\033[33mStarted ServerMonitor 1.0-alpha PID: ".$pid."\n".exec('php -v')."\nPHP Version: v". PHP_VERSION."\033[0m\n";
    
    sleep(1);
    if (!file_exists(dirname(__FILE__).DIRECTORY_SEPARATOR.'directoryMap.php')) {
        printf("\n\033[31m".$stamp_error."Failed to load 'directoryMap.php' exiting...\033[0m\n");
        exit();
    } else {
        include_once 'directoryMap.php';
        echo __CONFIG__;
        printf("\033[32m".$stamp_server."Loaded directoryMap.php\033[0m\n");
    }

    
    if (!file_exists(__FUNCTIONS__.'checkFileIntegrity.fun.php')) {
        printf("\033[31m".$stamp_error."Failed to load 'checkFileIntegrity.fun.php' exiting...\033[0m\n");
        exit();
    }

    include_once __FUNCTIONS__.'checkFileIntegrity.fun.php';

    printf("\033[32m".$stamp_server."Loaded checkFileIntegrity.php\033[0m\n");

    
    checkFileIntegrity();

    $tasks = array(
        "nodeManager" => __SRC__.'node_manager.thr.php',
        "startWebServer" => __FUNCTIONS__."startWebServer.fun.php",
        "inputCliHandler" => __FUNCTIONS__."inputCliHandler.fun.php",
        "getStatus" => __FUNCTIONS__."getStatus.fun.php",
    );

    $threads = new threads\Threads($tasks, true);

    $threads->startThreadTask();
    
    
    


  