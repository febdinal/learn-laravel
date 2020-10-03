<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory, SoftDeletes;
    /** CATATAN :
     * Trait SoftDeletes digunakan untuk memberikan fitur mirip dengan recycle bin atau trash di CMS Seperti wordpress.
     * 
     */
    protected $dates=['deleted_at'];
    /**
     * CATATAN :
     * Vatiable $dates diisi apabila nama kolom dari table bukan 'deleted_at', 'created_at' atau 'updated_at'
     * Misalnya : 
     */
    protected $fillable= ['title','body','user_id','category_id'];
    
    public function category(){
        return $this->belongsTo(BlogCategory::class,'category_id');
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

}
