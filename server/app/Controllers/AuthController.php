<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class AuthController extends BaseController
{
    
    public $session;
    public function __construct()
    {
        helper("form");
        
        $this->session = session();  
    }
    public function index()
    {
        //
    }
    public function login()
    {
        $data = [
            'session' => $this->session,
        ];
        helper("request");
        if (! $this->request->is('post')) {
            return view('auth/login',$data);
        }

        $rules = [
            'email' => 'required|valid_email',
            'password' => 'required|min_length[5]',                        
        ];

        if (! $this->validate($rules)) {
            return view('auth/login',$data);
        }
        
        $userModel = model('UserModel');
        $email = $this->request->getPost('email');
        $pass = $this->request->getPost("password")??"";
        $user = $userModel->where('email', $email)->first();
        // dd($user);
        if($user){ 
            if(password_verify($pass,$user['password'])){ 
                $newdata = [
                    'user_id'  => $user['id'],
                    'username'  => $user['name'],
                    'email'     => $user['email'],
                    'role'     => $user['role'],
                    'logged_in' => true,
                ];
                
                $this->session->set($newdata);
                if($user['role']==2){
                    return redirect()->to("admin/dashboard");
                }
                elseif($user['role']==1){
                    return redirect()->to("/");  
                }
                else{
                    return redirect()->to("/"); 
                }
                
            }
            else{
                $this->session->setFlashdata('type', 'danger');
                $this->session->setFlashdata('message', 'password invalid');
                return redirect()->to("login");  
            }
        }
        else{
            $this->session->setFlashdata('type', 'danger');
            $this->session->setFlashdata('message', 'User Email Or password invalid');
            return redirect()->to("login");
        }
    }
    public function register()
    {

        $data = [
            'session' => $this->session,
        ];
        helper("request");
        if (! $this->request->is('post')) {
            return view('auth/registration',$data);
        }

        $rules = [
            'name' => 'required|alpha',
            'email' => 'required|valid_email',
            'password' => 'required|min_length[5]',                        
            'password2' => 'required|min_length[5]|matches[password]',                        
        ];

        if (! $this->validate($rules)) {
            $this->session->setFlashdata('type', 'danger');
            $this->session->setFlashdata('message', 'Please Check The form');
            return view('auth/registration',$data);
        }

        $user = new UserModel();
        $pass = $this->request->getPost('password')??'';
        $data = [            
            'name'  => $this->request->getPost('name'),
            'email'     => $this->request->getPost('email'),
            'role'     => '2',
            'password' => password_hash($pass, PASSWORD_DEFAULT),
        ];
        if($user->insert($data)){
            $this->session->setFlashdata('type', 'success');
            $this->session->setFlashdata('message', 'Registration Complete, please login to continue');
            return redirect()->to("login");
        }
        else{
            $this->session->setFlashdata('type', 'danger');
            $this->session->setFlashdata('message', 'Something went wrong. Please try again');
            return redirect()->to("registration");
        }

        
    }
    public function logout()
    {
        $session_items = ['username', 'email','logged_in'];
        $this->session->remove($session_items);
        $this->session->destroy();
        return redirect()->to("/");
    }
    public function check()
    {
        echo "UserName : " . $this->session->get('username') . "<br>";
        echo "UserEmail : " . $this->session->get('email') . "<br>";
        if($this->session->get('logged_in')){
            echo "User Logged In";
        }
        else{
            echo "User Not Logged In";
        }
        
    }
}
