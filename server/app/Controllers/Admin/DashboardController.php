<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use Idb\Idb;
class DashboardController extends BaseController
{
    public function index()
    {
        //composer dump-autoload
        // helper("currency");
        // echo convertAmountToWords(1010.10);
        // echo hi();
        // return view("admin/dashboard");
        // $obj = new Idb();
        // echo "<br>";
        // echo $obj->test1();
        return view("admin/dashboard");
    }
}
