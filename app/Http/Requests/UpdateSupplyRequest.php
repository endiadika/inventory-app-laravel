<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateSupplyRequest extends FormRequest
{
    
    public function rules()
    {
        return [
            'name' => [
                'required', 'string',
            ],
            'telp' => [
                'required', 'decimal',
            ],
            'alamat' => [
                'required', 'string',
            ],
            'barang' => [
                'required', 'string',
            ],
        ];
    }

    public function authorize()
    {
        return Gate::allows('task_access');
    }
}
