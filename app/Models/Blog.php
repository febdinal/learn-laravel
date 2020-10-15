<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model {
    use HasFactory, SoftDeletes;
    /** CATATAN :
     * Trait SoftDeletes digunakan untuk memberikan fitur mirip dengan recycle bin atau trash di CMS Seperti wordpress.
     * Apabila SoftDeletes di tambahkan pada sebuah model seperti di contoh model ini,
     * maka setiap data yang di hapus tidak akan langsung terhapus, melainkan akan ditambahkan tanggal pada kolom 'deleted_at'
     * 
     */
    protected $dates = ['deleted_at'];

    /**
     * CATATAN :
     * Variable $dates diisi apabila nama kolom dari table bukan 'deleted_at', 'created_at' atau 'updated_at'
     * Misalnya : 
     */
    protected $fillable = [ 'title', 'body', 'user_id', 'category_id' ];

    /**
    * Relationship between Blog and BlogCategory
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function category() {
        return $this->belongsTo(BlogCategory::class, 'category_id');
    }

    /**
    * Relationship between Blog and User
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function user() {
        return $this->belongsTo(User::class);
    }

}
