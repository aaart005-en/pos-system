<?php

namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
    public function index()
    {
        $model = new UserModel();
        $users = $model->findAll();

        return view('users/index', ['users' => $users]);
    }

    public function new()
    {
        return view('users/new', [
            'validation' => \Config\Services::validation(),
        ]);
    }

    public function create()
    {
        $model = new UserModel();

        $data = [
            'username'  => $this->request->getPost('username'),
            'full_name' => $this->request->getPost('full_name'),
            'role'      => $this->request->getPost('role'),
        ];

        if (!$model->validate($data)) {
            return view('users/new', [
                'validation' => $model->errors(),
                'old'        => $data,
            ]);
        }

        $model->save($data);

        return redirect()->to('/users');
    }

    public function edit($id)
    {
        $model = new UserModel();
        $user = $model->find($id);

        if (!$user) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('users/edit', [
            'user'       => $user,
            'validation' => \Config\Services::validation(),
        ]);
    }

    public function update($id)
    {
        $model = new UserModel();
        $user = $model->find($id);

        $data = [
            'username'  => $this->request->getPost('username'),
            'full_name' => $this->request->getPost('full_name'),
            'role'      => $this->request->getPost('role'),
        ];

        $rules = [
            'username'  => "required|min_length[3]|is_unique[users.username,id,{$id}]",
            'full_name' => 'required|min_length[2]',
        ];

        if (!$this->validate($rules)) {
            return view('users/edit', [
                'user'       => array_merge(['id' => $id], $data),
                'validation' => $this->validator,
            ]);
        }

        $avatarFile = $this->request->getFile('avatar');

        if ($avatarFile && $avatarFile->isValid() && !$avatarFile->hasMoved()) {
            if (!in_array($avatarFile->getClientMimeType(), ['image/jpeg', 'image/png']) || $avatarFile->getSize() > 2 * 1024 * 1024) {
                return view('users/edit', [
                    'user'       => array_merge(['id' => $id], $data),
                    'validation' => (object) ['listErrors' => fn() => '', 'getErrors' => fn() => ['avatar' => 'Avatar must be JPG or PNG, max 2MB.']],
                ]);
            }

            $newName = $avatarFile->getRandomName();

            \Config\Services::image()
                ->withFile($avatarFile->getTempName())
                ->fit(200, 200, 'center')
                ->save(ROOTPATH . 'public/uploads/avatars/' . $newName);

            $data['avatar'] = $newName;
        }

        $model->update($id, $data);

        return redirect()->to('/users');
    }
}