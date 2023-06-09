<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
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
            "username" => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            "email" => [
                'type' => 'VARCHAR',
                'constraint' => 150,
            ],
            "password" => [
                'type' => 'TEXT',
                'constraint' => 6,
            ]
        ];
        $this->forge->addField($field);
        $this->forge->addKey('id', true);
        $this->forge->createTable('user', true); //membuat tabel jika tidak ada tabel user
    }

    public function down()
    {
        $this->forge->dropTable('user', true);
    }
}