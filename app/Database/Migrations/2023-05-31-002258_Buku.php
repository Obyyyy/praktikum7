<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Buku extends Migration
{
    public function up()
    {
        $field = [
            "id" => [
                'type' => 'BIGINT',
                'constraint' => 8,
                'auto_increment' => true,
                'unsigned' => true
            ],
            "judul" => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            "penulis" => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            "penerbit" => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            "tahun_terbit" => [
                'type' => 'YEAR',
            ]
        ];
        $this->forge->addField($field);
        $this->forge->addKey('id', true);
        $this->forge->createTable('buku', true); //membuat tabel jika tidak ada tabel crud
    }

    public function down()
    {
        $this->forge->dropTable('buku', true);
    }
}
