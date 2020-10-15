<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * Resource digunakan untuk menampilkan banyak data (koleksi)
 */
class BlogCollection extends ResourceCollection {
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request) {
        // return parent::toArray($request);
        return $this->collection;
    }

    /** 
     * variable $collects digunakan untuk mengambil data dari class Resource.
     * Contoh di kasus ini adalah BlogCollection dan BlogResource
     * Agar BlogCollection bisa mengambil semua data yang di return oleh BlogResource maka perlu mendefinisikan variable $collects seperti dibawah ini.
     * 
     * Kasus seperti ini biasanya ketika kita tidak menggunakan convension name dari laravel
     */
    public $collects = 'App\Http\Resources\BlogResource';
}
