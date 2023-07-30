<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\Database\RawSql;
use CodeIgniter\API\ResponseTrait;

class DbController extends BaseController
{
    use ResponseTrait;
    public function db1()
    {
        echo "https://codeigniter.com/user_guide/database/queries.html<br>";
        $firstDB = db_connect('default');
        $users = $firstDB->table('users')->get()->getResult();
        dd($users);
    }
    public function db2()
    {
        echo "https://codeigniter.com/user_guide/database/queries.html<br>";
        $secondDB = db_connect('r53php');
        $users = $secondDB->table('users')->get()->getResult();
        dd($users);
    }
    public function insert($catname){
        echo "https://codeigniter.com/user_guide/database/queries.html<br>";
        $db = db_connect();
        $pQuery = $db->prepare(static function ($db) {
            return $db->table('categories')->insert([
                'name'    => 'X',                
            ]);
        });
        $results = $pQuery->execute($catname);

        dd($results);
    }
    public function querybuilder(){
        return view ("querybuilder");
    }
    public function categories(){
        $db      = \Config\Database::connect();
        $builder = $db->table('categories');
        // dd($builder->get()->getResultArray());
        // dd($builder->get()->getResult());
        dd($builder->get()->getRow());//returns single row        
    }
    public function getwhere(){
        echo "https://codeigniter.com/user_guide/database/query_builder.html<br>";
        $db      = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('name, role, email');
        // $builder->where('email','admin@gmail.com');
        $builder->where('email !=','admin@gmail.com');
        dd($builder->get()->getResultArray());
        // dd($builder->get()->getResult());
        // dd($builder->get()->getRow());//returns single row        
    }
    public function newcat(){
        $data = [
            // 'id'          => new RawSql('DEFAULT'),
            // 'title'       => 'My title',
            'name'        => 'cat'.time(),
            // 'date'        => '2022-01-01',
            // 'last_update' => new RawSql('CURRENT_TIMESTAMP()'),
        ];
        $db      = \Config\Database::connect();
        $builder = $db->table('categories');
        dd($builder->insert($data));

    }
    public function upsert(){
        
        echo "https://codeigniter.com/user_guide/database/query_builder.html<br>";
        //it will insert as nop primary key given
/*         $data = [
            'name'=> "nc".time()
        ]; */
        //it will update as primary key given
        $data = [
            "id"=>1,
            'name'=> "ppnc".time()
        ];
        $db      = \Config\Database::connect();
        $builder = $db->table('categories');
        dd($builder->upsert($data));

    }
    public function update(){
        $db      = \Config\Database::connect();
        $builder = $db->table('users');
        $data = [
            'email'=>"jd1686391367@example.com",
            'role'=>'1',
            'token'=>"arandomtoken".rand(500,999).time()
        ];
        $builder->where('id', 3);
        dd($builder->update($data));
    }
    public function api(){
        Header('Access-Control-Allow-Origin: *'); //for allow any domain, insecure
        Header('Access-Control-Allow-Headers: *'); //for allow any headers, insecure
        Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT,DELETE'); //method allowed

        $data = [];
        $db      = \Config\Database::connect();
        $builder = $db->table('categories');
        // dd($builder->get()->getResultArray());
        $data['categories'] =  $builder->get()->getResultArray();
        $builder = $db->table('users');
        $builder->select('id,name, role, email');
        $data['users'] =  $builder->get()->getResultArray();
        return $this->respond($data);
    }
    public function chaining(){
        $db      = \Config\Database::connect();
        $query = $db
        ->table('users')
        ->select('id, email, role')
        ->where('id', 2)
        ->orWhere('id', 5)
        // ->limit(10, 0)
        ->get();
    dd($query->getResultObject());
    }

}
