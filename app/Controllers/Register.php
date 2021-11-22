<?php

namespace App\Controllers;

use App\Models\MemberModel;

class Register extends BaseController
{
    public function __construct()
    {
        $this->memberModel = new MemberModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Form Register',
            'validation' => \Config\Services::validation()
        ];
        return view('register/index', $data);
    }

    public function save()
    {
    //    validate

        if(!$this->validate([
            'email' => [
                'rules' => 'required|is_unique[member.email]',
                'errors' => [
                    'required' => 'Email not filled in',
                    'is_unique' => 'Email already exists'
                ]
                ],
            'password' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Password not filled in',
                    'min_length' => 'password minimum 8 character'
                ]
                ], 
            'password2' => [
                'rules' => 'matches[password]',
                'errors' => [
                    'matches' => 'password does not match'
                ]
                ],   
            'name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Name not filled in'
                ]
                ],
            'photo' => 'uploaded[photo]|max_size[photo,2048]|is_image[photo]|mime_in[photo,image/png,image/jpg,image/jpeg]'
            
        ])){
            // $validation = \Config\Services::validation();
            // return redirect()->to('register/index')->withInput()->with('validation', $validation);
            return redirect()->to('register/index')->withInput();
        }
        $this->memberModel = new MemberModel();
        $dataPhoto = $this->request->getFile('photo');
        $filename = $dataPhoto->getRandomName();
        $this->memberModel->insert([
            'email' => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'name' => $this->request->getVar('name'),
            'photo' => $filename
        ]);
        $dataPhoto->move('uploads/', $filename);

        session()->setFlashdata('message', 'You are now registered and can login');

        return redirect()->to('/login');
    }
}
