<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];
    
    // protected $guareded = ['id'];
    public function categories()
    {
        return $this->hasMany(Category::class);   
    }
    // public function home()
    // {
    //     return $this->hasMany(Category::class);   
    // }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
