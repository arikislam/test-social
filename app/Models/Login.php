<?php

namespacePHP App\Models;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'ip_address', 'full_utm', 'utm_source', 'utm_medium', 'utm_campaign',
    ];

    /**
     * Get the user that owns the login.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}