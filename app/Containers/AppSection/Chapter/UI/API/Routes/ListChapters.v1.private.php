<?php

/**
 * @apiGroup           Chapter
 * @apiName            ListChapters
 *
 * @api                {GET} /v1/chapters List Chapters
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

use App\Containers\AppSection\Chapter\UI\API\Controllers\ListChaptersController;
use Illuminate\Support\Facades\Route;

Route::get('chapters', ListChaptersController::class)
    ->middleware(['auth:api']);

