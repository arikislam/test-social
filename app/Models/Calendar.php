<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Calendar extends Model
{
    use SoftDeletes;
    
    // Define the fields that can be mass-assigned
    protected $fillable = ['user_id', 'keyword_id', 'date', 'time', 'topic_outline', 'content_body', 'content_title', 'platform'];

    protected $dates=[
      'date'
    ];

    // Define the relationships to other models
    public function user(): BelongsTo
    {
        return $this->belongsTo('App\Models\User');
    }

    public function keyword(): BelongsTo
    {
        return $this->belongsTo('App\Models\Keyword');
    }
}