<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee_Service extends Model
{
    use HasFactory;
    protected $table = 'employee_service';
    public $timestamps = false;
}
