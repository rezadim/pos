<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Suppliers extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'supplier_id' => [
				'type'=>'BIGINT',
				'constraint'=>100,
				'auto_increment'=>true
			],
			'supplier_name' => [
				'type'=>'VARCHAR',
				'constraint'=>'100'
			],
			'supplier_phone_number' => [
				'type'=>'VARCHAR',
				'constraint'=>'100',
				'null'=>true
			],
			'supplier_address' => [
				'type'=>'TEXT',
				'null'=>true
			]
		]);

		$this->forge->addKey('supplier_id', true);
		$this->forge->createTable('suppliers');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('suppliers', true);
	}
}
