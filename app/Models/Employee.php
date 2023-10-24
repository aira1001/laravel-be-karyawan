<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'phone',
        'address',
        'division_id',
        'job_id',
        'salary',
        'status',
    ];
    public function job()
    {
        return $this->belongsTo(Job::class);
    }
    public function division()
    {
        return $this->belongsTo(Division::class);
    }
}
