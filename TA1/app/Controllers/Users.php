<?php

namespace App\Controllers;

class Users extends BaseController
{
    public function index(): string
    {
        $users = [
            ['username' => 'admin.harvey', 'full_name' => 'Harvey Espenilla', 'role' => 'Administrator'],
            ['username' => 'cashier.julian', 'full_name' => 'Julian Gaspar', 'role' => 'Cashier'],
            ['username' => 'manager.iggy', 'full_name' => 'Iggy Durana', 'role' => 'Store Manager'],
            ['username' => 'marketing.joro', 'full_name' => 'Joro Soriano', 'role' => 'Marketing Staff'],
            ['username' => 'inventory.misha', 'full_name' => 'Misha Recente', 'role' => 'Inventory Staff'],
        ];

        return view('users/index', [
            'title' => 'User Accounts',
            'users' => $users,
        ]);
    }
}
