<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class BlockCodes extends CI_Controller {
    
     public function __construct()
        { 
                parent::__construct();
                //$this->load->model("DAOFront/DAOprincipal");
                $this-> load ->model('DAOFront/DAOCotizacion');
                $this-> load ->model('DAOBack/DAOLogin');
                date_default_timezone_set('America/Mexico_City'); 
        }

        public function index(){
                $data["info"] = $this->url();
                $this-> load-> view("Home", $data);
        }
        private function base(){
                $url="http://localhost:8080/OficialBlockCodes/";
                return $url;
        } 
        private function url(){
                $url="http://localhost:8080/OficialBlockCodes/recursos/";
                return $url;
        } 
        private function urlBack(){
                $url="http://localhost:8080/OficialBlockCodes/recursosBack/";
                return $url;
        } 
        
        public function Cotizacion(){
                $base = $this->base();
                $info = $this->url();
               $url= $this->urlBack();
                $result = $this->db->get('estado');
                $data = array('dao'=>$result,'info'=>$info,'url'=>$url,'base'=>$base);
                $this-> load-> view("Cotizacion", $data);    
        }      
        public function view_portafolio(){
                $base = $this->base();
                $info = $this->url();
               $url= $this->urlBack();
                $result = $this->db->get('estado');
                $data = array('dao'=>$result,'info'=>$info,'url'=>$url,'base'=>$base);
                $this-> load-> view("portaflio_view", $data);    
        }   
        public function Login(){
                $dataB["url"] = $this->urlBack();
                if($this->session->userdata('email')){
                        header("location:/OficialBlockCodes/Admin");
                       }
                $this-> load-> view("Login", $dataB);
                if(isset($_POST['password'])){
                        
                        if($this->DAOLogin->login($_POST['email'],$_POST['password'])){
                                $this-> session->set_userdata('email',$_POST['password']);
                                header("location:/OficialBlockCodes/Admin");
                        }else{
                                header("location:/OficialBlockCodes/Login");
                        }
                        

                }
        } 
        public function logout(){
                $this->session->sess_destroy();
                header("location:/OficialBlockCodes/Login");
        } 


        public function set_cotizacion(){
                  $data = [];
                if($this->input->post()){
                    $Nombre = $_POST['nombre'];
                    $Telefono = $_POST['telefono'];
                    $idEstado = $_POST['estado'];
                    $correo=$_POST['correo'];
                    $fecha = date('Y-m-d');
                    $empresa =$_POST['empresa'];
                    $Descripcion =$_POST['descripcion'];
                    $medio =$_POST['medio'];    
                    if(isset($_POST['servicio1'])| $_POST['servicio1']!=""){
                        $data[] = "Página Web";    
                    }
                    if(isset($_POST['servicio2'])| $_POST['servicio2']!=""){
                        $data[] ="Aplicación móvil";    
                    }
                    if(isset($_POST['servicio3'])| $_POST['servicio3']!=""){
                        $data[] ="Animación 2D Motion Graphic";    
                    }
                    if(isset($_POST['servicio4'])| $_POST['servicio4']!=""){
                        $data[]="Fotografía y vídeo";    
                    }
                    if(isset($_POST['servicio5'])| $_POST['servicio5']!=""){
                        $data[] ="Diseño Gráfico";    
                    }
                  
                    $servicio = implode(",",$data);
                    
                    $this-> load ->model('DAOFront/DAOCotizacion');
                $respuesta = $this->DAOCotizacion->InsertCotizacionWeb($Nombre,$Telefono,$correo,$idEstado,$empresa,$Descripcion,$fecha,$medio,$servicio);
                    
                      return $respuesta;
                }
        }



}
