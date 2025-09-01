<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Equipment
 *
 * @property int $id
 * @property int $lab_id
 * @property string $name
 * @property string $code
 * @property string $category
 * @property string|null $description
 * @property array|null $specifications
 * @property string|null $brand
 * @property string|null $model
 * @property string|null $serial_number
 * @property int|null $purchase_year
 * @property float|null $purchase_price
 * @property string $condition
 * @property string $status
 * @property string|null $location
 * @property int $max_loan_duration
 * @property string|null $min_competency_level
 * @property array|null $photos
 * @property string|null $manual_url
 * @property string|null $sop
 * @property string|null $qr_code
 * @property array|null $maintenance_schedule
 * @property bool $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Lab $lab
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Loan> $loans
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\MaintenanceRecord> $maintenanceRecords
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|Equipment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Equipment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Equipment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Equipment whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Equipment whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Equipment whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Equipment whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Equipment whereLabId($value)
 * @method static \Database\Factories\EquipmentFactory factory($count = null, $state = [])
 * 
 * @mixin \Eloquent
 */
class Equipment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'lab_id',
        'name',
        'code',
        'category',
        'description',
        'specifications',
        'brand',
        'model',
        'serial_number',
        'purchase_year',
        'purchase_price',
        'condition',
        'status',
        'location',
        'max_loan_duration',
        'min_competency_level',
        'photos',
        'manual_url',
        'sop',
        'qr_code',
        'maintenance_schedule',
        'is_active',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'specifications' => 'array',
        'photos' => 'array',
        'maintenance_schedule' => 'array',
        'is_active' => 'boolean',
        'max_loan_duration' => 'integer',
        'purchase_price' => 'decimal:2',
    ];

    /**
     * Get the lab that owns the equipment.
     */
    public function lab(): BelongsTo
    {
        return $this->belongsTo(Lab::class);
    }

    /**
     * Get the loans for the equipment.
     */
    public function loans(): HasMany
    {
        return $this->hasMany(Loan::class);
    }

    /**
     * Get the maintenance records for the equipment.
     */
    public function maintenanceRecords(): HasMany
    {
        return $this->hasMany(MaintenanceRecord::class);
    }

    /**
     * Check if equipment is available for loan.
     */
    public function isAvailable(): bool
    {
        return $this->status === 'available' && $this->is_active;
    }

    /**
     * Get current active loan if any.
     */
    public function currentLoan()
    {
        return $this->loans()
            ->whereIn('status', ['disetujui_laboran', 'diambil'])
            ->first();
    }
}