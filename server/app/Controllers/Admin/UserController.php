<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class UserController extends BaseController
{
    
    protected $db;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }
    public function index()
    {
        $u = new UserModel();
        $data['users'] = $u->findAll();
        return view("admin/users/all",$data);

    }
    public function allusers()
    {
        $data = $this->db
        ->table('users')
        /* ->select('id, email, role')
        ->where('id', 2)
        ->orWhere('id', 5) */
        // ->limit(10, 0)
        ->get()->getResultArray();
        // return view("admin/users/all",$data);
        return view("admin/users/all",['users'=>$data]);
    }
}
