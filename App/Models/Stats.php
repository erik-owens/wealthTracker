<?php

namespace App\Models;

use PDO;

/**
 * Example user model
 *
 * PHP version 7.0
 */
class Stats extends \Core\Model
{

    /**
     * Get all the users as an associative array
     *
     * @return array
     */
    public static function getAll()
    {
        $results['stocks']    = Stats::getStockTotals();
        $results['accounts'] = Stats::getAccountTotals();
        $results['assets']    = Stats::getAssetTotals();
        $results['property']  = Stats::getpropertyTotals();
        $results['corporate']  = Stats::getCorprateTotals();
        $total = array_sum($results);
        $results['total_worth'] = $total;
        return $results;
    }
    
        
    /**
     * Get stock totals
     *
     * @return array
     */
    public static function getStockTotals()
    {
        $db = static::getDB();
        $stmt = $db->query("SELECT sum(value) as total FROM a_stock");
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data[0]['total'];
    }    
    
    /**
     * Get property totals
     *
     * @return array
     */
    public static function getPropertyTotals()
    {
        $db = static::getDB();
        $stmt = $db->query("SELECT sum(last_price) as total  FROM a_property");
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data[0]['total'];
    }        
    
    /**
     * Get account totals
     *
     * @return array
     */
    public static function getAccountTotals()
    {
        $db = static::getDB();
        $stmt = $db->query("SELECT sum(balance) as total  FROM a_account");
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data[0]['total'];
    }            
    
    
    /**
     * Get asset totals
     *
     * @return array
     */
    public static function getAssetTotals()
    {
        $db = static::getDB();
        $stmt = $db->query("SELECT sum(value) as total FROM a_asset");
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data[0]['total'];
    }               
    
    /**
     * Get corprate totals
     *
     * @return array
     */
    public static function getCorprateTotals()
    {
        $db = static::getDB();
        $stmt = $db->query("SELECT sum(value) as total FROM a_corprate");
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //return $data[0]['total'];
        return '0.00';
    }               
        
}
