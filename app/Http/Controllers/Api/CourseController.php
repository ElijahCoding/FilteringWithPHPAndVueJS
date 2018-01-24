<?php

namespace App\Http\Controllers\Api;

use App\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CourseResource;
use App\Filters\Course\CourseFilters;

class CourseController extends Controller
{
  public function index(Request $request)
  {
    return new CourseResource(
      Course::with(['subjects','users'])->filter($request, $this->getFilters())->paginate(5)
    );
  }

  public function filters()
  {
    // return CourseFilters::mappings();
    return response()->json([
      'data' => CourseFilters::mappings()
    ], 200);
  }

  protected function getFilters()
  {
    return [];
  }
}
