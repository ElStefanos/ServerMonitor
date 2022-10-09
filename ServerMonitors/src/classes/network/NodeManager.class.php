<?php


    namespace network;

    class NodeManager {
        private int $socket;
        private array $ip;
        private string $nodetype;
        private int $interval;
        private string $change;
        private string $nodename;

        public function __construct($return,$config) {
            $this->socket = $return;
            $this->ip = array();
            $this->nodetype = $config->nodeMaster;
            $this->interval = intval($config->nodeSendLiveMessageInterval);
            $this->change = $config->nodeNotifyOnNodeChangeOnly;
            $this->nodename = $config->nodeName; 

            $stamp_info = '[INFO]['.strtoupper(date('D, d M Y H:i:s')).'] ';

            $xml = simplexml_load_file(__CONFIG__."/HostList.xml") or die("Error: Cannot create object");
            function xml2array ( $xmlObject, $out = array () )
            {
                foreach ( (array) $xmlObject as $index => $node ) {
                    $out[$index] = ( is_object ( $node ) ) ? xml2array ( $node ) : $node;
                }
            
                return $out;
            }

            $xml = xml2array($xml);

            foreach ($xml as $key => $value) {
                $this->ip[$key] = $value;
                print("\033[35;1m".$stamp_info."Added ".strtoupper($key)." to the list IP: ".$value."\033[0m\n");
            }
        }

        public function CheckLive() {
            if ($this->change == "false") {
                
            }
        }
    }
    