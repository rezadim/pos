<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Sale_model;
use App\Models\SaleDetail_model;
use App\Models\Product_model;

class Sale extends Controller
{
    public function __construct()
    {
        $this->sale = new Sale_model();
        $this->saleDetail = new SaleDetail_model();
        $this->product = new Product_model();
    }

    public function index()
    {
        $data['sales'] = $this->sale->getSale();

        return view('sale/index', $data);
    }
    public function create()
    {
        return view('sale/create');
    }
    public function store()
    {
        $validation = \Config\Services::validation();

        $data = [
            'sale_created_at'=>$this->request->getPost('sale_created_at')
        ];

        if($validation->run($data, 'sale') == false){
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('sale/create'));
        }else{
            $save = $this->sale->insertSale($data);

            if($save){
                session()->setFlashdata('success', 'Created');
                return redirect()->to(base_url('sale'));
            }
        }
    }
    public function delete($id)
    {
        $delete = $this->sale->deleteSale($id);

        if($delete){
            session()->setFlashdata('warning', 'Deleted');
            return redirect()->to(base_url('sale'));
        }
    }
    public function show($id)
    {
        $data['sale'] = $this->sale->getSale($id);
        $data['saleDetail'] = $this->saleDetail->getSaleDetail($id);
        $data['products'] = $this->product->findAll();

        return view('sale/show', $data);
    }
    public function storeSale()
    {
        $validation = \Config\Services::validation();

        $trx_sale_id = $this->request->getPost('trx_sale_id');
        $qty = $this->request->getPost('sale_quantity');
        $price = 0;
        $data = [
            'trx_sale_id'=>$trx_sale_id,
            'product_id'=>$this->request->getPost('product_id'),
            'sale_quantity'=>$qty,
            'sale_subtotal'=>$qty*$price
        ];

        if($validation->run($data, 'saleDetail') == false){
            session()->setFlashdata('errors', $validation->getErrors());
        }else{
            $save = $this->saleDetail->insertSaleDetail($data);
            if($save){
                session()->setFlashdata('success', 'Created');
                return redirect()->to(base_url('sale/show/'.$trx_sale_id));
            }
        }
    }

}