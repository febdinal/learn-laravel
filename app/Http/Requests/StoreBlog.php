<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlog extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true; // ini wajib true
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'title'         => ['required', 'min:3', 'max:255'],
            'body'          => ['required', 'min:3'],
            'user_id'       => ['required', 'exists:users,id'],
            'category_id'   => ['required', 'exists:blog_categories,id'],
        ];
    }

    /**
     * Get the validation message that apply to the request.
     * 
     * @return array
     */
    public function message() {
        return [
            'title.required'    => 'Coy.. judulnya wajib diisi.',
            'title.min'         => 'Judulnya kependekan',
            'body.required'     => 'Body harus di isi dong.',
            'body.min'          => 'Isi contentnya kependekan',
            'user_id.exists'    => 'User ini gak ada',
            'category_id.exists'=> 'Category ini gak ada',

        ];
    }
}
