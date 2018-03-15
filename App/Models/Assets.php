<?php

namespace App\Models;

use PDO;

/**
 * Example user model
 *
 * PHP version 7.0
 */
class Assets extends \Core\Model
{

    /**
     * Get all the users as an associative array
     *
     * @return array
     */
    public static function getAll()
    {
        $db = static::getDB();
        $stmt = $db->query('SELECT id, name, value, description FROM a_asset');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    /**
     * Add an asset
     *
     * @return array
     */
    public static function addAsset($data)
    {
        //echo"POST:<pre>".print_r($data,true);
        //exit;
        $db = static::getDB();
        $sql = 'INSERT INTO a_asset(name,value,description,updated) VALUES(:name,:value,:description,NOW())';
        $stmt = $db->prepare($sql); 
            $stmt->bindParam( ':name' , $data['name'] );
            $stmt->bindParam( ':value' , $data['value']  );
            $stmt->bindParam( ':description' , $data['description']  );
 
            $stmt->execute();
            //echo"LastInsertId:".$db->lastInsertId();
        return $db->lastInsertId();
    }    
        
    /**
     * Get an asset
     *
     * @return array
     */
    public static function getAsset($id)
    {
        $db = static::getDB();

        $stmt = $db->query("SELECT * FROM a_asset WHERE id = {$id}");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);        
    }    
    
}
