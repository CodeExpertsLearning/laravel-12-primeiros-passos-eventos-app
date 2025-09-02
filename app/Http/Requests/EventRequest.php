<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'title' => ['required', 'min:10'],
            'description' => ['nullable', 'min:10'],
            'body' => ['required', 'min:50'],
            'slug' => ['required', 'unique:events,slug,' . $this->event . ',id'],
            'start_event' => ['required'],
            'end_event'  => ['required']
        ];
    }

    public function messages()
    {
        return [
            // 'title.required' => 'Este título é obrigatório!',
            'required' => 'Este campo é obrigatório!',
            'min' => 'Este campo precisa ter no mínimo :min caracteres',
            'unique' => 'Este slug já está sendo utilizado!'
        ];
    }
}
