<?php

namespace App\Controllers;

use App\Models\MemberModel;

class Login extends BaseController
{
    public function __construct()
    {
        $this->memberModel = new MemberModel();
    }
    public function index()
    {
        helper(['form']);
        $data = [
            'title' => 'Form Login',
            'validation' => \Config\Services::validation()
        ];
        return view('login/index', $data);
    }

    public function process()
    {
        $session = session();
        $this->memberModel = new MemberModel(); 
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $data = $this->memberModel->where('email', $email)->first();
        if($data){
            $pass = $data['password'];
            $verify_pass = password_verify($password, $pass);
            if($verify_pass){
                $ses_data = [
                    'id'       => $data['id'],
                    'email'     => $data['email'],
                    'name'    => $data['name'],
                    'photo'    => $data['photo'],
                    'logged_in'     => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/home');
            }else{
                $session->setFlashdata('error', 'Wrong Password');
                return redirect()->to('/login');
            }
        }else{
            $session->setFlashdata('error', 'Email not Found');
            return redirect()->to('login');
        }
    }
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('login');
    }

    public function reset_password()
    {
        $data['title'] = 'Forgot Password';
        return view('login/reset_password_email', $data);
    }

    public function reset_password_validation()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim');
        if ($this->form_validation->run) {
            $email = $this->input->post('email');
            $reset_key = random_string('ainum', 59);

            if ($this->reset_m->update_reset_key($email, $reset_key)) {
                var_dump('ada');
            }else {
                var_dump('error');
            }
        }else{
            echo 0;
            return view('/login/reset_password_email');
        }
    }

    
}
