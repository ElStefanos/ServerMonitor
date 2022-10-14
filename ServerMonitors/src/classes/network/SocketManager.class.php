<?php

    namespace network;

    class SocketManager {
        private int $socket;
        private string $ip;
        protected $return;

        public function __construct($config) {
            $this->socket = intval($config->nodePort);
            $this->ip = $config->nodeHost;
        }

        public function CreateSocket() {
            $stamp = '[IMPORTANT]['.strtoupper(date('D, d M Y H:i:s')).'] ';
            if (($sock = socket_create(AF_INET, SOCK_STREAM, getprotobyname('tcp'))) === false) {
                echo "\033[31m".$stamp."socket_create() failed: reason: " . socket_strerror(socket_last_error()) . "\n\033[0m";
            }
            
            if (socket_bind($sock, $this->ip, $this->socket) === false) {
                echo "\033[31m".$stamp."socket_bind() failed: reason: " . socket_strerror(socket_last_error($sock)) . "\n\033[0m";
            }
            
            if (socket_listen($sock, 5) === false) {
                echo "\033[31m".$stamp."socket_listen() failed: reason: " . socket_strerror(socket_last_error($sock)) . "\n\033[0m";
            } 

            return $sock;
        }
    }
    