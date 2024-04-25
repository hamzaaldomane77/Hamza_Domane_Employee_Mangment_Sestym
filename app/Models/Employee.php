<?php

namespace App\Models;

use App\Models\Project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable=[
        'first_name',
        'last_name',
        'email', 
        'password',
        'department_id',
        'position',
    ];

    public function getFullNameAttribute(){
        return $this->first_name.' '.$this->last_name;
    }

    public function setFirstNameAttribute($value) {
        $this->attributes['first_name'] = ucfirst($value);
    }

    public function projects(){
        return $this->belongsToMany(Project::class);
    }

    public function notes():MorphMany {
        return $this->morphMany(Note::class, 'noteable');
    }
}
