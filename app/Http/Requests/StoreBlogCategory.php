<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogCategory extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'name' => ['required' , 'min:3'],
            'slug' => ['required', 'min:3'],
        ];
    }

    /**
     * Get the validation message that apply to the request.
     * 
     * @return array
     */
    public function message(){
        return [
            'name.required' => 'Nama Harus Diisi',
            'slug.required' => 'Slug Harus Diisi'
        ];
    }
}