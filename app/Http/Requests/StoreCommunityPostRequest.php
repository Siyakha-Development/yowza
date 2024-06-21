<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommunityPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true; // Change as per your authorization logic
    }

    public function rules()
    {
        return [
            'user_id' => 'required|exists:users,id',
            'content' => 'required|string',
            'post_image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ];
    }
}
