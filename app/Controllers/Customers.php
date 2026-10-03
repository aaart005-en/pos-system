<?php

namespace App\Controllers;

use App\Models\CustomerModel;

class Customers extends BaseController
{
    public function index()
    {
        $model = new CustomerModel();
        $customers = $model->findAll();

        return view('customers/index', ['customers' => $customers]);
    }

    public function new()
    {
        return view('customers/new', [
            'validation' => \Config\Services::validation(),
        ]);
    }

    public function create()
    {
        $model = new CustomerModel();

        $data = [
            'full_name' => $this->request->getPost('full_name'),
            'email'     => $this->request->getPost('email'),
            'phone'     => $this->request->getPost('phone'),
        ];

        if (!$model->validate($data)) {
            return view('customers/new', [
                'validation' => $model->errors(),
                'old'        => $data,
            ]);
        }

        $model->save($data);

        return redirect()->to('/customers');
    }

    public function edit($id)
    {
        $model = new CustomerModel();
        $customer = $model->find($id);

        if (!$customer) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('customers/edit', [
            'customer'   => $customer,
            'validation' => \Config\Services::validation(),
        ]);
    }

    public function update($id)
    {
        $model = new CustomerModel();

        $data = [
            'full_name' => $this->request->getPost('full_name'),
            'email'     => $this->request->getPost('email'),
            'phone'     => $this->request->getPost('phone'),
        ];

        if (!$model->validate($data)) {
            return view('customers/edit', [
                'customer'   => array_merge(['id' => $id], $data),
                'validation' => $model->errors(),
            ]);
        }

        $model->update($id, $data);

        return redirect()->to('/customers');
    }
}