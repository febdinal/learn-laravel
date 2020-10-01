<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\BlogCategoryController;

class BlogCategory extends Model
{
    use HasFactory;
    protected $fillable = ['name','slug'];
    protected $table = 'blog_categories';
    
    public function blog(){
        return $this->hasMany(Blog::class, 'category_id');
    }
}
