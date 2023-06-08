<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Crud extends Migration
{
    public function up()
    {
        $field = [
            "id" => [
                'type' => 'INT',
                'constraint' => 5,
                'auto_increment' => true,
                'unsigned' => true
            ],
            "nama" => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            "nim" => [
                'type' => 'VARCHAR',
                'constraint' => 13
            ],
            "alamat" => [
                'type' => 'TEXT',
            ]
        ];
        $this->forge->addField($field);
        $this->forge->addKey('id', true);
        $this->forge->createTable('crud', true); //membuat tabel jika tidak ada tabel crud
    }

    public function down()
    {
        $this->forge->dropTable('crud', true); // beri true untuk lebih aman tidak ada pesan error
    }
}
