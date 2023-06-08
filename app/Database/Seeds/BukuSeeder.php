<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\BukuModel;

class BukuSeeder extends Seeder
{
    public function run()
    {
        $model = new BukuModel(); //wajib membuat $model
        $model->insert([
            "judul" => "Muhammad aaaa",
            "penulis" => "aaa",
            "penerbit" => "Gramdeia",
            "tahun_terbit" => "2021"
        ]);
    }
}
