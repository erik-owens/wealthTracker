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
class Statistics extends \Core\Controller
{
    private $model;
    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {

       $data = Stats::getAll();
       //echo"<pre>".print_r($data,true);
        View::renderTemplate('admin/stats/index.html', ['data' => $data, 'stocks' => $data['stocks'], 'accounts' => $data['accounts'], 'property' => $data['property'], 'assets' => $data['assets'], 'corporate' => $data['corporate'], 'total_worth' => $data['total_worth'], 'date_1' => date('m/d/Y',strtotime("-4 week")), 'date_2' => strtotime("-2 week"), 'date_3' => date('m/d/Y') ]);
    }
    
   /**
     * Show daily totals
     *
     * @return void
     */
    public function dailyTotalGraphAction()
    {

       $data = Stats::getAll();
       //echo"".print_r($data,true);
        //View::renderTemplate('admin/index.html', ['data' => $data, 'stocks' => $data['stocks'], 'accounts' => $data['accounts'], 'property' => $data['property'], 'assets' => $data['assets'], 'corporate' => $data['corporate'], 'total_worth' => $data['total_worth'] ]);
              echo"{\"data\":[{
          ['Year', 'Wealth'],
          ['12/27/2017',  0],
          ['',  0],
          ['',  0],
          ['',  0],          
          ['',  0],
          ['',  0],
          ['',  0],
          ['',  0],
          ['',  0],
          ['',  0],  
          ['',  0],
          ['',  0],
          ['',  0],          
          ['',  0],
          ['',  0],
          ['',  0],
          ['',  0],
          ['',  0],
          ['',  0],           
          ['01/16/2018',  0],
          ['',  0],
          ['',  0],
          ['',  0],          
          ['',  0],
          ['',  0],
          ['',  0],
          ['',  0],
          ['',  0],
          ['',  0], 
          ['',  0],
          ['',  0],
          ['',  0],          
          ['',  0],
          ['',  0],
          ['',  0],
          ['',  0],
          ['',  0],
          ['',  0],           
          ['01/27/2018',  2300000]
           }]";
    }    
    
   /**
     * Show daily stock totals
     *
     * @return void
     */
    public function dailyTotalStockGraphAction()
    {

       $data = Stats::getAll();
       echo"".print_r($data,true);
        //View::renderTemplate('admin/index.html', ['data' => $data, 'stocks' => $data['stocks'], 'accounts' => $data['accounts'], 'property' => $data['property'], 'assets' => $data['assets'], 'corporate' => $data['corporate'], 'total_worth' => $data['total_worth'] ]);
    }    
        
   /**
     * Show daily property totals graph
     *
     * @return void
     */
    public function dailyTotalPropertyGraphAction()
    {

       $data = Stats::getAll();
       //echo"".print_r($data,true);
        //View::renderTemplate('admin/index.html', ['data' => $data, 'stocks' => $data['stocks'], 'accounts' => $data['accounts'], 'property' => $data['property'], 'assets' => $data['assets'], 'corporate' => $data['corporate'], 'total_worth' => $data['total_worth'] ]);

       
    }        
    
}