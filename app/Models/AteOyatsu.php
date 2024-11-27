<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AteOyatsu extends Model
{
    protected $fillable = [
        'oyatsu_id',
        'ate_at',
    ];

    public function oyatsu()
    {
        return $this->belongsTo(Oyatsu::class);
    }

    protected function casts()
    {
        return [
            'ate_at' => 'datetime',
        ];
    }
}
