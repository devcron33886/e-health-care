<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const APPOINTMENT_STATUS_SELECT = [
        '0' => 'Pending',
        '1' => 'Completed',
        '2' => 'Cancelled',
    ];

    public $table = 'appointments';

    protected $with=['doctor'];

    protected $dates = [
        'appointment_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'patient_id',
        'appointment_date',
        'appointment_status',
        'doctor_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }

    public function getAppointmentDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setAppointmentDateAttribute($value)
    {
        $this->attributes['appointment_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
