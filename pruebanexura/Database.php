<?php

class Database {

    private static $host = "localhost";
    private static $db   = "pruebanexura";
    private static $user = "root";
    private static $pass = "";
    private static $charset = "utf8";

    public static function conectar() {

        try {
            $dsn = "mysql:host=" . self::$host . ";dbname=" . self::$db . ";charset=" . self::$charset;
            $conexion = new PDO($dsn, self::$user, self::$pass);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conexion;
        } catch (PDOException $e) {
            die("❌ Error de conexión: " . $e->getMessage());
        }
    }
}