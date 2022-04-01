<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Services\CategoryService;
use App\Traits\CategoryAnnotation;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\Upsert;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{

    private $categoryService;

    use CategoryAnnotation;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index(Request $request)
    {
        $categories = $this->categoryService->collection($request->all());
        return response()->json(['success' => $categories])->setStatusCode(Response::HTTP_OK);
    }

    public function store(Upsert $request)
    {
        $category =  $this->categoryService->store($request->all());
        return response()->json(['success' => $category])->setStatusCode(Response::HTTP_OK);
    }

    public function show($id)
    {
        $category =  $this->categoryService->resource($id);
        return response()->json(['success' => $category])->setStatusCode(Response::HTTP_OK);
    }

    public function update(Upsert $request, $id)
    {
        $category =  $this->categoryService->update($id, $request->all());
        return response()->json(['success' => $category])->setStatusCode(Response::HTTP_OK);
    }

    public function destroy($id)
    {
        $category =  $this->categoryService->delete($id);
        return response()->json(['success' => $category])->setStatusCode(Response::HTTP_OK);
    }
}
