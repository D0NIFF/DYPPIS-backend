<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MediaStorage extends Model
{
    protected $fillable = [
        'id',
        'file_name',
        'file_type',
        'file_size',
        'category_id',
        'created_at',
    ];

    protected function casts(): array
    {
        return [
            'file_name' => 'string',
            'file_type' => 'string',
            'file_size' => 'integer',
            'category_id' => 'string',
            'created_at' => 'datetime',
        ];
    }

    public function getCategory() : \DB
    {
        return \DB::table("media_storage_categories")->where('id', '=', $this['category_id'])
            ->first();
    }
}
