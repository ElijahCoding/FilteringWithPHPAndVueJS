<?php

namespace App\Filters;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

abstract class FiltersAbstract
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
