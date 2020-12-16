<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TrxSales extends Migration
{
	public function up()
	{
		$this->db->enableForeignKeyChecks();
		$this->forge->addField([
			'trx_sale_id' => [
				'type'=>'BIGINT',
				'constraint'=>100,
				'unsigned'=>true,
				'auto_increment'=>true
			],
			'total_sale' => [
				'type'=>'BIGINT',
				'constraint'=>100,
				'default'=>0
			],
			'sale_created_at'=>[
				'type'=>'DATETIME',
				'null'=>true
			]
		]);

		$this->forge->addKey('trx_sale_id', true);
		$this->forge->createTable('trx_sales');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('trx_sales', true);
	}
}
