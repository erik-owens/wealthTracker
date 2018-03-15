<?php

namespace App\Controllers;

use \Core\View;
use App\Models\User;
use App\Models\Properties;

/**
 * Home controller
 *
 * PHP version 7.0
 */
class Property extends \Core\Controller {

    private $model;

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction() {
        //$stockPrice = $this->getStockPrice('m');
        //$zillowPrice = $this->getZillowPrice('', '');
        $data = Properties::getAll();
        $property_totals = \App\Models\Stats::getPropertyTotals();
        //View::renderTemplate('admin/property/index.php', ['data' => $data, 'stockPrice' => $stockPrice, 'zillowPrice' => $zillowPrice]);

        View::renderTemplate('admin/property/index.html', ['data' => $data, 'total_worth' => $property_totals, 'date_1' => date('M d, Y', strtotime("-4 week")), 'date_2' => date('M d, Y', strtotime("-2 week")), 'date_3' => date('M d, Y')]);
    }

    /**
     * Show the detail page
     *
     * @return void
     */
    public function detailAction() {
        $myStock = Properties::getProperty($_GET['id']);
        //$stockPrice = $this->getStockQuote($myStock[0]['symbol']);
        //echo"".print_r($myStock[0],true);
        View::renderTemplate('admin/property/detail.html', ['id' => $myStock[0]['id'], 'name' => $myStock[0]['name'], 'address' => $myStock[0]['address'], 'city' => $myStock[0]['city'], 'state' => $myStock[0]['state'], 'zip' => $myStock[0]['zip'], 'purchase_price' => $myStock[0]['purchase_price'], 'last_price' => $myStock[0]['last_price'], 'gain' => $myStock[0]['gain'], 'gain_percent' => $myStock[0]['gain_percent'], 'comments' => $myStock[0]['comments'], 'updated' => $myStock[0]['updated'], 'user' => $myStock[0]['user']]);

        //View::renderTemplate('admin/stock/detail.html');
    }

    /**
     * Show the index page
     *
     * @return void
     */
    public function addAction() {
        if (!$_POST) {
            View::renderTemplate('admin/property/add.html');
        } else {
            $lastId = Properties::addProperty($_POST);
            $myStock = Properties::getProperty($lastId);
            if ($zillowPrice = $this->getZillowPrice("{$myStock[0]['address']}", "{$myStock[0]['city']}, {$myStock[0]['state']} {$myStock[0]['zip']}")) {
                echo"ZillowQuote:<pre>" . $zillowPrice->response->results->result->zestimate->amount;
                $gain = ($zillowPrice->response->results->result->zestimate->amount - $_POST['purchase_price']);
                $gain_percent = (($gain / $_POST['purchase_price']) * 100);
                $result = Properties::updateProperty($lastId, $zillowPrice->response->results->result->zestimate->amount, $gain, $gain_percent);
            } else {
                
            }
            //echo"".print_r($stocks,true);
            //View::renderTemplate('admin/property/detail.html',['id' => $myStock[0]['id'],'name' => $myStock[0]['name'],'address' => $myStock[0]['address'],'city' => $myStock[0]['city'],'state' => $myStock[0]['state'],'zip' => $myStock[0]['zip'],'purchase_price' => $myStock[0]['purchase_price'],'last_price' => $myStock[0]['last_price'],'gain' => $myStock[0]['gain'],'gain_percent' => $myStock[0]['gain_percent'],'comments' => $myStock[0]['comments'],'updated' => $myStock[0]['updated'],'user' => $myStock[0]['user'] ]);
            header("Location: http://erik-owens-zce.bounceme.net:8888/property/detail?id={$myStock[0]['id']}", true, 301);
        }
    }

    public function getZillowPrice($address = '', $cityStateZip = '') {
        $zillow_id = 'xxxzillow-keyxxx'; //the zillow web service ID that you got from your email

        $search = $address;
        $citystate = $cityStateZip;
        $address = urlencode($search);
        $citystatezip = urlencode($citystate);

        $url = "http://www.zillow.com/webservice/GetSearchResults.htm?zws-id=$zillow_id&address=$address&citystatezip=$citystatezip";

        if ($result = file_get_contents($url)) {
            $data = simplexml_load_string($result);

            //echo"ZillowReauest:<pre>".print_r($data,true);
            //exit;



            include_once "org_netbeans_saas_zillow/ZillowRealEstateService.php";
            try {
                $zpid = "";

                $result = ZillowRealEstateService::getZestimate($zpid);
                echo $result->getResponseBody();
            } catch (Exception $e) {
                echo "Exception occured: " . $e;
            }












            return $data;
        } else {
            return false;
        }
    }

}
