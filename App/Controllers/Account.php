<?php

namespace App\Controllers;

use \Core\View;
use App\Models\User;
use App\Models\Accounts;
/**
 * Home controller
 *
 * PHP version 7.0
 */
class Account extends \Core\Controller
{
    private $model;
    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        //$stockPrice = $this->getStockPrice('m');
        //$zillowPrice = $this->getZillowPrice('', '');
        $data = Accounts::getAll();
        $accountTotals = \App\Models\Stats::getAccountTotals();
        //View::renderTemplate('admin/property/index.php', ['data' => $data, 'stockPrice' => $stockPrice, 'zillowPrice' => $zillowPrice]);
        View::renderTemplate('admin/account/index.html', ['data' => $data, 'stock_totals' => $accountTotals , 'total_worth' => $accountTotals, 'date_1' => date('M d, Y',strtotime("-4 week")), 'date_2' => date('M d, Y',strtotime("-2 week")), 'date_3' => date('M d, Y') ]);
    }

    /**
     * Show the detail page
     *
     * @return void
     */
    public function detailAction()
    {
            $data = Accounts::getAccount($_GET['id']);
 
            View::renderTemplate('admin/account/detail.html',['id' => $data[0]['id'],'name' => $data[0]['name'],'account_number' => $data[0]['account_number'],'type' => $data[0]['type'],'balance' => $data[0]['balance'] ]);
    }
        
    /**
     * Show the index page
     *
     * @return void
     */
    public function addAction()
    {
        if(!$_POST){
            View::renderTemplate('admin/account/add.html');
            
        } else {
            $lastId = Accounts::addAccount($_POST);
            $data = Accounts::getAccount($lastId);

            //View::renderTemplate('admin/account/detail.html',['id' => $data[0]['id'],'name' => $data[0]['name'],'account_number' => $data[0]['account_number'],'type' => $data[0]['type'],'balance' => $data[0]['balance'] ]);
            header("Location: http://erik-owens-zce.bounceme.net:8888/account/detail?id={$data[0]['id']}", true, 301);
        }
    }    
    
}
