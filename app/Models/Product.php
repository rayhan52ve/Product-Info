<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\ProductController;

class Product extends Model
{
    protected $primaryKey = 'id';
    protected $fillable=['pname','pprice'];
    use HasFactory;
}
