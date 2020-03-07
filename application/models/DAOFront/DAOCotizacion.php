<?php

    class DAOCotizacion  extends CI_Model{ 
    
        public function __construct()
        { 
                parent::__construct();
                //$this->load->model("DAOFront/DAOprincipal");
                date_default_timezone_set('America/Mexico_City'); 
        }
    
   
        var $sql;
        public function Execute($sql)
        {
            $data=$this->db->query($sql);
            $resultado=[];
            $resultado=$data->result_array();
            if($resultado[0]["respuesta"]!=0)
            {
                return $resultado[0]["respuesta"];
            }
            else
            {
                return 0;
            }
        }
        public function Retornar($sql)
        {
            //$this->sql="CALL SelectCategoria()";
                $data=$this->db->query($sql);
                $resultado=[]; 
                if($data!=null)
                {
                    $resultado=$data->result_array();
                }
                else
                {
                $resultado=null;   
                }
                return $resultado;
        }
        
        public function SelectEstadoWeb()
        {
            $this->sql="CALL `SelectEstadoWeb`();";
              return $this->Retornar($this->sql);
            
        }

        public function InsertCotizacionWeb($Nombre, $telefono,$correo,$estado,$empresa,$descripcion,$fecha,$medio,$servicio)
        {
            $this->sql="CALL InsertCotizacionWeb('".$Nombre."','".$telefono."','".$correo."','".$estado."','".$empresa."','".$descripcion."','".$fecha."','".$medio."','".$servicio."')";
            return $this->Retornar($this->sql);   
        }
    }
?>