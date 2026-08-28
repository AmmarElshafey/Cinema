<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class StoreMovieRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'release_year' => 'required|integer',
            'rating' => 'required|numeric|min:0|max:10',
             'image' => 'required|image',
        ];
    }
}