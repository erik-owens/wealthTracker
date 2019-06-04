<?php

namespace App\Models;

use PDO;

/**
 * Example user model
 *
 * PHP version 7.0
 */
class Properties extends \Core\Model
{

    /**
     * Get all stocks as an associative array
     *
     * @return array
     */
    public static function getAll()
    {
        $db = static::getDB();
        $stmt = $db->query('SELECT * FROM a_property');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    /**
     * Get a stock
     *
     * @return array
     */
    public static function getProperty($id)
    {
        $db = static::getDB();
        $sql = ('SELECT * FROM a_property WHERE id = :id');
        $stmt = $db->prepare($sql); 
        $stmt->bindParam( ':id' , $id );   
        if($stmt->execute() == true){            
            return $stmt->fetchAll(PDO::FETCH_ASSOC); 
        } else {
            return false;
        }       
    }    
    
    
    /**
     * Add a stock
     *
     * @return array
     */
    public static function addProperty($data)
    {
        //echo"POST:<pre>".print_r($data,true);
        //exit;
        $db = static::getDB();
        $sql = 'INSERT INTO a_property(name,address,city,state,zip, purchase_price,comments) VALUES(:name,:address,:city,:state,:zip, :purchase_price, :comments)';
        $stmt = $db->prepare($sql); 
            $stmt->bindParam( ':name' , $data['name'] );
            $stmt->bindParam( ':address' , $data['address']  );
            $stmt->bindParam( ':city' , $data['city'] );
            $stmt->bindParam( ':state' , $data['state']  );
            $stmt->bindParam( ':zip' , $data['zip']  );  
            $stmt->bindParam( ':purchase_price' , $data['purchase_price']  );  
            $stmt->bindParam( ':comments' , $data['comments']  );  
            $stmt->execute();
            //echo"LastInsertId:".$db->lastInsertId();
        return $db->lastInsertId();
    }    
    
    /**
     * Update a stock
     *
     * @return array
     */
    public static function updateProperty($id, $last_price, $gain, $gain_percent)
    {
        $db = static::getDB();
        $sql = ('UPDATE a_property SET last_price = :last_price, gain = :gain, gain_percent = :gain_percent WHERE id = :id');
        $stmt = $db->prepare($sql); 
            $stmt->bindParam( ':last_price' , $last_price);
            $stmt->bindParam( ':gain' , $gain);
            $stmt->bindParam( ':gain_percent' , $gain_percent);
            $stmt->bindParam( ':id' , $id );   
        if($stmt->execute() == true){            
            return true;
        } else {
            return false;
        }
    }    
       
}
