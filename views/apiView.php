<?php
class apiView{


    public function response($data, $status) {
        header("Content-Type: application/json");
        header("HTTP/1.1 " . $status . " " . $this->_requestStatus($status));
        echo json_encode($data);
    }

    private function _requestStatus($code){
        $status = array(
        200 => "Okey",
        404 => "Not found",
        500 => "Internal Server Error Crash"
        );
        return (isset($status[$code]))? $status[$code] : $status[500];
    }
    
}