<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class PressureRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()){
            case 'POST':
                return [
                    'sp' => 'required|numeric',
                    'dp' => 'required|numeric',
                ];
                break;
            case 'PATCH':
                return [
                    'sp' => 'required|numeric',
                    'dp' => 'required|numeric',
                ];
                break;
        }

    }

    public function attributes()
    {
        return [
            'sp' => '收缩压',
            'dp' => '舒张压'
        ];
    }
}
