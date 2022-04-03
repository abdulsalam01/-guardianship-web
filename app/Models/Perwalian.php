<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Perwalian extends Model
{
    use HasFactory;

    protected $table = "guardians";

    protected $fillable = [
        'user_id', 'subject', 'semester', 'year', 'status'
    ];

    /**
     * Get all of the users for the Perwalian
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id')->withDefault([
            'id' => -1,
            'name' => '-'
        ]);
    }

    public function semester() {
        return Attribute::make(
            get: fn ($value, $attributes) => $value === 1 ? 'Ganjil' : 'Genap',
            set: fn ($value) => $value,
        );
    }
}
