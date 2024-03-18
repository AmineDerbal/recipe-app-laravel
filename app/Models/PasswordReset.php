<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
    use HasFactory;

    // Define the table associated with the model
    protected $table = 'password_resets';

    // Specify the columns that are fillable
    protected $fillable = [
        'email', 'token', 'created_at'
    ];

    // Disable timestamps
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'email', 'email');
    }
}
