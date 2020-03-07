<?php 

class DAOLogin  extends CI_Model{


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
    public function login($correo, $contra){
        $this->db->where('correo', $correo);
        $this->db->where('pass', $contra);
        $q = $this->db->get('user');
        if($q-> num_rows()>0){
            return true;
        }else{
            return false;
        }
    }

    public function CrearToken($empresa,$categoria)
    {
        $this->sql="CALL verificarCategoriaEmpresaWeb('".$empresa."','".$categoria."')";
          return $this->Execute($this->sql);
    }






}?>