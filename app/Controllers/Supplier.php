<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Supplier_model;

class Supplier extends Controller
{
    public function __construct()
    {
        $this->model = new Supplier_model();
    }

    public function index()
    {
        $data['suppliers'] = $this->model->getSupplier();

        return view('supplier/index', $data);
    }
    public function create()
    {
        return view('supplier/create');
    }
    public function store()
    {
        $validation = \Config\Services::validation();

        $data = [
            'supplier_name'=>$this->request->getPost('supplier_name'),
            'supplier_phone_number'=>$this->request->getPost('supplier_phone_number'),
            'supplier_address'=>$this->request->getPost('supplier_address')
        ];

        if($validation->run($data, 'supplier') == false){
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('supplier/create'));
        }else{
            $save = $this->model->insertSupplier($data);

            if($save){
                session()->setFlashdata('success', 'Created');
                return redirect()->to(base_url('supplier'));
            }
        }
    }
    public function edit($id)
    {
        $data['supplier'] = $this->model->getSupplier($id);

        return view('supplier/edit', $data);
    }
    public function update()
    {
        $validation = \Config\Services::validation();

        $id = $this->request->getPost('supplier_id');
        $data = [
            'supplier_name'=>$this->request->getPost('supplier_name'),
            'supplier_phone_number'=>$this->request->getPost('supplier_phone_number'),
            'supplier_address'=>$this->request->getPost('supplier_address')
        ];

        if($validation->run($data, 'supplier') == false){
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('supplier/ceate'));
        }else{
            $update = $this->model->updateSupplier($data, $id);

            if($update){
                session()->setFlashdata('info', 'Updated');
                return redirect()->to(base_url('supplier'));
            }
        }
    }
    public function delete($id)
    {
        $delete = $this->model->deleteSupplier($id);

        if($delete){
            session()->setFlashdata('warning', 'Deleted');
            return redirect()->to(base_url('supplier'));
        }
    }

}