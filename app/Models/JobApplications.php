<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

##Models
use App\Models\Candidates;
use App\Models\Jobs;

class JobApplications extends Model
{
    use HasFactory;

    protected $fillable = [
        'candidate_id',
        'job_id',
        'created_at_job'
    ];

    public function candidates()
    {
        return $this->belongsTo(Candidates::class, 'candidate_id');
    }

    public function job()
    {
        return $this->belongsTo(Jobs::class, 'job_id');
    }

    public function countJobApplicationsByJobId($jobId){
        return $this -> where('job_id',$jobId) -> count();
    }
}
