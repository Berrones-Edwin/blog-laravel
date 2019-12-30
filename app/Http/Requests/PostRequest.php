<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
        return [
            "name"        => "required|string",
            "user_id"     => "required|integer",
            "category_id" => "required|integer",
            "tags"        =>"required|array",
            "body"        => "required|string",
            "status"      => "required|in:DRAFT,PUBLISHED",
            "file"        => "mimes:jpg,jpeg,png",
        ];
    }
}
