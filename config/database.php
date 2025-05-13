<?php
class Database {
    private static $host = "localhost";       //host
    private static $dbname = "bdfriendly";       //nombre de tu base
    private static $user = "root";            // Tu usuario de MySQL
    private static $pass = "";                // Tu contraseña
    private static $pdo = null;               //Aquí se guarda la instancia de PDO. Como es static, se puede usar sin crear objetos de la clase.

    public static function connect() {
        if (self::$pdo === null) {    //self sirve para acceder a propiedades o métodos estáticos dentro de la misma clase.  //:: se usa para acceder a miembros estáticos (propiedades o métodos).
            try {                     
                self::$pdo = new PDO(
                    "mysql:host=" . self::$host . ";dbname=" . self::$dbname . ";charset=utf8",
                    self::$user,
                    self::$pass
                );
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Error de conexión: " . $e->getMessage());
            }
        }
        return self::$pdo;
    }
}