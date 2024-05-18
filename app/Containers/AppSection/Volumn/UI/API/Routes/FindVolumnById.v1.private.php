<?php

/**
 * @apiGroup           Volumn
 * @apiName            FindVolumnById
 *
 * @api                {GET} /v1/volumns/:id Find Volumn By Id
 * @apiDescription     Endpoint description here...
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader          {String} accept=application/json
 * @apiHeader          {String} authorization=Bearer
 *
 * @apiParam           {String} parameters here...
 *
 * @apiSuccessExample  {json} Success-Response:
 * HTTP/1.1 200 OK
 * {
 *     // Insert the response of the request here...
 * }
 */

use App\Containers\AppSection\Volumn\UI\API\Controllers\FindVolumnByIdController;
use Illuminate\Support\Facades\Route;

Route::get('volumns/{id}', FindVolumnByIdController::class)
    ->middleware(['auth:api']);

