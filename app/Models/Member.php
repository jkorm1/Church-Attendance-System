<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'gender',
        'phone',
        'status',
        'invited_by',
        'cell_id',
        'fold_id',
        'first_visit_date',
        'times_attended',
        'invitees_count',
        'planters_count',
        'date_converted',
        'last_attended',
        'notes',
    ];

    public function inviter()
    {
        return $this->belongsTo(Member::class, 'invited_by');
    }

    public function invitees()
    {
        return $this->hasMany(Member::class, 'invited_by');
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
}
