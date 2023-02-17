<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    
    protected $table = 'tag';
    public $timestamps = false;
    
    protected $fillable = ['name'];
    
    public function products() {
        return $this->belongsToMany('App\Models\Product', 'product_tag', 'idTag', 'idProduct');
    }
}
