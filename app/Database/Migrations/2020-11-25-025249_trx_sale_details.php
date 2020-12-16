<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TrxSaleDetails extends Migration
{
	public function up()
	{
		$this->db->enableForeignKeyChecks();
		$this->forge->addField([
			'sale_detail_id' => [
				'type'=>'BIGINT',
				'constraint'=>100,
				'auto_increment'=>true
			],
			'trx_sale_id' => [
				'type'=>'BIGINT',
				'constraint'=>100,
				'null'=>true,
				'unsigned'=>true
			],
			'product_id' => [
				'type'=>'BIGINT',
				'constraint'=>100,
				'null'=>true,
				'unsigned'=>true
			],
			'sale_quantity' => [
				'type'=>'BIGINT',
				'constraint'=>100,
				'default'=>0
			],
			'sale_subtotal' => [
				'type'=>'BIGINT',
				'constraint'=>100,
				'default'=>0
			]
		]);

		$this->forge->addKey('sale_detail_id', true);
		$this->forge->addForeignKey('trx_sale_id', 'trx_sales', 'trx_sale_id', 'CASCADE', 'CASCADE');
		$this->forge->addForeignKey('product_id', 'products', 'product_id', 'CASCADE', 'CASCADE');
		$this->forge->createTable('trx_sale_details');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('trx_sale_details', true);
	}
}
