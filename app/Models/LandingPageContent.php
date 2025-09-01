<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\LandingPageContent
 *
 * @property int $id
 * @property string $key
 * @property string $title
 * @property string $content
 * @property array|null $metadata
 * @property bool $is_active
 * @property int $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $updater
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|LandingPageContent newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LandingPageContent newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LandingPageContent query()
 * @method static \Illuminate\Database\Eloquent\Builder|LandingPageContent whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LandingPageContent whereIsActive($value)

 * 
 * @mixin \Eloquent
 */
class LandingPageContent extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'key',
        'title',
        'content',
        'metadata',
        'is_active',
        'updated_by',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'metadata' => 'array',
        'is_active' => 'boolean',
    ];

    /**
     * Get the user who last updated the content.
     */
    public function updater(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}