<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileAws extends Model
{
    use HasFactory;
    protected $table="file_aws";
    protected $fillable=[
        'foto',
        'created_at',
        'updated_at'
    ];
}
