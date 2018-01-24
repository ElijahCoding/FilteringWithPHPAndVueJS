<?php

namespace App\Http\Controllers\Api;

use App\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CourseResource;

class CourseController extends Controller
{
  public function index(Request $request)
  {
    return new CourseResource(
      Course::with(['subjects'])->filter($request, $this->getFilters())->paginate(5)
    );
  }

  protected function getFilters()
  {
    return [];
  }
}
