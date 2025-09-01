<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\PasswordHelpTicket
 *
 * @property int $id
 * @property string $ticket_number
 * @property int $user_id
 * @property int|null $processed_by
 * @property string $status
 * @property string $reason
 * @property string|null $admin_notes
 * @property string|null $temporary_password
 * @property \Illuminate\Support\Carbon|null $resolved_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @property-read \App\Models\User|null $processor
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordHelpTicket newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordHelpTicket newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordHelpTicket query()
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordHelpTicket whereTicketNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordHelpTicket whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordHelpTicket whereStatus($value)

 * 
 * @mixin \Eloquent
 */
class PasswordHelpTicket extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'ticket_number',
        'user_id',
        'processed_by',
        'status',
        'reason',
        'admin_notes',
        'temporary_password',
        'resolved_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'resolved_at' => 'datetime',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'temporary_password',
    ];

    /**
     * Get the user who requested help.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the user who processed the ticket.
     */
    public function processor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'processed_by');
    }

    /**
     * Generate unique ticket number.
     */
    public static function generateTicketNumber(): string
    {
        do {
            $number = 'PWD-' . date('Y') . '-' . str_pad((string)random_int(1, 9999), 4, '0', STR_PAD_LEFT);
        } while (static::where('ticket_number', $number)->exists());

        return $number;
    }
}