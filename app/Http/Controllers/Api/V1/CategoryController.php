<?php

namespace App\Http\Controllers\Api\V1;

use Validator;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Services\CategoryService;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{

    private $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * @OA\Get(
     ** path="/v1/category/",
     *   tags={"Category"},
     *  security={
     *  {"passport": {}},
     *   },
     *   summary="Category Listing",
     *   operationId="Category",
     *  
     *    @OA\Parameter(
     *      name="limit",
     *      in="query",
     *      required=false,
     *      @OA\Schema(
     *           type="integer"
     *      )
     *   ),
     * *    @OA\Parameter(
     *      name="page",
     *      in="query",
     *      required=false,
     *      @OA\Schema(
     *           type="integer"
     *      )
     *   ),
     * *    @OA\Parameter(
     *      name="search",
     *      in="query",
     *      required=false,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     * 
     *   @OA\Response(
     *      response=200,
     *       description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   ),
     * 
     *   @OA\Response(
     *      response=401,
     *       description="Unauthenticated"
     *   ),
     *)
     **/
    /**
     * Category detail api
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $categories = $this->categoryService->collection($request->all());
        return response()->json(['success' => $categories])->setStatusCode(Response::HTTP_OK);
    }
    /**
     * @OA\Post(
     ** path="/v1/category",
     *   tags={"Category"},
     *   summary="Category",
     *   operationId="Category",
     *    security={
     *    {"passport": {}},
     *    },
     *   @OA\Parameter(
     *      name="name",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *    @OA\Parameter(
     *     name="image",
     *     in="query",
     *     description="Category Images",
     *     required=true,
     *    @OA\Schema(type="array", @OA\Items(type="file")),
     *   ),
     *  
     *   @OA\Response(
     *      response=200,
     *       description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   ),
     *   @OA\Response(
     *      response=401,
     *       description="Unauthenticated"
     *   ),
     *   @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     *   @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *)
     **/
    /**
     * Category Create Api
     *
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
       
        $validator = Validator::make($request->all(), [
            'name' =>  ['required', 'max:64'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:1024']
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        $category =  $this->categoryService->store($request->all());
        return response()->json(['success' => $category])->setStatusCode(Response::HTTP_OK);
    }

    /**
     * @OA\Get(
     ** path="/v1/category/{id}",
     *   tags={"Category"},
     *   summary="Category Detail",
     *   operationId="Category",
     *
     *   @OA\Parameter(
     *      name="id",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="integer"
     *      )
     *   ),
     *  
     *   @OA\Response(
     *      response=200,
     *       description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   ),
     *   @OA\Response(
     *      response=401,
     *       description="Unauthenticated"
     *   ),
     *   @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     *   @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *)
     **/
    /**
     * Category detail api
     *
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $category =  $this->categoryService->resource($id);
        return response()->json(['success' => $category])->setStatusCode(Response::HTTP_OK);
    }

    /**
     * @OA\Put(
     ** path="/v1/category/{id}",
     *   tags={"Category"},
     *   summary="Category Update",
     *   operationId="CategoryUpdate",
     *
     *   @OA\Parameter(
     *      name="name",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="id",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="integer"
     *      )
     *   ),
     *  
     *   @OA\Response(
     *      response=200,
     *       description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   ),
     *   
     *)
     **/
    /**
     * Category Update Api
     *
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' =>  ['required', 'max:64'],
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        $category =  $this->categoryService->update($id, $request->all());
        return response()->json(['success' => $category])->setStatusCode(Response::HTTP_OK);
    }

    /**
     * @OA\Delete(
     ** path="/v1/category/{id}",
     *   tags={"Category"},
     *   summary="Category Delete",
     *   operationId="CategoryDelete",
     * 
     * *   @OA\Parameter(
     *      name="id",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="integer"
     *      )
     *   ),
     *  
     *   @OA\Response(
     *      response=200,
     *       description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   ),
     *   @OA\Response(
     *      response=401,
     *       description="Unauthenticated"
     *   ),
     *   @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     *   @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *)
     **/
    /**
     * Category Update Api
     *
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $category =  $this->categoryService->delete($id);
        return response()->json(['success' => $category])->setStatusCode(Response::HTTP_OK);
    }
}
