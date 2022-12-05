<?php
class Dao
{
    public static function getPDO()
    {
        try {
            $pdo = new PDO("mysql:host=localhost;dbname=gestion_des_stocks","root","");
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    public static function insererClient(Type $var = null)
    {
        
    }
}
