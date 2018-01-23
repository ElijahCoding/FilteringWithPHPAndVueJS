<?php

namespace App;

use App\Filters\Course\CourseFilters;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Course extends Model
{
    protected $guarded = [];

    public function scopeFilter(Builder $builder, $request, $filters)
    {
      return (new CourseFilters($request))->add($filters)->filter($builder);
    }

    public function subjects()
    {
      return $this->morphToMany(Subject::class, 'subjectable');
    }
}
