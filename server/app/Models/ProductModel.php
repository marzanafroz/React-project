<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table      = 'products';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $allowedFields = [
        'category_id', 
        'subcategory_id',
        'name',
        'description',
        'sku',        
        'price',
        'price2',
        'quantity',
        'discount',
        'hot'  
    ];
}