<?php

namespace App\Controllers;

use App\Models\CustomerAccount;

class CustomerAccounts extends BaseController
{
    private CustomerAccount $accounts;

    public function __construct()
    {
        $this->accounts = new CustomerAccount();
    }

    public function index()
    {
        if (! $this->isLoggedIn()) {
            return redirect()->to('/login');
        }

        return view('dashboard', ['accounts' => $this->accounts->orderBy('id', 'DESC')->findAll()]);
    }

    public function create()
    {
        if (! $this->isLoggedIn()) {
            return redirect()->to('/login');
        }

        return view('account_form', ['account' => null, 'action' => '/accounts']);
    }

    public function store()
    {
        if (! $this->isLoggedIn()) {
            return redirect()->to('/login');
        }

        if (! $this->validateAccount()) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->accounts->insert($this->accountData());
        return redirect()->to('/dashboard');
    }

    public function edit(int $id)
    {
        if (! $this->isLoggedIn()) {
            return redirect()->to('/login');
        }

        $account = $this->accounts->find($id);
        if ($account === null) {
            return redirect()->to('/dashboard');
        }

        return view('account_form', ['account' => $account, 'action' => '/accounts/' . $id]);
    }

    public function update(int $id)
    {
        if (! $this->isLoggedIn()) {
            return redirect()->to('/login');
        }

        if ($this->accounts->find($id) === null) {
            return redirect()->to('/dashboard');
        }

        if (! $this->validateAccount($id)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->accounts->update($id, $this->accountData());
        return redirect()->to('/dashboard');
    }

    public function delete(int $id)
    {
        if (! $this->isLoggedIn()) {
            return redirect()->to('/login');
        }

        $this->accounts->delete($id);
        return redirect()->to('/dashboard');
    }

    private function isLoggedIn(): bool
    {
        return session()->get('isLogged') === true;
    }

    private function validateAccount(?int $id = null): bool
    {
        $accountNumberRule = 'required|max_length[50]|is_unique[customer_accounts.account_number' . ($id === null ? '' : ',id,' . $id) . ']';

        return $this->validate([
            'account_number' => $accountNumberRule,
            'customer_name' => 'required|max_length[150]',
            'address' => 'required',
            'phone' => 'permit_empty|max_length[20]',
            'email' => 'permit_empty|valid_email|max_length[100]',
            'meter_number' => 'permit_empty|max_length[50]',
            'connection_type' => 'required|in_list[residential,commercial,industrial]',
            'status' => 'required|in_list[active,inactive,suspended]',
        ]);
    }

    private function accountData(): array
    {
        return $this->request->getPost([
            'account_number', 'customer_name', 'address', 'phone', 'email',
            'meter_number', 'connection_type', 'status',
        ]);
    }
}
