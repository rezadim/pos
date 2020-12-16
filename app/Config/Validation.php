<?php namespace Config;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var array
	 */
	public $ruleSets = [
		\CodeIgniter\Validation\Rules::class,
		\CodeIgniter\Validation\FormatRules::class,
		\CodeIgniter\Validation\FileRules::class,
		\CodeIgniter\Validation\CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------

	public $product = [
		'product_code'=>'required'
	];
	public $product_errors = [
		'product_code' => ['required'=>'Kode Produk harus diisi']
	];

	public $purchase = [
		'supplier_id'=>'required'
	];
	public $purchase_errors = [
		'supplier_id' => ['required'=>'Supplier harus diisi']
	];

	public $sale = [
		'sale_created_at' => 'required'
	];
	public $sale_errors = [
		'sale_created_at'=>['required'=>'Sale ID harus diisi']
	];

	public $supplier = [
		'supplier_name'=>'required'
	];
	public $supplier_errors = [
		'supplier_name'=>['required'=>'Nama Supplier harus diisi']
	];

	public $purchaseDetail = [
		'product_id'=>'required'
	];
	public $purchaseDetail_errors = [
		'product_id'=>['required'=>'Product harus diisi']
	];

	public $saleDetail = [
		'product_id' => 'required'
	];
	public $saleDetail_errors = [
		'product_id'=>['required'=>'Product harus diisi']
	];

}
