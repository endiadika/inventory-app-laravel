<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateBarangRequest extends FormRequest
{
   
    public function rules()
    {
        return [
            'name' => [
                'required', 'string',
            ],
            'kategori' => [
                'required', 'decimal',
            ],
            'harga' => [
                'required', 'string',
            ],
            'stock' => [
                'required', 'string',
            ],
           
        ];
    }

    public function authorize()
    {
        return Gate::allows('task_access');
    }
}

