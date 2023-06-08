<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\CrudModel;

class CrudSedeer extends Seeder
{
    public function run()
    {
        $model = new CrudModel(); //wajib membuat $model
        $model->insert([
            "nama" => "Muhammad aaaa",
            "nim" => "21108172",
            "alamat" => "Jl. Brigjend Hasan Basri"
        ]);
    }
}
