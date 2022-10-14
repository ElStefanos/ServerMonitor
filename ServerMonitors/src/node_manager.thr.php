<?php
    include_once __FUNCTIONS__.'config.fun.php';
    $config = LoadConfig(false);
    
    use \network\NodeManager;
    use \network\SocketManager;

    $socketManager = new SocketManager($config);

    $nodeManager = new NodeManager($socketManager->CreateSocket(), $config);

    $nodeManager->CheckLive();

?>