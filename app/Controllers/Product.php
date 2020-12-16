<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Product_model;

class Product extends Controller
{
    public function __construct()
    {
        $this->model = new Product_model();
    }

    public function index()
    {
        $data['products'] = $this->model->getProduct();

        return view('product/index', $data);
    }
    public function create()
    {
        return view('product/create');
    }
    public function store()
    {
        $validation = \Config\Services::validation();

        $data = [
            'product_code'=>$this->request->getPost('product_code'),
            'product_name'=>$this->request->getPost('product_name'),
            'sale_price'=>$this->request->getPost('sale_price'),
            'stock'=>$this->request->getPost('stock'),
            'product_description'=>$this->request->getPost('product_description')
        ];

        if($validation->run($data, 'product') == false){
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('product/create'));
        }else{
            $save = $this->model->insertProduct($data);
            if($save){
                session()->setFlashdata('success', 'Created');
                return redirect()->to(base_url('product'));
            }
        }
    }
    public function edit($id)
    {
        $data['product'] = $this->model->getProduct($id);

        return view('product/edit', $data);
    }
    public function update()
    {
        $validation = \Config\Services::validation();

        $id = $this->request->getPost('product_id');

        $data = [
            'product_code'=>$this->request->getPost('product_code'),
            'product_name'=>$this->request->getPost('product_name'),
            'sale_price'=>$this->request->getPost('sale_price'),
            'stock'=>$this->request->getPost('stock'),
            'product_description'=>$this->request->getPost('product_description')
        ];

        if($validation->run($data, 'product') == false){
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('product/edit'));
        }else{
            $update = $this->model->updateProduct($data, $id);
            if($update){
                session()->setFlashdata('info', 'Updatedd');
                return redirect()->to(base_url('product'));
            }
        }
    }
    public function delete($id)
    {
        $delete = $this->model->deleteProduct($id);

        if($delete){
            session()->setFlashdata('warning', 'Deleted');
            return redirect()->to(base_url('product'));
        }
    }

}