<?php
    function startWebServer($config) {
        $stamp = '[NOTIFICATION]['.strtoupper(date('D, d M Y H:i:s')).'] ';
        $host = $config->webServerHost;
        $port = $config->webServerPort;
        $start = $config->startWebServer;
        if ($start == 'true') {
            print("\033[34m".$stamp."Starting web server ".$host.":".$port." \033[0m\n");
            exec("php -S ".$host.":".$port." -t ".__WWW__." \n");
        } else {
            exit();
        }
    }

    include_once __FUNCTIONS__.'config.fun.php';

    $config = LoadConfig(false);

    startWebServer($config);



