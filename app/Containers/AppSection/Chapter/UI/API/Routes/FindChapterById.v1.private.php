<?php

/**
 * @apiGroup           Chapter
 * @apiName            FindChapterById
 *
 * @api                {GET} /v1/chapters/:id Find Chapter By Id
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

use App\Containers\AppSection\Chapter\UI\API\Controllers\FindChapterByIdController;
use Illuminate\Support\Facades\Route;

Route::get('chapters/{id}', FindChapterByIdController::class)
    ->middleware(['auth:api']);

