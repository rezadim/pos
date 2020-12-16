<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Products extends Migration
{
	public function up()
	{
		$this->db->enableForeignKeyChecks();
		$this->forge->addField([
			'product_id' => [
				'type'=>'BIGINT',
				'constraint'=>100,
				'unsigned'=>true,
				'auto_increment'=>true
			],
			'product_code' => [
				'type'=>'VARCHAR',
				'constraint'=>'100',
				'null'=>true
			],
			'product_name' => [
				'type'=>'VARCHAR',
				'constraint'=>'100',
				'null'=>true
			],
			'purchase_price' => [
				'type'=>'BIGINT',
				'constraint'=>100,
				'default'=>0
			],
			'sale_price' => [
				'type'=>'BIGINT',
				'constraint'=>100,
				'default'=>0
			],
			'stock' => [
				'type'=>'BIGINT',
				'constraint'=>100,
				'default'=>0
			],
			'product_description' => [
				'type'=>'TEXT',
				'null'=>true
			]
		]);
		$this->forge->addKey('product_id', true);
		// $this->forge->addForeignKey('category_id', 'categories', 'category_id', 'CASCADE', 'CASCADE');
		$this->forge->createTable('products');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('products', true);
	}
}
