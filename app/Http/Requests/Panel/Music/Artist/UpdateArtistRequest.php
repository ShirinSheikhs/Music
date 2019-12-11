<?php

namespace App\Http\Requests\Panel\Music\Artist;

use Illuminate\Foundation\Http\FormRequest;

class UpdateArtistRequest extends FormRequest
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

        $rules= [
               'name'=>'required|array',
                'biography'=>'nullable|min:10|max:1000',
                'birthday'=>'nullable|date_format:Y-m-d',

          ];
        foreach (config('app.locales') as $locale){
            $rules["name.{$locale}"]='required|string|min:2|max:191';
        }
           return  $rules;
    }
}
