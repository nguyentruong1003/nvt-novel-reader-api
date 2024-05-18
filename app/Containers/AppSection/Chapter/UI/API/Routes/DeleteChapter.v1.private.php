<?php

/**
 * @apiGroup           Chapter
 * @apiName            DeleteChapter
 *
 * @api                {DELETE} /v1/chapters/:id Delete Chapter
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

use App\Containers\AppSection\Chapter\UI\API\Controllers\DeleteChapterController;
use Illuminate\Support\Facades\Route;

Route::delete('chapters/{id}', DeleteChapterController::class)
    ->middleware(['auth:api']);

