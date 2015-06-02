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
            $stmt = $this->conexion->prepare('insert into usuarios(DNI,nombre,pass) VALUES (:dni,:nombre ,:pass)');
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

        $sql = $this->conexion->prepare('select * from usuarios where DNI = :dni');
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
}