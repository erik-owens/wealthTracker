<?php

namespace App\Controllers;

use \Core\View;
use App\Models\User;
use App\Models\Stocks;
use App\Models\Stats;
/**
 * Home controller
 *
 * PHP version 7.0
 */
class Home extends \Core\Controller
{
    private $model;
    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        ////$stockPrice = $this->getStockPrice('m');
        //$zillowPrice = $this->getZillowPrice('', '');
        $data = Stats::getAll();
        //echo"<pre>".print_r($data,true);
        View::renderTemplate('admin/index.html', ['data' => $data, 'stocks' => $data['stocks'], 'accounts' => $data['accounts'], 'property' => $data['property'], 'assets' => $data['assets'], 'corporate' => $data['corporate'], 'total_worth' => $data['total_worth'], 'date_1' => date('M d, Y',strtotime("-4 week")), 'date_2' => date('M d, Y',strtotime("-2 week")), 'date_3' => date('M d, Y') ]);
    }
    
    public function getStockPrice($symbol){
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

        $packet['zws_id'] = "xxxx";
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
