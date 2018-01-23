<?php

namespace App\Filters\Course;

use Illuminate\Database\Eloquent\Builder;
use App\Filters\FilterAbstract;

class AccessFilter extends FilterAbstract
{
    public function mappings()
    {
      return [
        'free' => true,
        'premium' => false
      ];
    }

    public function filter(Builder $builder, $value)
    {
      // $value = ($value === 'free' ? true : false);
      $value = $this->resolveFilterValue($value);

      if ($value === null) {
        return $builder;
      }
      

      return $builder->where('free', $value);
    }

}
