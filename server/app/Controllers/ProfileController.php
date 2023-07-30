<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ProfileController extends BaseController
{
    protected $db;
    
    public function __construct()
    {        
        $this->db = \Config\Database::connect();
        
        
    }
    public function index()
    {
        $session = session();
        // echo $session->get('user_id');
        $profile = $this->db
        ->table('profiles')
        ->where('user_id', $session->get('user_id'))
        ->get()->getResultArray();
        // dd($profile);
        // if($profile){
        //     echo "ha";
        // }
        // else{
        //     echo "na";
        // }
        return view("profile/form",['profiles' => $profile]);

    }
}
