<?php

namespace App\Traits;


    // Listing Annotation
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
     * * *     @OA\Parameter(   
     *      name="sort[order]",
     *      in="query",
     *      required=false,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *  *   @OA\Parameter(
     *      name="sort[by]",
     *      in="query",
     *      required=false,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
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
     * Category Listing api
     *
     * @return \Illuminate\Http\Response
     */

     /**
     * @OA\Post(
     ** path="/v1/category",
     *   tags={"Category"},
     *   summary="Category Store",
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

       /**
     * @OA\Get(
     ** path="/v1/category/{id}",
     *   tags={"Category"},
     *   summary="Category Detail",
     *   operationId="Category",
     * *  security={
     *  {"passport": {}},
     *   },
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
      
      /**
     * @OA\Put(
     ** path="/v1/category/{id}",
     *   tags={"Category"},
     *   summary="Category Update",
     *   operationId="CategoryUpdate",
     *    *  security={
     *  {"passport": {}},
     *   },
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

      /**
     * @OA\Delete(
     ** path="/v1/category/{id}",
     *   tags={"Category"},
     *   summary="Category Delete",
     *   operationId="CategoryDelete",
     *    *  security={
     *  {"passport": {}},
     *   },
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

trait CategoryAnnotation {

}
