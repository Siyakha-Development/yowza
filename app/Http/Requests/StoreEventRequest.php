<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|unique:events|max:255',
            'description' => 'required|string',
            'location' => 'required|in:' . implode(',', [
                    'Johannesburg (Gauteng)',
                    'Cape Town (Western Cape)',
                    'Durban (KwaZulu-Natal)',
                    'Pretoria (Gauteng)',
                    'Port Elizabeth (Eastern Cape)',
                    'Bloemfontein (Free State)',
                    'Kimberley (Northern Cape)',
                    'Nelspruit (Mpumalanga)',
                    'Pietermaritzburg (KwaZulu-Natal)',
                    'Welkom (Free State)',
                    'Rustenburg (North West)',
                    'Vereeniging (Gauteng)',
                    'Tembisa (Gauteng)',
                    'Benoni (Gauteng)',
                    'Middelburg (Mpumalanga)',
                    'George (Western Cape)',
                    'Newcastle (KwaZulu-Natal)',
                    'Klerksdorp (North West)',
                    'Carletonville (Gauteng)',
                    'Uitenhage (Eastern Cape)',
                    'Krugersdorp (Gauteng)',
                ]),
            'event_type' => 'required|in:online,physical',
            'start_time' => 'nullable|date_format:Y-m-d H:i:s',
            'end_time' => 'nullable|date_format:Y-m-d H:i:s|after_or_equal:start_time',
            'event_date' => 'nullable|date',
            'event_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'required|string|max:255',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'The title is required.',
            'title.string' => 'The title must be a string.',
            'title.unique' => 'The title has already been taken.',
            'title.max' => 'The title must not be greater than 255 characters.',
            'description.required' => 'The description is required.',
            'description.string' => 'The description must be a string.',
            'location.required' => 'The location is required.',
            'location.in' => 'The selected location is invalid.',
            'event_type.required' => 'The event type is required.',
            'event_type.in' => 'The selected event type is invalid.',
            'start_time.date_format' => 'The start time must be a valid date and time.',
            'end_time.date_format' => 'The end time must be a valid date and time.',
            'end_time.after_or_equal' => 'The end time must be a date and time after or equal to the start time.',
            'event_date.date' => 'The event date must be a valid date.',
            'event_image.image' => 'The event image must be an image.',
            'event_image.mimes' => 'The event image must be a file of type: jpeg, png, jpg, gif.',
            'event_image.max' => 'The event image must not be greater than 2048 kilobytes.',
            'category.required' => 'The category is required.',  // Add this line
            'category.string' => 'The category must be a string.',  // Add this line
            'category.max' => 'The category must not be greater than 255 characters.',  // Add this line
        ];
    }
}
