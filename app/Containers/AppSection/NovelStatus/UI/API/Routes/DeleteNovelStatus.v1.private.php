<?php

/**
 * @apiGroup           NovelStatus
 * @apiName            DeleteNovelStatus
 *
 * @api                {DELETE} /v1/novel-statuses/:id Delete Novel Status
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

use App\Containers\AppSection\NovelStatus\UI\API\Controllers\DeleteNovelStatusController;
use Illuminate\Support\Facades\Route;

Route::delete('novel-statuses/{id}', DeleteNovelStatusController::class)
    ->middleware(['auth:api']);

