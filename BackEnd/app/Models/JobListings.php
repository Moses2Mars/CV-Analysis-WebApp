<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobListings extends Model
{
    use HasFactory;
    protected $table = 'job_listings';
    protected $hidden = ["created_at", "updated_at"];
}
