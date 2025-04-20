<?php

namespace App\Controllers;

use App\Models\Product;
use App\Controllers\BaseController;

class ProductController extends BaseController
{
    public function create()
    {
        return view('product/create');
    }

    public function store()
    {
        $productModel = new Product();

        $img = $this->request->getFile('image');
        if ($img && $img->isValid() && !$img->hasMoved()) {
            $imgName = $img->getRandomName();
            $img->move('uploads', $imgName);
        }

        $data = [
            'product_name' => $this->request->getPost('product_name'),
            'description'  => $this->request->getPost('description'),
            'price'        => $this->request->getPost('price'),
            'category'     => $this->request->getPost('category'),
            'image'        => $imgName ?? null,
        ];

        $productModel->save($data);

        return redirect()->to('/dashboard');
    }
    public function edit($id)
    {
        $productModel = new Product();
        $data['product'] = $productModel->find($id);

        if (!$data['product']) {
            return redirect()->to('/dashboard')->with('error', 'Product not found.');
        }

        return view('product/edit', $data);
    }
    public function update($id)
    {
        $productModel = new Product();

        $data = [
            'product_name' => $this->request->getPost('product_name'),
            'description'  => $this->request->getPost('description'),
            'price'        => $this->request->getPost('price'),
            'category'     => $this->request->getPost('category'),
        ];

        // Optional image update
        $image = $this->request->getFile('image');
        if ($image && $image->isValid() && !$image->hasMoved()) {
            $newName = time() . '_' . $image->getRandomName();
            $image->move('uploads', $newName);
            $data['image'] = $newName;
        }

        $productModel->update($id, $data);

        return redirect()->to('/dashboard')->with('success', 'Product updated successfully.');
    }

    // Delete
    public function delete($id)
    {
        $productModel = new Product();
        $productModel->delete($id);

        return redirect()->to('/dashboard')->with('success', 'Product deleted.');
    }
}
