<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CrudModel;

class CRUDctrl extends BaseController
{
    protected $helpers = ['form'];
    public function index()
    {
        $model = new CRUDModel();
        return view('index', [
            "data" => $model->findAll() //mengambil semua data dari crud
        ]);
    }

    public function tambah()
    {
        return view("create");
    }

    public function simpan()
    {
        $rules = [
            'nama' => 'required|',
            'nim' => 'required|min_length[13]|integer',
            'alamat' => 'required'
        ];

        if(!$this->validate($rules)){
            return redirect()->back()->withInput();
        }

        $nama = $this->request->getPost('nama');
        $nim = $this->request->getPost('nim');
        $alamat = $this->request->getPost('alamat');

        $model = new CrudModel();

        $model->insert([
            "nama" => $nama,
            "nim" => $nim,
            "alamat" => $alamat
        ]);

        return redirect()->to(base_url('/'));
    }

    public function hapus($id)
    {
        $model = new CrudModel();
        $model -> delete($id);
        return redirect()->to(base_url('/'));        
    }

    public function edit($id)
    {
        $model = new CrudModel();
        return view('edit', [
            'data' => $model->find($id)
        ]);
    }

    public function update($id)
    {
        $rules = [
            'nama' => 'required|',
            'nim' => 'required|min_length[13]|integer',
            'alamat' => 'required'
        ];

        if(!$this->validate($rules)){
            return redirect()->back()->withInput();
        }

        
        $data = [
            "nama" => $this->request->getPost('nama'),
            "nim" => $this->request->getPost('nim'),
            "alamat" => $this->request->getPost('alamat')
        ];

        $model = new CrudModel();
        $model->update($id, $data);

        return redirect()->to(base_url('/'));
    }
}
