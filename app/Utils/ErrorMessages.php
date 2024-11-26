<?php

namespace App\Utils;

use Illuminate\Support\Facades\File;

class ErrorMessages
{
    protected static $messages;

//    public function __construct()
//    {
//        $path = resource_path('lang/error_messages.json');
//        self::$messages = json_decode(File::get($path), true);
//    }
//
//    /**
//     *  Get error messages for a given key and substitute the field
//     *
//     *  @param string $key
//     *  @param string $field
//     *  @return array
//     */
//    public function getMessages(string $key, string $field)
//    {
//        if (!isset($this->messages[$key])) {
//            return ['en' => 'Message not found'];
//        }
//
//        $response = array_map(function($message) use ($field) {
//            return str_replace('{field}', $field, $message);
//        }, $this->messages[$key]);
//
//        return $response;
//    }

    /**
     *  Get error messages for a given key and substitute the field
     *
     *  @param string $key
     *  @param string $field
     *  @return array
     */
    public static function getMessages(string $key, string $field)
    {
        if (self::$messages === null) {
            $path = resource_path('lang/error_messages.json');
            self::$messages = json_decode(File::get($path), true);
        }

        if (!isset(self::$messages[$key])) {
            return ['en' => 'Message not found'];
        }

        $response = array_map(function($message) use ($field) {
            return str_replace('{field}', $field, $message);
        }, self::$messages[$key]);

        return $response;
    }
}
