<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class LoginController extends BaseController
{
    public function index()
    {
        return view('login');
    }
    
    public function login()
    {
        // $data = [
        //     "username" => $this->request->getPost('username'),
        //     "email" => $this->request->getPost('email'),
        //     "password" => $this->request->getPost('password')
        // ];
        $model = new UserModel();

        $usernameEmail = request()->getPost('usernameEmail');
        $password = request()->getPost('password');
        
        // $dataUser = $model->where("email", $data['email'])->first();
        $dataEmail = $model->where(["email" => $usernameEmail])->first();
        $dataUsername = $model->where(["username" => $usernameEmail])->first();
        
        if($dataUsername){
            $dataUser = $dataEmail;
        } elseif($dataEmail){
            $dataUser = $dataUsername;
        }
        if($dataUsername || $dataEmail){
            if($dataEmail){
                if( (password_verify($password, $dataEmail['password'])) ){
                    session()->set([
                        "username" => $usernameEmail,
                        "isLoggedIn" => true
                    ]);
                    return redirect()->to(base_url('/'));
                }else{
                    session()->setFlashdata('login', 'Username atau Password sala');
                    return redirect()->to(base_url('/login'));
                }
            } elseif($dataUsername){
                if( (password_verify($password, $dataUsername['password'])) ){
                    session()->set([
                        "username" => $usernameEmail,
                        "isLoggedIn" => true
                    ]);
                    return redirect()->to(base_url('/'));
                }else{
                    session()->setFlashdata('login', 'Username atau Password salah');
                    return redirect()->to(base_url('/login'));
                }
            }
        }else{
            session()->setFlashdata('login', 'Username atau Password salah');
            return redirect()->to(base_url('/login'));
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('/login'));
    }
}