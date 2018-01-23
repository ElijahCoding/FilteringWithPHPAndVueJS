<?php

namespace App\Filters\Course;

use Illuminate\Http\Request;
use App\Filters\FiltersAbstract;
use App\Filters\Course\TypeFilter;
use App\Filters\Course\AccessFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filters\Course\DifficultyFilter;

class CourseFilters extends FiltersAbstract
{
  protected $filters = [
    'access' => AccessFilter::class,
    'difficulty' => DifficultyFilter::class,
    'type' => TypeFilter::class
  ];


}
