<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Base_controller extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->model("Logger");
        $module = $this->uri->segment(1);
        $function = $this->uri->segment(2);
        
        switch($module){
            case "access":
                
               break;
            default:
                
                break;
        }
        
       // $actions['access']['login']();
    }
    
    
}

?>