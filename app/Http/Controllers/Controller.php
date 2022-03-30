<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;



class Controller extends BaseController
{

/**
 * @OA\OpenApi(
 *  @OA\Info(
 *      title="Returns Services API",
 *      version="1.0.0",
 *      description="API documentation for Returns Service App",
 *      @OA\Contact(
 *          email="admin@stepfront.com"
 *      )
 *  ),
 *  @OA\Server(
 *      description="Returns App API",
 *      url="http://127.0.0.1:8000/api/"
 *  ),
 *  @OA\PathItem(
 *      path="/"
 *  )
 * )
 */


    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
