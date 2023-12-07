<?php
    class usuarioModel{
        private $PDO;
        public function __construct()
        {
            require_once("C:/xampp/htdocs/Registro-control-informaci-n/config/ConectionBD.php");
            $con = new db();
            $this->PDO = $con->conexion();
        }
        public function insertar($nombre,$email,$telefono,$sexo,$cita){
            $stament = $this->PDO->prepare("INSERT INTO usuario VALUES(null,:nombre,:email,:telefono,:sexo,:cita)");
            $stament->bindParam(":nombre",$nombre);
            $stament->bindParam(":email",$email);
            $stament->bindParam(":telefono",$telefono);
            $stament->bindParam(":sexo",$sexo);
            $stament->bindParam(":cita",$cita);
            return ($stament->execute()) ? $this->PDO->lastInsertId() : false ;

        }
        public function index(){
            $stament = $this->PDO->prepare("SELECT * FROM usuario");
            return ($stament->execute()) ? $stament->fetchAll() : false;
        }

        public function show($id){
            $stament = $this->PDO->prepare("SELECT * FROM  where id = :id limit 1");
            $stament->bindParam(":id",$id);
            return ($stament->execute()) ? $stament->fetch() : false ;
        }

        public function update($id,$nombre){
            $stament = $this->PDO->prepare("UPDATE usuario SET nombre = :nombre WHERE id = :id");
            $stament->bindParam(":nombre",$nombre);
            $stament->bindParam(":id",$id);
            return ($stament->execute()) ? $id : false;
        }

        public function delete($id){
            $stament = $this->PDO->prepare("DELETE FROM usuario WHERE id = :id");
            $stament->bindParam(":id",$id);
            return ($stament->execute()) ? true : false;
        }
    }

?>