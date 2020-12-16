<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'user_id' => [
				'type'=>'BIGINT',
				'constraint'=>100,
				'auto_increment'=>true
			],
			'username' => [
				'type'=>'VARCHAR',
				'constraint'=>'100',
			],
			'password' => [
				'type'=>'VARCHAR',
				'constraint'=>'255',
			],
			'user_created_at' => [
				'type'=>'DATETIME',
				'null'=>true
			]
		]);

		$this->forge->addKey('user_id', true);
		$this->forge->createTable('users');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('users', true);
	}
}
