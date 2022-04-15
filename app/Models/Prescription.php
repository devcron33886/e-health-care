<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prescription extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'prescriptions';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    protected $with=['doctor','patient'];

    protected $fillable = [
        'patient_id',
        'medic_one',
        'medic_two',
        'medic_three',
        'medic_four',
        'doctor_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }

    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->format('Y-m-d H:i:s');
    }
}
