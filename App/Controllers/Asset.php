<?php

namespace App\Controllers;

use \Core\View;
use App\Models\User;
use App\Models\Assets;
/**
 * Home controller
 *
 * PHP version 7.0
 */
class Asset extends \Core\Controller
{
    private $model;
    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        $data = Assets::getAll();

        View::renderTemplate('admin/asset/index.html', ['data' => $data]);
    }

    /**
     * Show the detail page
     *
     * @return void
     */
    public function detailAction()
    {
            $myStock = Assets::getAsset($_GET['id']);
            //$stockPrice = $this->getStockQuote($myStock[0]['symbol']);
            //echo"".print_r($myStock[0],true);
            View::renderTemplate('admin/asset/detail.html',['id' => $myStock[0]['id'],'name' => $myStock[0]['name'],'description' => $myStock[0]['description'],'value' => $myStock[0]['value'] ]);
        
            //View::renderTemplate('admin/stock/detail.html');
    }
        
    /**
     * Show the index page
     *
     * @return void
     */
    public function addAction()
    {
        if(!$_POST){
            View::renderTemplate('admin/asset/add.html');
            
        } else {
            $lastId = Assets::addAsset($_POST);
            $data = Assets::getAsset($lastId);
            
            
  
            //echo"".print_r($stocks,true);
            //View::renderTemplate('admin/asset/detail.html',['id' => $data[0]['id'],'name' => $data[0]['name'],'value' => $data[0]['value'],'description' => $data[0]['description'] ]);
            header("Location: http://eriko-wealthhub.ddns.net:8888/asset/detail?id={$data[0]['id']}", true, 301);
        }
    }    
    
}
