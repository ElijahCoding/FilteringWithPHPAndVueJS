<?php

namespace App\Filters\Course;

use Illuminate\Database\Eloquent\Builder;
use App\Filters\FilterAbstract;

class AccessFilter extends FilterAbstract
{
    public function filter(Builder $builder, $value)
    {
      $value = ($value === 'free' ? true : false);

      return $builder->where('free', $value);
    }
}
