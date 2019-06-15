<?php

namespace App\Http\Requests;

use App\Package;
use Illuminate\Foundation\Http\FormRequest;

class AdminPackageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [];

        switch($this->method())
        {
            case 'GET': break;
            case 'DELETE':break;
            case 'POST':
                {
                    $rules = [
                        'name' => 'required|min:6|max:255',
                        'status' => 'required|in:'.Package::STATUS_PENDING.','.Package::STATUS_CONFIRMED.','.Package::STATUS_DELIVERED,
                        'user_id' => 'exists:users,id'
                    ];
                }
                break;
            case 'PUT':
            case 'PATCH':
                {
                    $rules = [
                        'name' => 'required|min:6|max:255',
                        'status' => 'required|in:'.Package::STATUS_PENDING.','.Package::STATUS_CONFIRMED.','.Package::STATUS_DELIVERED,
                        'user_id' => 'exists:users,id'
                    ];
                }
                break;
            default:break;
        }
        return $rules;
    }

}
