<?php


namespace threads;

    use \parallel\Runtime;

    class Threads {
        private int $id;
        private array $proceses;
        private string $process_id;

        public function __construct($threads, $return)
        {   
            $stamp = '[NOTIFICATION]['.strtoupper(date('D, d M Y H:i:s')).'] ';
            $this->proceses = array();

            foreach($threads as $job=>$file) {

                a:
                $this->id = rand(0 , 256);
    
                $this->process_id = "thread_".$this->id;
    
                if (in_array($this->process_id, $this->proceses)) {
                    goto a;
                } else {
                    $this->proceses[$this->process_id] = array($job => $file);

                    if($return == true) {
                        print("\033[34m".$stamp."Created ".$this->process_id." with job: ". $job."\033[0m\n");
                    }
                }
            }
        }


        public function startThreadTask() {
            $stamp = '[SERVER]['.strtoupper(date('D, d M Y H:i:s')).'] ';
            printf("\033[32m".$stamp." Starting threads..\033[0m\n");
            $future_id = 1;
            foreach ($this->proceses as $task => $job) {
                ${$task} = new Runtime();
                foreach ($job as $key => $value) {
                    $stamp = '[NOTIFICATION]['.strtoupper(date('D, d M Y H:i:s')).'] ';
                    
                    print("\033[34m".$stamp."Started ". $task .":".$key." with future future_".$future_id."\033[0m\n");
                    
                    $agv = array($value);
                    ${'future_'.$future_id} = ${$task}->run(function($path){
                        $stamp_error = '[ERROR]['.strtoupper(date('D, d M Y H:i:s')).'] ';

                        include 'directoryMap.php';
                        include __FUNCTIONS__.'autoLoader.fun.php';
                        
                        if (file_exists($path)) {
                            include_once $path;
                        } else {
                            print("\033[31m".$stamp_error."Could not start the thread... File does not exist in ". $path."\n Exiting thread... \n\033[0m");
                            exit();
                        }
                    },$agv);
                    $future_id++;
                }
            }
        }
    }


