<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateExpensesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
    'id' => [
        'type'           => 'INT',
        'constraint'     => 10,
        'unsigned'       => true,
        'auto_increment' => true,
    ],
    'title' => [
        'type'       => 'VARCHAR',
        'constraint' => '191',
        'null'       => false,
    ],
    'category' => [
        'type'       => 'VARCHAR',
        'constraint' => '100',
        'null'       => false,
    ],
    'amount' => [
        'type'       => 'DECIMAL',
        'constraint' => '10,2',
        'null'       => false,
    ],
    'expense_date' => [
        'type' => 'DATE',
        'null' => false,
    ],
   
]);


        $this->forge->addKey('id', true); // Primary Key
        $this->forge->createTable('expenses');
    }

    public function down()
    {
        $this->forge->dropTable('expenses');
    }
}
