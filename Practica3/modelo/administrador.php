<?php
/**
 * Created by PhpStorm.
 * User: angel
 * Date: 12/05/15
 * Time: 17:08
 */

class administrador {
    private $DB;
    private $administradores;

    public function __construct(){
        $this->administradores = array();
        $this->DB = new PDO('mysql:host=localhost;dbname=76439462','ejercicio_pw','pass_ejercicio_pw');
    }

    public function setNames(){

    }

}