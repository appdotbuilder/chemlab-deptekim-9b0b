<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\MaintenanceRecord
 *
 * @property int $id
 * @property int $equipment_id
 * @property int $performed_by
 * @property string $type
 * @property \Illuminate\Support\Carbon $scheduled_date
 * @property \Illuminate\Support\Carbon|null $completed_date
 * @property string $status
 * @property string $description
 * @property string|null $work_performed
 * @property string|null $findings
 * @property string|null $recommendations
 * @property float|null $cost
 * @property array|null $parts_used
 * @property array|null $photos
 * @property \Illuminate\Support\Carbon|null $next_maintenance
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Equipment $equipment
 * @property-read \App\Models\User $performer
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|MaintenanceRecord newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MaintenanceRecord newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MaintenanceRecord query()
 * @method static \Illuminate\Database\Eloquent\Builder|MaintenanceRecord whereEquipmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MaintenanceRecord whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MaintenanceRecord whereStatus($value)

 * 
 * @mixin \Eloquent
 */
class MaintenanceRecord extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'equipment_id',
        'performed_by',
        'type',
        'scheduled_date',
        'completed_date',
        'status',
        'description',
        'work_performed',
        'findings',
        'recommendations',
        'cost',
        'parts_used',
        'photos',
        'next_maintenance',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'scheduled_date' => 'datetime',
        'completed_date' => 'datetime',
        'next_maintenance' => 'datetime',
        'parts_used' => 'array',
        'photos' => 'array',
        'cost' => 'decimal:2',
    ];

    /**
     * Get the equipment being maintained.
     */
    public function equipment(): BelongsTo
    {
        return $this->belongsTo(Equipment::class);
    }

    /**
     * Get the user who performed the maintenance.
     */
    public function performer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'performed_by');
    }
}