<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Loan
 *
 * @property int $id
 * @property string $loan_number
 * @property int $user_id
 * @property int $equipment_id
 * @property int|null $approved_by
 * @property string $status
 * @property string $purpose
 * @property \Illuminate\Support\Carbon $requested_start
 * @property \Illuminate\Support\Carbon $requested_end
 * @property \Illuminate\Support\Carbon|null $actual_start
 * @property \Illuminate\Support\Carbon|null $actual_end
 * @property string|null $jsa_document
 * @property string|null $initial_condition
 * @property string|null $return_condition
 * @property array|null $initial_photos
 * @property array|null $return_photos
 * @property string|null $initial_notes
 * @property string|null $return_notes
 * @property string|null $rejection_reason
 * @property float $penalty_amount
 * @property bool $penalty_paid
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @property-read \App\Models\Equipment $equipment
 * @property-read \App\Models\User|null $approver
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|Loan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Loan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Loan query()
 * @method static \Illuminate\Database\Eloquent\Builder|Loan whereLoanNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Loan whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Loan whereEquipmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Loan whereStatus($value)

 * 
 * @mixin \Eloquent
 */
class Loan extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'loan_number',
        'user_id',
        'equipment_id',
        'approved_by',
        'status',
        'purpose',
        'requested_start',
        'requested_end',
        'actual_start',
        'actual_end',
        'jsa_document',
        'initial_condition',
        'return_condition',
        'initial_photos',
        'return_photos',
        'initial_notes',
        'return_notes',
        'rejection_reason',
        'penalty_amount',
        'penalty_paid',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'requested_start' => 'datetime',
        'requested_end' => 'datetime',
        'actual_start' => 'datetime',
        'actual_end' => 'datetime',
        'initial_photos' => 'array',
        'return_photos' => 'array',
        'penalty_amount' => 'decimal:2',
        'penalty_paid' => 'boolean',
    ];

    /**
     * Get the user who made the loan.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the equipment being loaned.
     */
    public function equipment(): BelongsTo
    {
        return $this->belongsTo(Equipment::class);
    }

    /**
     * Get the user who approved the loan.
     */
    public function approver(): BelongsTo
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    /**
     * Check if loan is overdue.
     */
    public function isOverdue(): bool
    {
        return $this->status === 'diambil' && 
               $this->requested_end < now();
    }

    /**
     * Check if loan is active.
     */
    public function isActive(): bool
    {
        return in_array($this->status, ['disetujui_laboran', 'diambil']);
    }

    /**
     * Generate unique loan number.
     */
    public static function generateLoanNumber(): string
    {
        do {
            $number = 'LOAN-' . date('Y') . '-' . str_pad((string)random_int(1, 9999), 4, '0', STR_PAD_LEFT);
        } while (static::where('loan_number', $number)->exists());

        return $number;
    }
}