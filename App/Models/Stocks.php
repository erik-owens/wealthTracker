<?php

namespace App\Models;

use PDO;

/**
 * Example user model
 *
 * PHP version 7.0
 */
class Stocks extends \Core\Model
{

    /**
     * Get all stocks as an associative array
     *
     * @return array
     */
    public static function getAll()
    {
        $db = static::getDB();
        $stmt = $db->query('SELECT DISTINCT symbol, name, purchase_price, last_price, shares, id, value FROM a_stock GROUP BY symbol');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    /**
     * Get a stock
     *
     * @return array
     */
    public static function getStock(int $id)
    {
        $db = static::getDB();
        $sql = ('SELECT * FROM a_stock WHERE id = :id');
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
    public static function addStock(array $data)
    {
        //echo"POST:<pre>".print_r($data,true);
        //exit;
        $db = static::getDB();
        $sql = 'INSERT INTO a_stock(symbol,name,type,shares,purchase_price,comments) VALUES(:symbol,:name,:type,:shares,:purchase_price,:comments)';
        $stmt = $db->prepare($sql); 
            $stmt->bindParam( ':symbol' , $data['symbol']);
            $stmt->bindParam( ':name' , $data['name'] );
            $stmt->bindParam( ':type' , $data['type']  );
            $stmt->bindParam( ':shares' , $data['shares'] );
            $stmt->bindParam( ':purchase_price' , $data['purchase_price']  );
            $stmt->bindParam( ':comments' , $data['comment']  );         
            $stmt->execute();
            //echo"LastInsertId:".$db->lastInsertId();
        return $db->lastInsertId();
    }    
    
    /**
     * Update a stock
     *
     * @return array
     */
    public static function updateStock(int $id, float $last_price, float $gain, float $gain_percent, float $value)
    {
        $db = static::getDB();
        $sql = ('UPDATE a_stock SET last_price = :last_price, gain = :gain, gain_percent = :gain_percent, value = :value WHERE id = :id');
        $stmt = $db->prepare($sql); 
            $stmt->bindParam( ':last_price' , $last_price);
            $stmt->bindParam( ':gain' , $gain);
            $stmt->bindParam( ':gain_percent' , $gain_percent);
            $stmt->bindParam( ':value' , $value);
            $stmt->bindParam( ':id' , $id );   
        if($stmt->execute() == true){            
            return true;
        } else {
            return false;
        }
    }    
       

}
