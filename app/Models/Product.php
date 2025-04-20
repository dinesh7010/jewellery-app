<?php

namespace App\Models;

use CodeIgniter\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'product_name', 'description', 'price', 'category', 'image'
    ];

    protected $useTimestamps = true;
}
