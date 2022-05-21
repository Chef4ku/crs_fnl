<?php

require_once "conexion.php";

class ModeloFormularios
{
    // INSERT
    static public function mdlRegistro($tabla, $datos)
    {

        $statement = Conexion::conectar()->prepare("INSERT INTO $tabla(email, username, password) VALUES (:email, :username, :password)");

        $statement->bindParam(":email", $datos["email"], PDO::PARAM_STR);
        $statement->bindParam(":username", $datos["username"], PDO::PARAM_STR);
        $statement->bindParam(":password", $datos["password"], PDO::PARAM_STR);

        if ($statement->execute()) {
            return "Ok";
        } else {
            print_r(Conexion::conectar()->errorInfo());
        }

        // cerrar conexion
        $statement->closeCursor();
        $statement = null;
    }

    static public function mdlCrearPost($tabla, $datos)
    {
        $statement = Conexion::conectar()->prepare("INSERT INTO $tabla(author, content) VALUES (:author, :content)");

        $statement->bindParam(":author", $datos["author"], PDO::PARAM_STR);
        $statement->bindParam(":content", $datos["content"], PDO::PARAM_STR);

        if ($statement->execute()) {
            return "Ok";
        } else {
            print_r(Conexion::conectar()->errorInfo());
        }
    }

    // SELECT
    static public function mdlSelectRegistro($tabla, $item, $valor)
    {
        if ($item == null && $valor == null) {
            $statement = Conexion::conectar()->prepare("SELECT *, DATE_FORMAT(date, '%d/%m/%Y') AS date FROM $tabla ORDER BY id DESC");
            $statement->execute();

            return $statement->fetchAll();
        } else {
            $statement = Conexion::conectar()->prepare("SELECT *,DATE_FORMAT(date, '%d/%m/%Y') AS date FROM $tabla WHERE $item = :$item ORDER BY id DESC");
            $statement->bindParam(":" . $item, $valor, PDO::PARAM_STR);
            $statement->execute();

            return $statement->fetch();
        }
    }

    static public function mdlSelectPosts ($tabla)
    {
        $statement = Conexion::conectar()->prepare("SELECT *, DATE_FORMAT(date, '%d/%m/%Y') AS date FROM $tabla ORDER BY id DESC");
        $statement->execute();
        return $statement->fetchAll();
    }

    // UPDATE
    static public function mdlActualizarRegistro($tabla, $datos)
    {
        $statement = Conexion::conectar()->prepare("UPDATE $tabla SET username=:username, email=:email, password=:password WHERE id = :id");

        $statement->bindParam(":username", $datos["username"], PDO::PARAM_STR);
        $statement->bindParam(":email", $datos["email"], PDO::PARAM_STR);
        $statement->bindParam(":password", $datos["password"], PDO::PARAM_STR);
        $statement->bindParam(":id", $datos["id"], PDO::PARAM_INT);

        if ($statement->execute()) {
            return "ok";
        } else {
            print_r(Conexion::conectar()->errorInfo());
        }

        $statement->closeCursor();
        $statement = null;
    }

    // DELETE
    static public function mdlEliminarRegistro($tabla, $valor)
    {
        $statement = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
        $statement->bindParam(":id", $valor, PDO::PARAM_INT);

        if ($statement->execute()) {
            return "ok";
        } else {
            print_r(Conexion::conectar()->errorInfo());
        }

        $statement->closeCursor();
        $statement = null;
    }
}
