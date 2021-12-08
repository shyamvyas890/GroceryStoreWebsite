<?php
    class HttpResponse {
        public $status = false;
        public $data;
        function __construct($status, $data){
            $this->status=$status; // true on success and false on failure
            $this->data= $data; // message we send to the client
        }
    }



?>
