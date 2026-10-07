<?php

namespace App\Controllers;

use App\Models\User;

class Auth extends BaseController
{
    public function login()
    {
        if (session()->get('isLogged') === true) {
            return redirect()->to('/dashboard');
        }

        if ($this->request->getMethod() === 'POST') {
            $rules = ['email' => 'required|valid_email', 'password' => 'required'];

            if (! $this->validate($rules)) {
                return redirect()->back()->withInput()->with('error', 'Enter a valid email address and password.');
            }

            $user = (new User())->findByEmail((string) $this->request->getPost('email'));

            if ($user === null || ! password_verify((string) $this->request->getPost('password'), $user['password'])) {
                return redirect()->back()->withInput()->with('error', 'Invalid email or password.');
            }

            session()->regenerate();
            session()->set([
                'isLogged' => true,
                'user_id' => $user['id'],
                'user_name' => $user['first_name'],
            ]);

            return redirect()->to('/dashboard');
        }

        return view('login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
