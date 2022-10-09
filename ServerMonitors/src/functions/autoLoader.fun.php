<?php
    spl_autoload_register(function ($class_name) {
        $stamp = '[SERVER]['.strtoupper(date('D, d M Y H:i:s')).'] ';
        $file =  __CLASSES__.$class_name . '.class.php';
        if (file_exists($file)) {
            include_once $file;
            print_r("\033[32m".$stamp."Class ".$class_name." loaded \033[0m\n");
            return true;
        } else {
            return false;
            $stamp = '[ERROR]['.strtoupper(date('D, d M Y H:i:s')).'] ';
            print_r("\033[33m".$stamp."Class: ".$class_name." was not found. exiting.... \033[0m\n");
            exit();
        }
    });
?>