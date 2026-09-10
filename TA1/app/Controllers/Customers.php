<?php

namespace App\Controllers;

class Customers extends BaseController
{
    public function index(): string
    {
        $customers = [
            ['full_name' => 'Straw Berry', 'email' => 'straw.berry@mail.com', 'phone' => '0998 765 4321'],
            ['full_name' => 'Cup Cake', 'email' => 'cup.cake@mail.com', 'phone' => '0998 765 4329'],
            ['full_name' => 'Sun Flower', 'email' => 'sun.flower@mail.com', 'phone' => '0998 765 4322'],
            ['full_name' => 'Butter Fly', 'email' => 'butter.fly@mail.com', 'phone' => '0998 765 4328'],
            ['full_name' => 'Jelly Bean', 'email' => 'jelly.bean@mail.com', 'phone' => '0998 765 4325'],
        ];

        return view('customers/index', [
            'title' => 'Customer Accounts',
            'customers' => $customers,
        ]);
    }
}
