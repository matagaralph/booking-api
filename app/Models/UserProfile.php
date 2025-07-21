<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserProfile extends Model {
    protected $fillable = [
        'user_id',
        'invoice_address',
        'invoice_postcode',
        'invoice_city',
        'invoice_country_id',
        'gender',
        'birth_date',
        'nationality_country_id',
        'description',
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
