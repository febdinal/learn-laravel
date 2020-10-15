<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Http\Controllers\BlogCategoryController;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model {
    use HasFactory;

    protected $fillable = [ 'name', 'slug' ];
    
    /**
    * Relationship between BlogCategory and Blog
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function blogs() {
        return $this->hasMany(Blog::class, 'category_id');
    }
}
