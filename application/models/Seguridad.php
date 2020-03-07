<?php

class Seguridad   extends CI_Model{


     public function __construct()
        {
                parent::__construct();
                // Your own constructor code
        }


        var $keyToken ="aghqguewgewlgkjbkbfclasgdkjhfd877667t42igbjnasdijhgdas867t387q2tyqiuye8723r4iurhkjfnvnbkmaifjwhgasjdasuy655412i3o4e409048s87tyaygshahggxc5416rwtyHAjhasgd687wyasdfdkghasdf872oiajkcbbnhziqyh12389475oyhlijlasknvcbbmnshuygd62uhbqt1623495iuyhsd685ykgjhs572rgjgdgvdhgguyf5wgf87878tg";
  var $consulta;

        private function sing($mensaje)
          {

                 $hash = hash_hmac('sha256', $mensaje, $this->keyToken);
                 return $hash;

            }

    private function encodeString64($cadena)
  {
    $signature = base64_encode($cadena);
     return $signature;

 }
  private function decodeString64($cadena)
  {
    $signature = base64_decode($cadena);
    return $signature;

 }




        public function CrearToken($correo,$contrasenia)
           {


               $payload=$this->CrearTokenConsulta($correo,$contrasenia);
           return $this->GenerarToken($payload);


         }

 private function CrearTokenConsulta($correo,$contrasenia)
{

   $this->consulta=" CALL CrearToken('".$correo."','".$contrasenia."')";


      $query=$this->db->query($this->consulta);
    $dato=$query->result_array();
  return $dato;
}

private function GenerarToken($payload)
  {


      if(count($payload)>0)
      {

          $header = array(
         "alg" => "con un codificador e.e",
         "typ" => "JWT",

          );;
           $header=json_encode($header);
          $payload=json_encode($payload);
        $sing=$this->sing($header.".".$payload);
       $token=$this->encodeString64($header).".".$this->encodeString64($payload).".".$sing;
      }
      else
      {
             $token=null;
      }

      $respuesta["data"]=$token;
      if($token!=null)
             {
                 $respuesta["token"]=true;
             }
             else{
                  $respuesta["token"]=false;
             }

        $respuesta["refreshToken"]=false;

     return  $respuesta;
  }

  public function RefreshToken ($token)
{

    $payload=null;

        if($this->validarToken($token))
        {
          $idUsuario=$this->obtenerIdusuario($token);
         $refreshToken=$this->obtenerRefresh($token);


                        if($idUsuario!=null and $refreshToken!=null)
                        {


                   $this->consulta="CALL SelectUsuarioRefresh(".$refreshToken.",".$idUsuario.")";



                          $query=$this->db->query($this->consulta);
                            $payload=$query->result_array();

                          }
        }


        return $this->GenerarToken($payload);



}

public function obtenerRefresh($token)
  {
        $token = str_replace("\"", "", $token);
      $split=preg_split("/[.]/",$token);
       $payload =  $split[1];
      $dato=$this->decodeString64($payload);
      $decode=json_decode($dato,true);

      $refresh=null;
      if(array_key_exists ('refresh',$decode[0]))
      {

           $refresh=$decode[0]["refresh"];
           return json_encode($refresh);

      }
      else
      {

         return null;
      }

      return null;
  }

public function validarToken($token)
   {
 try {
       $token = str_replace("\"", "", $token);

       $split=preg_split("/[.]/",$token);
       $header = $split[0];
       $payload =  $split[1];
       $signature = $split[2];

       $sing=$this->sing($this->decodeString64($header).".".$this->decodeString64($payload));

       if (strcmp($sing , $signature )!==0)
       {


           return false;

       }
       else
       {

           return true;


       }
      } catch (Exception $e) {

          return false;
   }


   }

   public function validarFechaToken($token)
  {
      date_default_timezone_set('America/Mexico_City');
      $split=preg_split("/[.]/",$token);
       $payload =  $split[1];
      $dato=$this->decodeString64($payload);
      $decode=json_decode($dato,true);

      $exp=$decode[0]["exp"];
      $iat  = date ('Y-m-d H:i:s');
       $exp  = date_create( $exp);

      $exp=date_format($exp, 'Y-m-d H:i:s');


     if($iat<$exp)
     {
         return true;
     }
      else
      {
            return false;
      }


  }

  public function RespuestaTokenValidacion($respuestaValidacion)
{


   $respuesta["data"]=null;
        if($respuestaValidacion==2)
        {
    $respuesta["token"]=true;
   $respuesta["refreshToken"]=true;
        }
        else
        {
   $respuesta["token"]=false;
   $respuesta["refreshToken"]=false;
        }


    }



  public function verificarToken($token)
{

  $token = str_replace("\"", "", $token);

    if($this->validarToken($token))
    {
        if($this->validarFechaToken($token))
        {
            return 1;
        }
        else
        {
            return 2;
        }
    }
    else
    {
        return 3;
    }
}

  public function obtenerIdusuario($token)
  {
        $token = str_replace("\"", "", $token);
      $split=preg_split("/[.]/",$token);
       $payload =  $split[1];
      $dato=$this->decodeString64($payload);
      $decode=json_decode($dato,true);

      $idUsuario=null;
      if(array_key_exists ('idUsuario',$decode[0]))
      {

           $idUsuario=$decode[0]["idUsuario"];
           return json_encode($idUsuario);

      }
      else
      {

         return null;
      }

      return null;
  }





}



?>
