<?php

namespace App\Controllers;

use App\Models\ProductModel;

class Benchmark extends BaseController
{
    public function index(){
        echo "hi";
    }
    public function test1()
    {
        $model = model(ProductModel::class);

        $benchmark = \Config\Services::timer();
        $benchmark->start('product_insert_query');
        
        for ($i=0; $i < 1 ; $i++) { 
            $r= rand(1,10000);
        $arr = [
            'category_id'=>"1",
            'subcategory_id'=>"1",
            'sku'=>$r.time().rand(1,6000),
            'name'=> "test product".$r,
            'description'=> "test product description ".$r,
            'price'=> "1".$r,
            'price2'=> "2".$r,            
            'quantity'=> $r,
            'discount'=> rand(1,20),
            'hot'=>0
        ];
        $model->insert($arr);
        }
        $benchmark->stop('product_insert_query');
        $timers = $benchmark->getTimers();
        dd($timers);
        
        // echo $model->getInsertID(); 
        
    }
    public function test2(){
        $model = model(ProductModel::class);
        $benchmark = \Config\Services::timer();
        $benchmark->start('test_loop_query');
        //loop
        $t=0;
        for ($i=0; $i < 2000 ; $i++) { 
            $t += $i; 
        }
        $benchmark->stop('test_loop_query');
            //CURL
        $benchmark->start('empty_line_query');
        //class method
        $benchmark->stop('empty_line_query');

        $timers = $benchmark->getTimers();
        dd($timers);

    }
}
