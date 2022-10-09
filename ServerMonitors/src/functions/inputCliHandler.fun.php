<?php
sleep(5);
include_once __FUNCTIONS__.'config.fun.php';
include_once __CLI_FUNCTIONS__.'stop.fun.php';
include_once __CLI_FUNCTIONS__.'dumpSettings.fun.php';
include_once __CLI_FUNCTIONS__.'cli.fun.php';

function inputCliHandler() {
    $commands = array(
        'stop',
        'dumpSettings',
        'clear',
        'dumpToLog',
        'pid',
    );

    while (true) {
        $input = readline("Enter command: ");
        if (!empty($input)) {
            if (in_array($input, $commands) || $input == 'help') {
                if($input == 'help') {
                    foreach ($commands as $command) {
                        print("\033[032m".$command."\n\033[0m");
                    }
                } else {
                    $input();
                }
            } else {
                print($input." is not a valid command.\n");
            }
        }
    }
}

inputCliHandler();