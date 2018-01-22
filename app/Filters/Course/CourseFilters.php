<?php

namespace App\Filters\Course;

use Illuminate\Http\Request;
use App\Filters\FiltersAbstract;
use Illuminate\Database\Eloquent\Builder;

class CourseFilters extends FiltersAbstract
{
  protected $request;

  public function __construct(Request $request)
  {
    $this->request = $request;
  }

  public function filter(Builder $builder)
  {
    return $builder;
  }
}
