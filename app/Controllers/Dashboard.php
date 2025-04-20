<?php

namespace App\Controllers;

use App\Models\Product;
use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
{
    if (!session()->get('user_id')) {
        return redirect()->to('/login');
    }

    $productModel = new Product();
    $data['products'] = $productModel->findAll();

    return view('dashboard', $data);
}

}
