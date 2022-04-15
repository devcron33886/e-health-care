<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const STATUS_SELECT = [
        '0' => 'Pending',
        '1' => 'Paid',
    ];

    public $table = 'payments';

    protected $dates = [
        'start_from',
        'active_until',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'patient_id',
        'amount',
        'mobile',
        'start_from',
        'active_until',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }

    public function getStartFromAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setStartFromAttribute($value)
    {
        $this->attributes['start_from'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getActiveUntilAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setActiveUntilAttribute($value)
    {
        $this->attributes['active_until'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
