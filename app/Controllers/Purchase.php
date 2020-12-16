<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Purchase_model;
use App\Models\PurchaseDetail_model;
use App\Models\Supplier_model;
use App\Models\Product_model;

class Purchase extends Controller
{
    public function __construct()
    {
        $this->purchase = new Purchase_model();
        $this->supplier = new Supplier_model();
        $this->purchaseDetail = new PurchaseDetail_model();
        $this->product = new Product_model();
    }

    public function index()
    {
        $data['purchases'] = $this->purchase->getPurchase();

        return view('purchase/index', $data);
    }
    public function create()
    {
        $data['suppliers'] = $this->supplier->findAll();

        return view('purchase/create', $data);
    }
    public function store()
    {
        $validation = \Config\Services::validation();

        $data = [
            'supplier_id'=>$this->request->getPost('supplier_id'),
            'purchase_created_at'=>date('Y-m-d H:i:s')
        ];

        if($validation->run($data, 'purchase') == false){
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('purchase/create'));
        }else{
            $save = $this->purchase->insertPurchase($data);
            if($save){
                session()->setFlashdata('success', 'Created');
                return redirect()->to(base_url('purchase'));
            }
        }
    }
    public function delete($id)
    {
        $delete = $this->purchase->deletePurchase($id);

        if($delete){
            session()->setFlashdata('warning', 'Deleted');
            return redirect()->to(base_url('purchase'));
        }
    }
    public function show($id)
    {
        $data['purchase'] = $this->purchase->getPurchase($id);
        $data['purchaseDetail'] = $this->purchaseDetail->getPurchaseDetail($id);
        $data['products'] = $this->product->findAll();

        return view('purchase/show', $data);
    }
    
    public function storePurchase()
    {
        $validation = \Config\Services::validation();

        $trx_purchase_id = $this->request->getPost('trx_purchase_id');
        $qty = $this->request->getPost('purchase_quantity');
        $price = $this->request->getPost('purchase_price');
        $data = [
            'trx_purchase_id'=>$trx_purchase_id,
            'product_id'=>$this->request->getPost('product_id'),
            'purchase_quantity'=>$qty,
            'purchase_price'=>$price,
            'purchase_subtotal'=>$qty*$price
        ];

        if($validation->run($data, 'purchaseDetail') == false){
            session()->setFlashdata('errors', $validation->getErros());
        }else{
            $save = $this->purchaseDetail->insertPurchaseDetail($data);
            if($save){
                session()->setFlashdata('success', 'Created');
                return redirect()->to(base_url('purchase/show/'.$trx_purchase_id));
            }

        }
    }

    public function deletePurchase($id)
    {
        $trx_purchase_id = $this->request->getPost('trx_purchase_id');
        $delete = $this->purchaseDetail->deletePurchaseDetail($id);

        if($delete){
            session()->setFlashdata('warning', 'Deleted');
            return redirect()->to(base_url('purchase/show/'.$trx_purchase_id));
        }
    }
    


}