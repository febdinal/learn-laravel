<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Resource digunakan untuk menampilkan response data satuan
 */
class BlogResource extends JsonResource {
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request) {
        // return parent::toArray($request);
        return [
            'title'     => $this->title,
            'content'   => $this->body,
            'user'      => $this->user->name,
            'category'  => $this->category->name,
        ];
    }
}
