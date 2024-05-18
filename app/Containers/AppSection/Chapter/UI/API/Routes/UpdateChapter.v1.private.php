<?php

/**
 * @apiGroup           Chapter
 * @apiName            UpdateChapter
 *
 * @api                {PATCH} /v1/chapters/:id Update Chapter
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

use App\Containers\AppSection\Chapter\UI\API\Controllers\UpdateChapterController;
use Illuminate\Support\Facades\Route;

Route::patch('chapters/{id}', UpdateChapterController::class)
    ->middleware(['auth:api']);

