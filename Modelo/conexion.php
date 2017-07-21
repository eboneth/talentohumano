<?php

include_once 'encriptacion.php';

class Conexion {

    private $server;
    private $user;
    private $pw;
    private $database;
    public $conexion;

    
    public function __construct() {
        $this->server = "50.62.209.47";
        $this->user = "rafaboneth";
        $this->pw = "Ab123456Ab*";
        $this->database = "rafaboneth";
    }
    
    //funcion que realiza la conexion
    public function conectar() {
        $this->conexion = new mysqli($this->server, $this->user, $this->pw, $this->database);

        if ($this->conexion->connect_errno) {
            die("No se pudo realizar la conexion: (" . $this->conexion->connect_errno . ")");
        }
    }

    //funcion que cierra la conexion
    public function cerrar() {
        $this->conexion->close();
    }

    public function solicitud() {

        $rs = $this->conexion->query("SELECT * FROM tipoSolicitud;");

        while ($mostrar = mysqli_fetch_assoc($rs)) {
            echo '<option value="' . $mostrar['idtipoSolicitud'] . '">' . $mostrar['descripcion'] . '</option>';
        }
    }
    
    public function tipoVinculacion() {

        $rs = $this->conexion->query("SELECT * FROM vinculacion;;");

        while ($mostrar = mysqli_fetch_assoc($rs)) {
            echo '<option value="' . $mostrar['idvinculacion'] . '">' . $mostrar['descripcion'] . '</option>';
        }
    }

    public function buscarTrabajadores($identificacion) {
        
        $sql = "SELECT idempleados as id, vinculacion.descripcion as tvinculacion,cedula as cedula, empleados.nombres as nombre, empleados.apellidos as apellido, empleados.direccion as direccion, empleados.telefono as telefono, email as correo 
        from vinculacion
        inner join empleados on(vinculacion.idvinculacion=empleados.fk_idvinculacion)
        where empleados.cedula='$identificacion'";
        
        $rs = $this->conexion->query($sql);

        if (isset($rs)) {
            if (mysqli_num_rows($rs) > 0) {
               
                $datos = mysqli_fetch_object($rs);

                return $datos;
            } else {

                return new stdClass();
            }
        } else {

            return new stdClass();
        }
        
       
    }
    
    public function insertarSolicitud($id, $fecha, $estado, $tp_sol, $det_sol, $mot_sol, $otros, $observaciones){
        $exito = null;
    $sql="	insert into solicitudes (fk_idempleados,fk_idtipoSolicitud,fecha,estadosolicitud,motivo,observaciones) values('$id','$tp_sol','$fecha','$estado','$mot_sol','$observaciones');";
        $rs = $this->conexion->query($sql);
        
        if($rs){
                
            $idRetornado = mysqli_insert_id($this->conexion);
                foreach($det_sol as $val){
                    
                    $aux = $this->conexion->query("insert into solicitudes_has_detalleSolicitud (fk_idsolicitudes,fk_iddetalleSolicitud,otros)
                    values('$idRetornado','$val','$otros');");
                    
                }
                
            $exito = true;
        }else{
            
            $exito=null;
        }
        
        
        return $exito;
    }
    
    public function registrarEmpleado($id,$contrasena, $nombre, $apellido, $fechaNac, $telefono, $direccion, $email, $estado, $vinculacion){
        $resultado = null;
        
        $reg = "INSERT INTO empleados values(NULL,$id,'$nombre', '$apellido','$fechaNac','$direccion','$telefono','$contrasena','$email',$vinculacion)";
        $rs = $this->conexion->query($reg);
        
        if($rs){
            $idEmp = mysqli_insert_id($this->conexion);
            $this->conexion->query("insert into rol_has_empleados values(3,$idEmp,$estado)");
            $resultado = true;
        }else{
            $resultado = null;
        }
        
        return $resultado;
    }
    
    public function loguearse($user, $pw, $rol){
        
         $clave = "GodIsReign";//contraseña para desencriptar
        
//yaa XD
        
        $consulta = "SELECT idempleados, cedula, nombres, contrasena, idrol 
                    FROM empleados, rol, rol_has_empleados 
                    WHERE cedula='$user' AND fk_idempleados=idempleados AND idrol=fk_idrol AND idrol='$rol';"
                    
        $rs = $this->conexion->query($consulta);
        
        if (isset($rs)) {
            if (mysqli_num_rows($rs) > 0) {
               
                $datos = mysqli_fetch_object($rs);
                $nueva = new Encriptar();
                $desencriptada = $nueva ->desencriptar_AES($datos->contrasena,$clave);
                
                if($desencriptada == $pw){
                    return $datos;
                }else{
                    return new stdClass();
                }
            } else {

                return new stdClass();
            }
        } else {

            return new stdClass();
        }
    }
    
    public function mostrarNoticias(){
        $contN=0;
        $sql = "SELECT idnoticias, fecha, titulo, noticia FROM noticias WHERE estadonoticia=1";
        $rs = $this->conexion->query($sql);
        
        if(mysqli_num_rows($rs) > 0){
            while($mostrar = mysqli_fetch_array($rs)){
                $contN++;
                echo '<tr>';
                echo '<td>'.$contN.'</td>';
                echo '<input type="hidden" class="oculto" value="'.$mostrar[0].'"/>';
                echo '<td>'.$mostrar[1].'</td>';
                echo '<td>'.$mostrar[2].'</td>';
                echo '<td>'.$mostrar[3].'</td>';
                //echo '<td ><span class="glyphicon glyphicon-edit" editaNoticia></span></td>';
                echo '<td ><span class="glyphicon glyphicon-remove borrarNoticia"></span></td>';
                echo '</tr>';
            }
        }else{
            echo '<td colspan="6"> No existen registros de noticias</td>';
        }
    }
    
    public function mostrarEventos(){
        $contE=0;
        $sql2 = "SELECT ideventos, fecha, hora, titulo, lugar FROM eventos where estadoevento=1";
        
        $rs2 = $this->conexion->query($sql2);
        if(mysqli_num_rows($rs2) > 0){
            while($mostrar2 = mysqli_fetch_array($rs2)){
                $contE++;
                echo '<tr>';
                echo '<td>'.$contE.'</td>';
                echo '<input type="hidden" class="oculto" value="'.$mostrar2[0].'"/>';
                echo '<td>'.$mostrar2[1].'</td>';
                echo '<td>'.$mostrar2[2].'</td>';
                echo '<td>'.$mostrar2[3].'</td>';
                echo '<td>'.$mostrar2[4].'</td>';
                //echo '<td ><span class="glyphicon glyphicon-edit" editaNoticia></span></td>';
                echo '<td ><span class="glyphicon glyphicon-remove borraEvento"></span></td>';
                echo '</tr>';
            }
        }else{
            echo '<td colspan="6"> No existen registros de eventos</td>';
        }
    }
    
    public function pEventos(){
        $sql = "SELECT fecha, hora, titulo, lugar FROM eventos where estadoevento=1";
        
        $rs2 = $this->conexion->query($sql);
        if(mysqli_num_rows($rs2) > 0){
            while($mostrar2 = mysqli_fetch_array($rs2)){
                
                
                echo '<div class="list-group">';
                echo '<div class="list-group-item">';
                echo '<h4 class="list-group-item-heading">'.$mostrar2[2].'</h4>';
                echo '<p class="list-group-item-text">'.$mostrar2[3].'</p>';
                echo '<p class="list-group-item-text"> Publicado el '.$mostrar2[0].' a las '.$mostrar2[1].'</p>';
                echo '</div>';
                echo '</div>';
            }
        }else{
            echo '<td colspan="6"> No existen registros de eventos</td>';
        }
    }
    

    
    public function registrarNoticias($fecha,$titulo,$noticia,$idUser){
         $resultado = null;
         
        $reg = "INSERT INTO noticias VALUES(NULL,'$fecha','$titulo','$noticia',$idUser,1)";
        $rs = $this->conexion->query($reg);
        
        if($rs){
            $resultado = true;
        }else{
            $resultado = null;
        }
        
        return $resultado;
    }
    
    
    public function registraEvento($dia,$hora,$evento,$lugar,$idUser){
         $resultado = null;
         
        $reg = "insert into eventos values(NULL,'$dia','$hora','$evento','$lugar',$idUser, 1)";
        $rs = $this->conexion->query($reg);
        
        if($rs){
            $resultado = true;
        }else{
            $resultado = null;
        }
        
        return $resultado;
    }
    
    public function eliminarNoticia($id){
        $resultado = null; 
        $sql = "UPDATE noticias SET estadonoticia=0 WHERE idnoticias='$id'";
        
        $rs = $this->conexion->query($sql);
        
        if($rs){
            $resultado = true;
        }else{
            $resultado = null;
        }
        return $resultado;
    }

    public function eliminarEvento($id){
        $resultado = null; 
        $sql = "update eventos set estadoevento=0 where ideventos = $id";
        
        $rs = $this->conexion->query($sql);
        
        if($rs){
            $resultado = true;
        }else{
            $resultado = null;
        }
        return $resultado;
    }
    
    //HAY Q MEJORAR ESTO-------! 
    //Pues Claro XD
    //creo q si
    
    public function mostrarSolicitudes(){
        $cont = 1;
        $query = " select empleados.idempleados as idempleado, empleados.cedula as cedula, empleados.nombres as nombres, empleados.apellidos as apellidos 
    from empleados 
    inner join solicitudes on (empleados.idempleados = solicitudes.fk_idempleados)
    group by cedula;";
        
        $rs = $this->conexion->query($query);
        
        if(mysqli_num_rows($rs) > 0){
        
            while($mostrar = mysqli_fetch_array($rs)){
                echo '<tr>';
                echo '<td><input type="hidden" value="'.$mostrar[0].'"></td>';
                echo '<td>'.$cont.'</td>';
                echo '<td>'.$mostrar[1].'</td>';
                echo '<td>'.$mostrar[2].'</td>';
                echo '<td>'.$mostrar[3].'</td>';
                
              
                echo '<td><button type="button" class="btn btn-success" id="btnRegistrar">Actualizar</button>
                            <button type="button" class="btn btn-danger verTipos" >Ver</button></td>';
                echo '</tr>';
                $cont++;
            }
        }else{
                echo '<tr><td colspan="9">No hay solicitudes pendientes por realizar</td></tr>';
        }
        
    }

}
?>

