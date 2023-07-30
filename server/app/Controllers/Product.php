<?php

namespace App\Controllers;
use App\Models\ProductModel;
use CodeIgniter\Files\File;
use Intervention\Image\ImageManagerStatic as Image;

class Product extends BaseController
{
    private $model;
    // protected $helpers = ['form'];
    public function __construct()
    {
    //    $this->model = model(ProductModel::class);
       $this->model = new ProductModel();
       
    }
    public function index()
    {
        // $benchmark = \Config\Services::benchmark();
/*         $benchmark = \Config\Services::timer();
        $benchmark->start('products_query'); */
        //  $products = model(ProductModel::class);//in ci4
        //$this->load->model('ProductModel');//in CI3/2
        // $benchmark->mark('mark1');
        //$all = $this->model->findAll();
        $all = [
            'total'=>$this->model->countAll(),
            'products' => $this->model->paginate(10),
            'pager' => $this->model->pager,
        ];
/*         $benchmark->stop('products_query');
        $timers = $benchmark->getTimers();
        dd($timers); */
        // dd($all);
        // $all = $products->find(6);
        // var_dump($all);
        // return view("products", compact('all'));
        return view("products/all", $all);
        // return view("products");
    }
    public function create(){
        if (! $this->request->is('post')) {
            return view('products/create');
        }
        $rules = [
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'name' => 'required|min_length[5]|alpha',
            'description' => 'required|min_length[10]',
            'sku' => 'required|is_unique[products.sku]',
            'images' => [
                'label' => 'Image File',
                'rules' => [
                    'uploaded[images]',
                    'is_image[images]',
                    'mime_in[images,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                    // 'max_size[images,100]',
                    'max_dims[images,10024,7068]',
                ],
            ],            
        ];
        
        if (! $this->validate($rules)) {
            return view('products/create');
        }
        //
        $request = request();
        $img = $this->request->getFile('images');
                //file upload
        

                if (! $img->hasMoved()) {
                    $imagename = $img->store();
                    // echo $imagename;
                    // exit;
                    
                    $filepath = WRITEPATH . 'uploads/' . $imagename;
                    $data = ['uploaded_fileinfo' => new File($filepath)];
                    //watermark
                    //image intervention
                    $image = Image::make($filepath)->resize(800, null, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })->insert(WRITEPATH.'/uploads/logoci.png','center')->save($filepath);
                    //watermark end
                    
        
                    
                    //dd($data);
                    
                }
                //file upload end
        $arr = [
            'category_id'=>"1",
            'subcategory_id'=>"1",
            // 'sku'=>$_POST['sku'],
            'sku'=>$request->getPost('sku'),
            // 'sku'=>$this->request->getPost("sku"),
            'name'=> $request->getPost('name'),
            'description'=> $request->getPost('description'),
            'price'=> $_POST['price'],
            'newprice'=> $_POST['newprice'],
            'images'=> $imagename,
            'quantity'=> $_POST['quantity'],
            'discount'=> $_POST['discount'],
            'hot'=>isset($_POST['hot'])?$_POST['hot'] :0,
        ];

        $this->model->insert($arr);
        //echo $this->model->getInsertID();
        return view('products/upload_success', $data); 


        //redirect works only on named routes
        // return redirect("products");
        //redirect->to should use for normal routes
        //return redirect()->to("products/new");
    }
    public function add(){

        $request = request();
        $arr = [
            'category_id'=>"1",
            'subcategory_id'=>"1",
            // 'sku'=>$_POST['sku'],
            'sku'=>$request->getPost('sku'),
            // 'sku'=>$this->request->getPost("sku"),
            'name'=> $request->getPost('name'),
            'description'=> $request->getPost('description'),
            'price'=> $_POST['price'],
            'newprice'=> $_POST['newprice'],
            'images'=> "imagetest.jpg",
            'quantity'=> $_POST['quantity'],
            'discount'=> $_POST['discount'],
            'hot'=>isset($_POST['hot'])?$_POST['hot'] :0,
        ];
        $this->model->insert($arr);
        echo $this->model->getInsertID();

    }
    public function details($id){
        //dd($this->model->find($id));
        $info = $this->model->find($id);
        // return view("products/single",['info'=>$info]);
        return view("products/single",compact("info"));
    }

    
}