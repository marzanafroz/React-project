<?php
namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use CodeIgniter\API\ResponseTrait;

class ProductController extends BaseController
{
    use ResponseTrait;
    public function __construct()
    {
        Header('Access-Control-Allow-Origin: *'); //for allow any domain, insecure
        Header('Access-Control-Allow-Headers: *'); //for allow any headers, insecure
        Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT,DELETE'); //method allowed
    }
    public function index()
    {
        $p = new ProductModel();
        $all = $p->findAll();
        return $this->respond($all);
    }
    public function single($id)
    {
        $p = new ProductModel();
        $all = $p->find($id);
        // $all['givenname'] = $name;
        return $this->respond($all);
    }
    public function test($id,$name)
    {
        $all['param1'] = $id;
        $all['param2'] = $name;
        return $this->respond($all);
    }
}
