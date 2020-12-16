<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Purchase_model;
use App\Models\PurchaseDetail_model;
use App\Models\Sale_model;
use App\Models\SaleDetail_model;
use App\Models\Product_model;
use App\Models\Supplier_model;

class Report extends Controller
{
    public function __construct()
    {
        $this->purchase = new Purchase_model();
        $this->purchaseDetail = new PurchaseDetail_model();
        $this->sale = new Sale_model();
        $this->saleDetail = new SaleDetail_model();
        $this->product = new Product_model();
        $this->supplier = new Supplier_model();
    }
    public function index()
    {
        return view('report/index');
    }

}