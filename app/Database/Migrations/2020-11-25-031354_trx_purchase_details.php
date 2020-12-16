<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TrxPurchaseDetails extends Migration
{
	public function up()
	{
		$this->db->enableForeignKeyChecks();
		$this->forge->addField([
			'purchase_detail_id' => [
				'type'=>'BIGINT',
				'constraint'=>100,
				'auto_increment'=>true
			],
			'trx_purchase_id' => [
				'type'=>'BIGINT',
				'constraint'=>100,
				'null'=>true
			],
			'product_id' => [
				'type'=>'BIGINT',
				'constraint'=>100,
				'null'=>true,
				'unsigned'=>true
			],
			'purchase_quantity' => [
				'type'=>'BIGINT',
				'constraint'=>100,
				'default'=>0
			],
			'purchase_price' => [
				'type'=>'BIGINT',
				'constraint'=>100,
				'default'=>0
			],
			'purchase_subtotal' => [
				'type'=>'BIGINT',
				'constraint'=>100,
				'default'=>0
			]
		]);

		$this->forge->addKey('purchase_detail_id', true);
		$this->forge->addForeignKey('trx_purchase_id', 'trx_purchases', 'trx_purchase_id', 'CASCADE', 'CASCADE');
		$this->forge->addForeignKey('product_id', 'products', 'product_id', 'CASCADE', 'CASCADE');
		$this->forge->createTable('trx_purchase_details');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('trx_purchase_details', true);
	}
}
