<?php

namespace App\Utils;

use Illuminate\Support\Facades\File;

class ErrorMessages
{
    protected static $messages;

    /**
     *  Get error messages for a given key and substitute the field
     *
     *  @param string $key
     *  @param array|null $data
     *  @return array
     */
    public static function generate(string $key, array|null $data = []): array
    {
        if (self::$messages === null) {
            $path = resource_path('lang/error_messages.json');
            self::$messages = json_decode(File::get($path), true);
        }

        if (!isset(self::$messages[$key])) {
            return [
                'en' => 'Message not found',
                'es' => 'Mensaje no encontrado',
                'de' => 'Nachricht nicht gefunden',
                'fr' => 'Message non trouvé',
                'it' => 'Messaggio non trovato',
                'ru' => 'Сообщение не найдено'
            ];
        }

        return array_map(function($message) use ($data) {
            if ($data) {
                foreach ($data as $key => $value) {
                    $message = str_replace('{' . $key . '}', $value, $message);
                }
            }
            return $message;
        }, self::$messages[$key]);
    }
}
