<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TrxPurchases extends Migration
{
	public function up()
	{
		$this->db->enableForeignKeyChecks();
		$this->forge->addField([
			'trx_purchase_id' => [
				'type'=>'BIGINT',
				'constraint'=>100,
				'auto_increment'=>true
			],
			'supplier_id' => [
				'type'=>'BIGINT',
				'constraint'=>100,
				'null'=>true
			],			
			'total_purchase' => [
				'type'=>'BIGINT',
				'constraint'=>100,
				'default'=>0
			],
			'purchase_created_at' => [
				'type'=>'DATETIME',
				'null'=>true
			]
		]);

		$this->forge->addKey('trx_purchase_id', true);
		$this->forge->addForeignKey('supplier_id', 'suppliers', 'supplier_id', 'CASCADE', 'CASCADE');
		$this->forge->createTable('trx_purchases');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('trx_purchases', true);
	}
}
