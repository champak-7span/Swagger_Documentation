<?php

namespace App\Models;

use App\Traits\BaseModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use BaseModel,HasFactory;

    protected $fillable = [
        'name',
        'image',
        'created_at', 
        'updated_at'
    ];
    
    protected $relationship = [];

    public function scopeSearch($query, $search)
    {
        return $query->where('name', 'LIKE', '%' . $search . '%');
    }

    public function scopeId($query, $value)
    {
        return $query->where('id' , $value);
    }

    public $queryable = [
        'id'
    ];
    
}
