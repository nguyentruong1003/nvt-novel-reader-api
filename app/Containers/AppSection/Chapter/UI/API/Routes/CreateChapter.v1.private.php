<?php

/**
 * @apiGroup           Chapter
 * @apiName            CreateChapter
 *
 * @api                {POST} /v1/chapters Create Chapter
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

use App\Containers\AppSection\Chapter\UI\API\Controllers\CreateChapterController;
use Illuminate\Support\Facades\Route;

Route::post('chapters', CreateChapterController::class)
    ->middleware(['auth:api']);

