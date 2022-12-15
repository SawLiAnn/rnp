<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'project_type',
        'project_name',
        'student',
        'supervisor',
        'examiner1',
        'examiner2',
        'start_date',
        'end_date',
        'duration',
        'project_progress',
        'project_status',
    ];
}
