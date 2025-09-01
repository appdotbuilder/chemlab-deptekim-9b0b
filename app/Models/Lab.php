<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Lab
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string $location
 * @property int $capacity
 * @property array|null $operating_hours
 * @property string|null $contact_phone
 * @property string|null $contact_email
 * @property array|null $gallery
 * @property string|null $sop
 * @property string|null $rules
 * @property bool $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Equipment> $equipment
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|Lab newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Lab newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Lab query()
 * @method static \Illuminate\Database\Eloquent\Builder|Lab whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lab whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lab whereIsActive($value)
 * @method static \Database\Factories\LabFactory factory($count = null, $state = [])
 * 
 * @mixin \Eloquent
 */
class Lab extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'description',
        'location',
        'capacity',
        'operating_hours',
        'contact_phone',
        'contact_email',
        'gallery',
        'sop',
        'rules',
        'is_active',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'operating_hours' => 'array',
        'gallery' => 'array',
        'is_active' => 'boolean',
        'capacity' => 'integer',
    ];

    /**
     * Get the users associated with the lab.
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    /**
     * Get the equipment for the lab.
     */
    public function equipment(): HasMany
    {
        return $this->hasMany(Equipment::class);
    }

    /**
     * Get active equipment for the lab.
     */
    public function activeEquipment(): HasMany
    {
        return $this->hasMany(Equipment::class)->where('is_active', true);
    }
}