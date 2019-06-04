<?php

namespace App\Models;

use PDO;

/**
 * Example user model
 *
 * PHP version 7.0
 */
class Accounts extends \Core\Model
{

    /**
     * Get all the accounts as an associative array
     *
     * @return array
     */
    public static function getAll()
    {
        $db = static::getDB();
        $stmt = $db->query('SELECT * FROM a_account');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    /**
     * Get an account
     *
     * @return array
     */
    public static function getAccount($id)
    {
        $db = static::getDB();
        $sql = ('SELECT * FROM a_account WHERE id = :id');
        $stmt = $db->prepare($sql); 
        $stmt->bindParam( ':id' , $id );   
        if($stmt->execute() == true){            
            return $stmt->fetchAll(PDO::FETCH_ASSOC); 
        } else {
            return false;
        }    
    }    
    
    
    /**
     * Add an account
     *
     * @return array
     */
    public static function addAccount($data)
    {
        //echo"POST:<pre>".print_r($data,true);
        //exit;
        $db = static::getDB();
        $sql = 'INSERT INTO a_account(account_number,name,type,balance, updated) VALUES(:account_number,:name,:type,:balance,NOW())';
        $stmt = $db->prepare($sql); 
            $stmt->bindParam( ':account_number' , $data['account_number']);
            $stmt->bindParam( ':name' , $data['name'] );
            $stmt->bindParam( ':type' , $data['type']  );
            $stmt->bindParam( ':balance' , $data['balance'] );       
            $stmt->execute();
            //echo"LastInsertId:".$db->lastInsertId();
        return $db->lastInsertId();
    }    
    
    /**
     * Update an account
     *
     * @return array
     */
    public static function updateAccount($id, $last_price, $gain, $gain_percent, $value)
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
