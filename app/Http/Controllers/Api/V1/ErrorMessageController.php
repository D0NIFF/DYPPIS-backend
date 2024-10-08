<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ErrorMessageController extends Controller
{

    /**
     *  Return the error messages in few languages
     *
     *  @param string $field
     *  @return string[]
     */
    public static function fieldRequired(string $field) : array
    {
        /* Get a word with translates */
        $fields = json_decode(file_get_contents(config('app.texts') . '/fields.json'), true);
        if(!isset($fields[$field]))
        {
            $fields = [
                'en' => $field,
                'es' => $field,
                'fr' => $field,
                'de' => $field,
                'ru' => $field,
            ];
        }

        return [
            'en' => 'The «' . $fields['en'] . '» field is required.',
            'es' => 'El campo «' . $fields['es'] . '» es obligatorio.',
            'de' => 'Das Feld «' . $fields['de'] . '» ist erforderlich.',
            'fr' => 'Le champ «' . $fields['fr'] . '» est obligatoire.',
            'ru' => 'Поле «' . $fields['ru'] . '» является обязательным.',
        ];
    }
}
