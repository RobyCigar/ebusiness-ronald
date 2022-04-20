<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Attendance extends Model
{
    use HasFactory;

    public $table = 'attendances';

    protected $fillable = [
        'time_start', 'time_end', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeFilter($query, $filters)
    {
        if ($month = $filters['month']) {
            $query->whereMonth('date', Carbon::parse($month)->month);
        }

        if ($year = $filters['year']) {
            $query->whereYear('date', $year);
        }
    }


}
