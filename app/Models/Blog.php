<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable= ['title','body','user_id','category_id'];
    
    public function category(){
        return $this->belongsTo(BlogCategory::class,'category_id');
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

}
