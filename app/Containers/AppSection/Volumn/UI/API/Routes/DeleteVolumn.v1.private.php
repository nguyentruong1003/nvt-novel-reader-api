<?php

/**
 * @apiGroup           Volumn
 * @apiName            DeleteVolumn
 *
 * @api                {DELETE} /v1/volumns/:id Delete Volumn
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

use App\Containers\AppSection\Volumn\UI\API\Controllers\DeleteVolumnController;
use Illuminate\Support\Facades\Route;

Route::delete('volumns/{id}', DeleteVolumnController::class)
    ->middleware(['auth:api']);

