<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class BackController extends CI_Controller {
    
     public function __construct()
        { 
                parent::__construct();
                $this->load->model("DAOBack/DAOBlog");
                date_default_timezone_set('America/Mexico_City'); 
        }
    
    public function index(){
            $data["url"] = $this->urlBack();
            if(!$this->session->userdata('email')){
                header("location:/OficialBlockCodes/Login");
               }
            $this-> load-> view("BackEnd/Inicio", $data);
    }
    public function Login(){
        $data["url"] = $this->url();
        $this-> load-> view("LoginDark", $data);
    }
    private function urlBack(){
        $url="http://localhost:8080/OficialBlockCodes/recursosBack/";
        return $url;
    } 

    private function url(){
        $url="http://localhost:8080/OficialBlockCodes/";
        return $url;
    } 
    public function Blog(){
        $data["url"] = $this->urlBack();
        if(!$this->session->userdata('email')){
            header("location:/OficialBlockCodes/Login");
           }
        $this-> load-> view("BackEnd/Form_blog", $data);
}   
   
}
?>