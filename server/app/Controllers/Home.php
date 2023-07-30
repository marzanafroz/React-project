<?php

namespace App\Controllers;


class Home extends BaseController
{
    public function index()
    {
        // return view('welcome_message');
        //echo "welcome";
        
        $article = [
            'title' => 'Welcome Message',
            'description' => 'Welcome Message description',
        ];
        return view("myhome",$article);
    }
    public function test(){
        return view("welcome_message");
    }
}
