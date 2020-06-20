<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'	=> [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => TRUE,
				'auto_increment' => TRUE
			],
			'username'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'password'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'email'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			
		]);
		$this->forge->addKey('id', TRUE);
		$this->forge->addUniqueKey(['id', 'email']);
		# For MySQL
		$attributes = [
			'ENGINE' => 'InnoDB',
			'CHARACTER SET' => 'utf8',
			'COLLATE' => 'utf8_general_ci',
		];
		$this->forge->createTable('users', FALSE, $attributes);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('users');
	}
}
