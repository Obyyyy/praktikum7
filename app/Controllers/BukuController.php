<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BukuModel;

class BukuController extends BaseController
{
    protected $helpers = ['form'];
    public function index()
    {
        // if(session())
        $model = new BukuModel();
        return view('/buku/index', [
            "data" => $model->findAll() //mengambil semua data dari crud
        ]);
    }

    public function tambah()
    {
        session();
        return view("buku/create", [
            'validation' => \Config\Services::validation()
        ]);
    }

    public function simpan()
    {
        $rules = [
            'judul' => [
                'rules' => 'required|alpha',
                'errors' => [
                    'required' => 'Judul buku harus diisi',
                    'alpha' => 'Judul buku hanya bisa string',
                ]
            ],
            'penulis' => [
                'rules' => 'required|alpha',
                'errors' => [
                    'required' => 'Penulis buku harus diisi',
                    'alpha' => 'Penulis buku hanya bisa string',
                ]
            ],
            'penerbit' => [
                'rules' => 'required|alpha',
                'errors' => [
                    'required' => 'Penerbit buku harus diisi',
                    'alpha' => 'Penerbit buku hanya bisa string',
                ]
            ],
            'tahun_terbit' => [
                'rules' => 'required|integer|greater_than[1800]|less_than[2024]',
                'errors' => [
                    'required' => 'Tahun terbit buku harus diisi',
                    'integer' => 'Tahun terbit buku hanya bisa angka',
                    'greater_than' => 'Tahun terbit buku harus di atas 1800',
                    'less_than' => 'Tahun terbit buku harus di bawah 2024'
                ]
            ]
        ];

        $data = [
            "judul" => $this->request->getPost('judul'),
            "penulis" => $this->request->getPost('penulis'),
            "penerbit" => $this->request->getPost('penerbit'),
            "tahun_terbit" => $this->request->getPost('tahun_terbit')
        ];

        if(!$this->validate($rules)){
            // return redirect()->back()->withInput()->with('validation', $validation);
            $data['validation'] = $this->validator;
            // return redirect()->to('tambahdata')->withInput()->with('validation', $data);
            return view('/buku/create', $data);
        }
        

        $model = new BukuModel();
        $model->insert($data);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to(base_url('/'));
    }

    public function hapus($id)
    {
        $model = new BukuModel();
        $model -> delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to(base_url('/'));        
    }

    public function edit($id)
    {
        $model = new BukuModel();
        return view('buku/edit', [
            'data' => $model->find($id)
        ]);
    }

    public function update($id)
    {
        $rules = [
            'judul' => [
                'rules' => 'required|alpha',
                'errors' => [
                    'required' => 'Judul buku harus diisi',
                    'alpha' => 'Judul buku hanya bisa string',
                ]
            ],
            'penulis' => [
                'rules' => 'required|alpha',
                'errors' => [
                    'required' => 'Penulis buku harus diisi',
                    'alpha' => 'Penulis buku hanya bisa string',
                ]
            ],
            'penerbit' => [
                'rules' => 'required|alpha',
                'errors' => [
                    'required' => 'Penerbit buku harus diisi',
                    'alpha' => 'Penerbit buku hanya bisa string',
                ]
            ],
            'tahun_terbit' => [
                'rules' => 'required|integer|greater_than[1800]|less_than[2024]',
                'errors' => [
                    'required' => 'Tahun terbit buku harus diisi',
                    'integer' => 'Tahun terbit buku hanya bisa angka',
                    'greater_than' => 'Tahun terbit buku harus di atas 1800',
                    'less_than' => 'Tahun terbit buku harus di bawah 2024'
                ]
            ]
        ];

        if(!$this->validate($rules)){
            // return redirect()->back()->withInput();
            $error['validation'] = $this->validator;
            $model = new BukuModel();
            return view('/buku/edit', [
                'validation' => $error,
                'data' => $model->find($id)
            ]);
        }

        $data = [
            'judul' => $this->request->getPost('judul'),
            'penulis' => $this->request->getPost('penulis'),
            'penerbit' => $this->request->getPost('penerbit'),
            'tahun_terbit' => $this->request->getPost('tahun_terbit')
        ];

        $model = new BukuModel();
        $model->update($id, $data);

        session()->setFlashdata('pesan', 'Data berhasil diedit');
        return redirect()->to(base_url('/'));
    }
}
