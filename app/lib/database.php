<?php
namespace App\Lib;

use PDO;

class Database{
    public static function StartUp(){
        $pdo = new PDO('mysql:host=localhost;dbname=cheapcuu;charset=utf8', 'root', '');        
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       // $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);        
        return $pdo;
    }
    /**
     * 
     * @param type $restultSet
     * @return type1
     */
    public static function json_clean($array){
        $result=array();
        $resultSet=$array;
        foreach ($resultSet as $k => $v) {
            $cuenta=  (count($resultSet[$k])/2);
            $d=array();
            for($i=0;$i<$cuenta;$i++){
               $d[$i]=$v[$i];                       
            }
           $result[]=$d;
        }
        return $result ;
    }
}