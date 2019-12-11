<?php

namespace App\Http\Requests\Panel\Music\Artist;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSongRequest extends FormRequest
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

        $rules = [
            'name'      => 'required|array',
            'duration' => 'nullable',
            'lyrics'  => 'nullable',

        ];
        foreach (config('app.locales') as $locale) {
            $rules["name.{$locale}"] = 'required|string|min:2|max:191';
        }
        return $rules;
    }
}
