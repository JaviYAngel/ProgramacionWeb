<?php
/**
 * Created by PhpStorm.
 * User: angel
 * Date: 12/05/15
 * Time: 17:07
 */

class conexion {
    private $administrador;
    private $clientes;
    private $profesional;
    private $conexion;


    public function __construct(){
        $this->administrador = array();
        $this->clientes = array();
        $this->profesional = array();
        $this->usuario = array();
        $this->conexion = new PDO('mysql:host=localhost;dbname=76439462','ejercicio_pw','pass_ejercicio_pw');
        $this->conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    }

    /**
     * @return array
     */
    public function getClientes()
    {
        return $this->clientes;
    }

    /**
     * @param array $clientes
     */
    public function setClientes($clientes)
    {

        try {
            $stmt = $this->conexion->prepare('insert into usuarios(DNI,nombre,pass,tipo_usuario) VALUES (:dni,:nombre ,:pass,"cliente")');
            $rows = $stmt->execute(array(':nombre' => $clientes[1],
                ':pass' => $clientes[2], ':dni' => $clientes[0]));
            if ($rows > 0)
                echo 'Actualización correcta';
        }
        catch(PDOException $e)
        {
            echo 'Error: ' . $e->getMessage();
        }
    }

    /**
     * @return array
     */
    public function getProfesional()
    {
        return $this->profesional;
    }

    /**
     * @param array $profesional
     */
    public function setProfesional($profesional)
    {
        $this->profesional = $profesional;
    }

    public function getAdministrador(){
        self::set_names();
        $sql= "select * from usuarios, administrador where usuarios.DNI == administrador.DNI";
        foreach($this->conexion->query($sql) as $res){
            $this->administrador[]=$res;
        }
        $this->conexion=null;
        return $this->administrador;

    }

    public function set_names(){
        return $this->conexion->query("SET NAMES 'utf8'");
    }

    public function existeUsuario($dni){
        //$consulta = 'select nombre from usuarios where DNI = $dni';

        $sql = $this->conexion->prepare('select nombre,DNI,pass,tipo_usuario from usuarios where DNI = :dni');
        $user =  array();
        $sql->execute(array(':dni'=> $dni));
        //$resultado = $this->conexion->query($consulta);

        //foreach($resultado as $res){
        //   $user[]=$res;
        //}

        while($datos = $sql->fetch()){
            $user[]=$datos;
        }
        return $user;
    }
    public function updateUsuarios($usuarios){
        $stmt = $this->conexion->prepare('UPDATE usuarios SET nombre = :nombre WHERE usuarios.DNI= :dni');
        $rows = $stmt->execute(array(':nombre'  =>  $usuarios[1],':dni'  =>  $usuarios[0]));
    }

    public function selectUsuarios($tipo){
        //$sql=$this->conexion->query('Select DNI FROM usuarios WHERE tipo_usuario = $tipo ')
        $sql = $this->conexion->prepare('Select DNI FROM usuarios WHERE tipo_usuario = :tipo');

        $sql->execute(array(':tipo' => $tipo));
        while($datos = $sql->fetch()){
            $user[]=$datos;
        }
        //echo "por aqui";
        //print_r($user) ;
        return $user;
    }

    public  function eliminaUsuario($datos){

        $sql = $this->conexion->prepare('DELETE FROM usuarios WHERE DNI = :dni');
        $rows = $sql->execute( array( ':dni' => $datos));
    }

    public function addUsuario($dni,$nombre,$pass,$tipo){

        $sql = $this->conexion->prepare('INSERT  INTO usuarios (DNI,nombre,pass,tipo_usuario) VALUES (:dni, :nombre, :pass, :tipo_usuario)');
        //$sql = $this->conexion->prepare('UPDATE usuarios SET nombre=:nombre,pass=:pass, tipo_usuario=:tipo_usuario WHERE DNI=:dni');
        $rows = $sql->execute( array( ':dni' => $dni, ':nombre' => $nombre, ':pass' => $pass, ':tipo_usuario' => $tipo));
    }

    public function modificaUsuario($dni,$nombre,$pass,$tipo){
        $sql = $this->conexion->prepare('UPDATE usuarios SET nombre=:nombre,pass=:pass, tipo_usuario=:tipo_usuario WHERE DNI=:dni');
        $rows = $sql->execute( array( ':dni' => $dni, ':nombre' => $nombre, ':pass' => $pass, ':tipo_usuario' => $tipo));
    }

    public function addRecurso($cod,$nombre,$descripcion,$lugar,$horario,$dni){
        $sql = $this->conexion->prepare('INSERT  INTO recurso (COD,nombre,descripcion,lugar,horario_ini,DNIprofesional) VALUES (:COD, :nombre, :descripcion, :lugar,:horario,:dni)');
        $rows = $sql->execute( array( ':COD' => $cod, ':nombre' => $nombre, ':descripcion' => $descripcion, ':lugar' => $lugar,':horario'=>$horario,':dni'=>$dni));
    }

    public function modificaRecurso($cod,$nombre,$descripcion,$lugar,$horario,$dni){
        $sql = $this->conexion->prepare('UPDATE recurso SET nombre=:nombre,descripcion=:descripcion,lugar=:lugar,horario_ini=:horario,DNIprofesional=:dni WHERE COD=:COD');
        $rows = $sql->execute( array( ':COD' => $cod, ':nombre' => $nombre, ':descripcion' => $descripcion, ':lugar' => $lugar,':horario'=>$horario,':dni'=>$dni));
    }

    public function eliminaRecurso($datos){
        $sql = $this->conexion->prepare('DELETE FROM recurso WHERE COD = :cod');
        $rows = $sql->execute( array( ':cod' => $datos));
    }

    public function selectRecurso(){
        $sql = $this->conexion->query('Select nombre FROM recurso ');

        //$sql->execute(array(':cod' => $cod));
        while($datos = $sql->fetch()){
            $recurso[]=$datos;
        }
        //echo $recurso;
        return $recurso;
    }
    public function selectRecursoProfesional($data){

        $sql = $this->conexion->prepare('Select recurso.nombre from recurso WHERE  DNIprofesional = :dato');
        $sql->execute(array(':dato'=>$data));
        while($datos = $sql->fetch()){
            $recurso[]=$datos;
        }
        //echo $recurso;
        return $recurso;
    }

    public function selectUsuariosEnRecursos($DNI){
        $sql = $this->conexion->query('Select * from tiene,usuarios WHERE tiene.DNI=usuarios.DNI');

        //$sql->execute(array(':cod' => $cod));
        while($datos = $sql->fetch()){
            $recurso[]=$datos;
        }
        //echo $recurso;
        return $recurso;
    }


}