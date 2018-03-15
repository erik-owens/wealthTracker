<?php

namespace App\Controllers;

use \Core\View;
use App\Models\User;
use App\Models\Stocks;
/**
 * Home controller
 *
 * PHP version 7.0
 */
class Stock extends \Core\Controller
{
    private $model;
    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        $data = Stocks::getAll();
        $stockTotals = \App\Models\Stats::getStockTotals();
        
        //echo"Stocks:<pre>".print_r($data);
        //View::renderTemplate('admin/stock/index.php', ['data' => $data, 'stockPrice' => $stockPrice, 'zillowPrice' => $zillowPrice]);
        View::renderTemplate('admin/stock/index.html',['data'=>$data, 'stock_totals' => $stockTotals , 'total_worth' => $stockTotals, 'date_1' => date('M d, Y',strtotime("-4 week")), 'date_2' => date('M d, Y',strtotime("-2 week")), 'date_3' => date('M d, Y')]);
    }
    
    /**
     * Show the detail page
     *
     * @return void
     */
    public function detailAction()
    {
            $myStock = Stocks::getStock($_GET['id']);
            //$stockPrice = $this->getStockQuote($myStock[0]['symbol']);
            //echo"".print_r($myStock[0],true);
            View::renderTemplate('admin/stock/detail.html',['value' => $myStock[0]['value'], 'id' => $myStock[0]['id'],'name' => $myStock[0]['name'],'symbol' => $myStock[0]['symbol'],'exchange' => $myStock[0]['exchange'],'type' => $myStock[0]['type'],'shares' => $myStock[0]['shares'],'purchase_price' => $myStock[0]['purchase_price'],'last_price' => $myStock[0]['last_price'],'gain' => $myStock[0]['gain'],'gain_percent' => $myStock[0]['gain_percent'],'comments' => $myStock[0]['comments'],'updated' => $myStock[0]['updated'],'user' => $myStock[0]['user'] ]);
        
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
            View::renderTemplate('admin/stock/add2.html');
            
        } else {
            $lastStockId = Stocks::addStock($_POST);
            //$myStock = Stocks::getStock($lastStockId);
            //$stockData = $this->getStockQuote($_POST['symbol']);
            $stocks = json_decode($this->getStockQuote($_POST['symbol']));
            
            $gain = ($stocks->LastPrice - $_POST['purchase_price']);
            $gain_percent = (($gain / $_POST['purchase_price']) * 100);
            $value = ($stocks->LastPrice * $_POST['shares']);
            
            $result = Stocks::updateStock($lastStockId, $stocks->LastPrice, $gain, $gain_percent, $value);
            $myStock = Stocks::getStock($lastStockId);
            //echo"".print_r($stocks,true);
            //View::renderTemplate('admin/stock/detail.html',['value' => $value, 'id' => $myStock[0]['id'],'name' => $myStock[0]['name'],'symbol' => $myStock[0]['symbol'],'exchange' => $myStock[0]['exchange'],'type' => $myStock[0]['type'],'shares' => $myStock[0]['shares'],'purchase_price' => $myStock[0]['purchase_price'],'last_price' => $myStock[0]['last_price'],'gain' => $myStock[0]['gain'],'gain_percent' => $myStock[0]['gain_percent'],'comments' => $myStock[0]['comments'],'updated' => $myStock[0]['updated'],'user' => $myStock[0]['user'] ]);
            header("Location: http://erik-owens-zce.bounceme.net:8888/stock/detail?id={$myStock[0]['id']}", true, 301);
        }
        

        //View::renderTemplate('admin/stock/index.php', ['data' => $data, 'stockPrice' => $stockPrice, 'zillowPrice' => $zillowPrice]);
    }    
    
    public function getStockQuote($symbol){
        $url = "http://dev.markitondemand.com/MODApis/Api/v2/Quote/json?symbol={$symbol}";

        //open connection
        $ch = curl_init();

        //set the url, number of POST vars, POST data
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //curl_setopt($ch,CURLOPT_POST,count($_POST));
        //curl_setopt($ch,CURLOPT_POSTFIELDS,$fields_string);

        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
    
        public function getZillowPrice($address='', $cityStateZip=''){
        $url = "http://www.zillow.com/webservice/GetDeepSearchResults.htm";

        $packet['zws_id'] = "X1-ZWz19d0xl24k5n_6a5jo";
        $packet['address']       = '747 Hillsboro Way';
        $packet['citystatezip']  = 'Escondido, Ca 92069';


        //open connection
        $ch = curl_init();

        //set the url, number of POST vars, POST data
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //curl_setopt($ch,CURLOPT_POST,count($_POST));
        //curl_setopt($ch,CURLOPT_POSTFIELDS,$fields_string);

        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
    
}
