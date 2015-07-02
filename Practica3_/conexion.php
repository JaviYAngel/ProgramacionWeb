<?php
/**
 * Created by PhpStorm.
 * User: angel
 * Date: 12/05/15
 * Time: 17:07
 *
 * Clase creada para la conexion de la base de datos y asi encapsular
 * las peticiones a la base de datos con la logica del programa
 * En resumen son funciones que nos dan los datos que necesitamos
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
     * devuelven los usuarios tipo clientes
     * @return array
     *
     */
    public function getClientes($cod)
    {
        $sql = $this->conexion->prepare('Select usuarios.DNI,nombre,prioridad from tiene,usuarios WHERE COD =:cod AND usuarios.DNI = tiene.DNI AND atendido=0');

        $sql->execute(array(':cod' => $cod));
        while($datos = $sql->fetch()){
            $recurso[]=$datos;
        }
        //echo $recurso;
        return $recurso;
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
//            if ($rows > 0)
//                echo 'Actualización correcta';
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

    public function getPrioridad($recurso,$dni){
        $sql = $this->conexion->query('Select prioridad from tiene WHERE COD = :recurso and DNI = :dni');

        $sql->execute(array(':recurso' => $recurso, ':dni '=>$dni));
        $datos = $sql->fetch();
        return $datos;
    }

    public function setPrioridad($prioridad,$recurso,$dni){
        $sql = $this->conexion->prepare('UPDATE tiene SET prioridad=:prioridad WHERE COD=:COD and DNI = :dni');
        $rows = $sql->execute( array( ':COD' => $recurso,':dni'=>$dni, ':prioridad'=>$prioridad));
    }

    public function getUsuariosenCola($dni){
        $sql  = $this->conexion->prepare('Select COD FROM recurso  where COD NOT IN ( SELECT COD from tiene WHERE DNI = :dni)');
        $sql->execute(array(':dni'=>$dni));
        while($datos = $sql->fetch()){
            $recurso[]=$datos;
        }
        return $recurso;
    }
    public function getUsuariosTiene($dni){
        $sql  = $this->conexion->prepare('SELECT recurso.nombre from tiene,recurso WHERE DNI = :dni AND tiene.COD=recurso.COD');
        $sql->execute(array(':dni'=>$dni));
        while($datos = $sql->fetch()){
            $recurso[]=$datos;
        }
        return $recurso;
    }

    public function unirseaCola($dni,$cod,$prioridad,$codcola){
        //$sql = $this->conexion->prepare('INSERT  INTO tiene (DNI,COD,prioridad,cod_cola) VALUES (:COD, :dni,:prioridad,:codcola)');
        $sql = $this->conexion->prepare('INSERT INTO tiene (DNI,COD,prioridad,cod_cola,atendido) VALUES (:dni,:COD,:prioridad,:codcola,0)');
        $rows = $sql->execute( array( ':COD' => $cod, ':dni'=>$dni,':prioridad'=>$prioridad,':codcola'=>$codcola));
    }

    public function getPrioridad2($cod){

        $sql  = $this->conexion->prepare(' select prioridad FROM tiene WHERE  COD=:cod ORDER BY prioridad DESC ');
        $sql->execute(array(':cod'=>$cod));
        $i=0;
        while($datos = $sql->fetch()){
            $recurso[]=$datos;
            $i++;
        }
        return $i;
    }
    public function getPrioridad3($dni,$cod){

        $sql  = $this->conexion->prepare(' select prioridad FROM tiene WHERE  COD=:cod AND DNI=:dni');
        $sql->execute(array(':cod'=>$cod,':dni'=>$dni));
        $datos = $sql->fetch();

        return $datos;
    }

    public function salirdeCola($dni,$cod){
        $sql  = $this->conexion->prepare('DELETE FROM tiene WHERE DNI =:dni  AND COD = :cod');
        $sql->execute(array(':cod'=>$cod,':dni'=>$dni));
    }

    public function visualizacion(){
        $sql=$this->conexion->query('Select cod_cola,lugar From tiene,recurso WHERE tiene.atendido=1 AND tiene.COD=recurso.COD ORDER BY prioridad ASC ');
        while($datos = $sql->fetch()){
            $recurso[]=$datos;
        }
        return $recurso;
    }

    public function atendido($dni,$cod){
        $sql=$this->conexion->prepare('Update tiene set atendido=1 where COD=:COD and DNI = :dni');
        $sql->execute(array(':COD'=>$cod,':dni'=>$dni));
    }

}