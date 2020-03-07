<?php

class DAOempresa  extends CI_Model{
    
    
     public function __construct()
        {
                parent::__construct();
                // Your own constructor code
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

     public function SelectTipoEvento()
    {
        $this->sql="CALL SelectTipoEvento()";
          return $this->Retornar($this->sql);
        
    }
      public function SelectEstado()
    {
        $this->sql="CALL SelectEstado()";
          return $this->Retornar($this->sql);
    }
    public function InsertCotizar($nombre,$correo,$tel,$fecha,$mensaje,$dia,$lugar,$idEstado,$idMes,$anio,$idEmpresa,$idTipoEvento,$numInv)
    {
        $this->sql="CALL InsertCotizarWeb('".$nombre."','".$correo."','".$tel."','".$fecha."','".$mensaje."','".$dia."','".$lugar."','".$idEstado."','".$idMes."','".$anio."','".$idEmpresa."','".$idTipoEvento."','".$numInv."')";
        return $this->Retornar($this->sql);
    }
      public function SelectIdEmpWeb($empresa)
    {
        $this->sql="CALL SelectIdEmpWeb('".$empresa."')";
          return $this->Execute($this->sql);
    }
    public function verificarCategoriaEmpresaWeb($empresa,$categoria)
    {
        $this->sql="CALL verificarCategoriaEmpresaWeb('".$empresa."','".$categoria."')";
          return $this->Execute($this->sql);
    }
    
    public function selectVisitas()
    {
        $this->sql="CALL selectVisitas()";
          return $this->Execute($this->sql);
        
    }


       public function SelectDetalleProveedorWeb($idProv)
    {
        $this->sql="CALL SelectProveedorDetalleWeb('".$idProv."')";
      return $this->Retornar($this->sql);
        
    }
    
      public function SelectTelefonosProveedor($idProv)
    {
        $this->sql="CALL SelectProveedorTelefono('".$idProv."')";
     return $this->Retornar($this->sql);
        
    }
    
    public function SelectServiciosProveedor($idProv)
    {
        $this->sql="CALL SelectProveedorServicios('".$idProv."')";
       return $this->Retornar($this->sql);
        
    }
    
     public function SelectTodosDetallesProveedor($idProv)
    {
        $this->sql="CALL SelectProveedorTodosDetalles('".$idProv."')";
        return $this->Retornar($this->sql);
        
    }
    
     public function SelectCalificacionProveedor($idProv)
    {
        $this->sql="CALL SelectCalificacionProveedor('".$idProv."')";
       return $this->Retornar($this->sql);
        
    }
    
     public function RedesSocialesProveedor($idProv)
    {
        $this->sql="CALL SelectProveedorSocial('".$idProv."')";
        return $this->Retornar($this->sql);
        
    }
     public function SelectGaleriaProveedor($idProv)
    {
        $this->sql="CALL SelectProveedorGaleria('".$idProv."')";
      return $this->Retornar($this->sql);
    }
     public function SelectCapacidadProveedor($idProv,$idCat)
    {
        $this->sql="CALL SelectCapacidadProveedor('".$idProv."','".$idCat."')";
      return $this->Retornar($this->sql);
    }
   
    
    
    
     public function SelectComentarioProveedores($id,$NumRows,$NumCount)
    {
           
            $this->sql="CALL SelectComentariosProveedores('".$id."','".$NumRows."','".$NumCount."')";
        return $this->Retornar($this->sql);
           
           
           
           
      
        
    }
    
    
    
    

        

  
    


  
  
    
   
}



?>
