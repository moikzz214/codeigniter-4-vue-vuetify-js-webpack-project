<?php namespace App\Database\Migrations;

class UserProfile extends \CodeIgniter\Database\Migration {

        public function up()
        {
                $this->forge->addField([
                        'id'          => [
                                'type'           => 'BIGINT', 
                                'unsigned'       => TRUE,
                                'auto_increment' => TRUE
                        ],
                        'cv'       => [
                                'type'           => 'TEXT',
                                'null'           => TRUE,
                        ],
                        'contents' => [
                                'type'           => 'TEXT',
                                'null'           => TRUE,
                        ],
                        'parent_id' => [
                                'type'           => 'BIGINT',
                                'null'           => TRUE,
                        ],
                        'expiry_date' => [
                                'type'           => 'TIMESTAMP' 
                        ],
                ]);
                $this->forge->addKey('id', TRUE);
                $this->forge->createTable('user_profile');
        }

        public function down()
        {
                $this->forge->dropTable('user_profile');
        }
}