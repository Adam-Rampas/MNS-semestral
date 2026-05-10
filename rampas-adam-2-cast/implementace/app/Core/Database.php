<?php
/**
* Třída Database slouží k vytvoření a správě připojení k databázi pomocí PDO.
* Implementuje vzor Singleton, aby zajistila, že v celé aplikaci bude existovat pouze jedno připojení k databázi.
* Poskytuje statickou metodu getConnection(), která vrací instanci PDO pro komunikaci s databází.
*/
class Database
{
    static ?PDO $connection = null;

    /**
    * Vrací instanci PDO pro připojení k databázi. Pokud připojení ještě neexistuje, vytvoří nové.
    *
    * @return PDO Instance PDO pro komunikaci s databází.
    */
    public static function getConnection(): PDO
    {
        if (self::$connection === null){
            try{
                self::$connection = new PDO('mysql:host=127.0.0.1;dbname=sport_results;charset=utf8mb4', 'root', '');
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e){
                die("Chyba pri pripojeni k databazi: " . $e->getMessage());
            }
        }

        return self::$connection;

    }
}