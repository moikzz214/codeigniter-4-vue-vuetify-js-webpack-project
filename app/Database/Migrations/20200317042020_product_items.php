<?php namespace App\Database\Migrations;

class ProductItems extends \CodeIgniter\Database\Migration {

        public function up()
        {
                $this->forge->addField([
                        'id'          => [
                                'type'           => 'BIGINT', 
                                'unsigned'       => TRUE,
                                'auto_increment' => TRUE
                        ],
                         
                        'contents' => [
                                'type'           => 'TEXT',
                                'null'           => TRUE,
                        ]
                ]);
                $this->forge->addKey('id', TRUE);
                $this->forge->createTable('product_items');
        }

        public function down()
        {
                $this->forge->dropTable('product_items');
        }
}