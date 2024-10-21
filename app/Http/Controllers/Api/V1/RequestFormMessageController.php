<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RequestFormMessageController extends Controller
{

    /**
     *  Return the error messages in few languages
     *
     *  @param string $field
     *  @return string[]
     */
    public static function fieldRequired(string $field) : array
    {
        return [
            'en' => 'The «' . $field . '» field is required.',
            'es' => 'El campo «' . $field . '» es obligatorio.',
            'de' => 'Das Feld «' . $field . '» ist erforderlich.',
            'fr' => 'Le champ «' . $field . '» est obligatoire.',
            'ru' => 'Поле «' . $field . '» является обязательным.',
        ];
    }


    /**
     *  Return field exists message in few languages
     *
     *  @param string $field
     *  @return string[]
     */
    public static function fieldExists(string $field) : array
    {
        return [
            'en' => 'The selected «' . $field . '» is invalid..',
            'es' => 'El id de la «' . $field . '» seleccionada no es válido.',
            'de' => 'Die ausgewählte «' . $field . '» ist ungültig.',
            'fr' => 'L\'identifiant de «' . $field . '» sélectionnée n\'est pas valide.',
            'ru' => 'Выбранный «' . $field . '» недопустим.',
        ];
    }


    /**
     *  Return field exists message in few languages
     *
     *  @param string $field
     *  @return string[]
     */
    public static function fieldUuid(string $field) : array
    {
        return [
            'en' => 'The «' . $field . '» field must be a valid UUID.',
            'es' => 'El campo «' . $field . '» debe ser un UUID válido.',
            'de' => 'Das Feld «' . $field . '» muss eine gültige UUID sein.',
            'fr' => 'Le champ «' . $field . '» doit être un UUID valide.',
            'ru' => 'Поле «' . $field . '» должно быть действительным UUID.',
        ];
    }

    /**
     *  Return field unique message in few languages
     *
     *  @param string $field
     *  @return string[]
     */
    public static function fieldUnique(string $field) : array
    {
        return [
            'en' => 'The «' . $field . '» field must be a valid UUID.',
            'es' => 'La «' . $field . '» ya ha sido tomada.',
            'de' => 'Der «' . $field . '» ist bereits vergeben.',
            'fr' => 'La «' . $field . '» a déjà été prise.',
            'ru' => 'Поле «' . $field . '» уже занято.',
        ];
    }
}
