<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AiPrompt extends Model
{
    protected $fillable = [
        'user_id',
        'request_id',
        'prompt',
        'response',
        'status',
        'error_message',
    ];

    protected function casts(): array
    {
        return [
            'status' => 'string',
            'prompt' => 'string',
            'response' => 'string',
            'error_message' => 'string',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
