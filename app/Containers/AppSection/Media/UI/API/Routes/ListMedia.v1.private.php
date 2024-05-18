<?php

/**
 * @apiGroup           Media
 * @apiName            ListMedia
 *
 * @api                {GET} /v1/media List Media
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

use App\Containers\AppSection\Media\UI\API\Controllers\ListMediaController;
use Illuminate\Support\Facades\Route;

Route::get('media', ListMediaController::class)
    ->middleware(['auth:api']);

