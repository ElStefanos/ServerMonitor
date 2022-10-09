<?php
    sleep(2);
    include __FUNCTIONS__.'config.fun.php';

    $config = LoadConfig(false);

    $interval = (int) $config->serviceStatusInterval;
    
    $notifyOnChange = $config->serviceStatusNotifyOnChangeOnly;
    
    function GetStatus($interval, $notifyOnChange, $list) {
        $stamp = '[IMPORTANT]['.strtoupper(date('D, d M Y H:i:s')).'] ';
        while (true) {

            foreach ($list as $host) {

                $hostname = $host['host'];
                $port = $host['port'];
                $last = $host['last'];

                if($socket =@ fsockopen($hostname, $port, $errno, $errstr, 1)) {
                    $current = 'up';
                fclose($socket);
                } else {
                    $current = 'down';
                }
            
                if ($notifyOnChange == 'true') {
                    if($current != $last) {
                        echo "\033[31m".$stamp."Service change detected: ".$hostname.":".$port." is ".$current."\n\033[0m";
                    }
                } else {
                    echo "\033[31m".$stamp.$hostname.":".$port." is ".$current."\n\033[0m";
                }
                $list[$host['name']]['last'] = $current;
            }
            sleep($interval);
        }
    }


    function PrintServices($list) {
        foreach ($list as $name) {
            print_r($name);
    }}

    $jellyfin = array('name' => 'Jellyfin', 'host' => '127.0.0.1', 'port' => '9620', 'last' => null);
    $appache = array('name' => 'appache', 'host' => '192.168.1.24', 'port' => '80', 'last' => null);
    $nas = array('name' => 'FreeNas', 'host' => '192.168.1.86', 'port' => '80',  'last' => null);
    $list = array($jellyfin['name'] => $jellyfin, $appache['name'] => $appache, $nas['name'] => $nas);
    
    GetStatus($interval, $notifyOnChange, $list);