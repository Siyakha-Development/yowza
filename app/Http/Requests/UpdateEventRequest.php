<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEventRequest extends FormRequest
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
            'title' => 'required',
            'description' => 'required|string',
            'location' => 'required|in:Johannesburg (Gauteng),Cape Town (Western Cape),Durban (KwaZulu-Natal),Pretoria (Gauteng),Port Elizabeth (Eastern Cape),Bloemfontein (Free State),Kimberley (Northern Cape),Nelspruit (Mpumalanga),Pietermaritzburg (KwaZulu-Natal),Welkom (Free State),Rustenburg (North West),Vereeniging (Gauteng),Tembisa (Gauteng),Benoni (Gauteng),Middelburg (Mpumalanga),George (Western Cape),Newcastle (KwaZulu-Natal),Klerksdorp (North West),Carletonville (Gauteng),Uitenhage (Eastern Cape),Krugersdorp (Gauteng)',
            'event_type' => 'required|in:online,physical',
            'start_time' => 'nullable|date',
            'end_time' => 'nullable|date|after_or_equal:start_time',
            'event_date' => 'nullable|date',
            'event_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'The title is required.',
            'description.required' => 'The description is required.',
            'location.required' => 'The location is required.',
            'location.in' => 'The selected location is invalid.',
            'event_type.required' => 'The event type is required.',
            'event_type.in' => 'The selected event type is invalid.',
            'start_time.date_format' => 'The start time does not match the required format Y-m-d H:i:s.',
            'end_time.date_format' => 'The end time does not match the required format Y-m-d H:i:s.',
            'event_date.date_format' => 'The event date does not match the required format Y-m-d.',
            'event_image.image' => 'The event image must be an image file.',
            'event_image.mimes' => 'The event image must be a file of type: jpeg, png, jpg, gif, svg.',
            'event_image.max' => 'The event image may not be greater than 2MB.'
        ];
    }
}
