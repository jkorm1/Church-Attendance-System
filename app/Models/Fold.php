<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fold extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'cell_id',
        'fold_leader_id',
        'assistant_leader_id',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get the cell this fold belongs to
     */
    public function cell()
    {
        return $this->belongsTo(Cell::class);
    }

    /**
     * Get the main fold leader
     */
    public function foldLeader()
    {
        return $this->belongsTo(User::class, 'fold_leader_id');
    }

    /**
     * Get the assistant fold leader
     */
    public function assistantLeader()
    {
        return $this->belongsTo(User::class, 'assistant_leader_id');
    }

    /**
     * Get all members in this fold
     */
    public function members()
    {
        return $this->hasMany(Member::class);
    }

    /**
     * Get all attendance records for this fold
     */
    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    /**
     * Get active members only
     */
    public function activeMembers()
    {
        return $this->members()->where('status', 'active');
    }

    /**
     * Check if a user is a leader of this fold
     */
    public function isLeader(User $user)
    {
        return $user->id === $this->fold_leader_id || $user->id === $this->assistant_leader_id;
    }

    /**
     * Get attendance statistics for a specific service
     */
    public function getAttendanceStats($serviceId)
    {
        $totalMembers = $this->activeMembers()->count();
        $presentCount = $this->attendances()
            ->where('service_id', $serviceId)
            ->where('present', true)
            ->where('status', 'approved')
            ->count();
        $absentCount = $this->attendances()
            ->where('service_id', $serviceId)
            ->where('present', false)
            ->where('status', 'approved')
            ->count();

        return [
            'total_members' => $totalMembers,
            'present' => $presentCount,
            'absent' => $absentCount,
            'unmarked' => $totalMembers - $presentCount - $absentCount,
            'attendance_rate' => $totalMembers > 0 ? round(($presentCount / $totalMembers) * 100, 2) : 0,
        ];
    }

    /**
     * Get pending attendance records for approval
     */
    public function pendingAttendances()
    {
        return $this->attendances()->where('status', 'pending');
    }

    /**
     * Get approved attendance records
     */
    public function approvedAttendances()
    {
        return $this->attendances()->where('status', 'approved');
    }
} 