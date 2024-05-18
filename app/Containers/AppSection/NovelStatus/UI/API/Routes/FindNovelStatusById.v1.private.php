<?php

/**
 * @apiGroup           NovelStatus
 * @apiName            FindNovelStatusById
 *
 * @api                {GET} /v1/novel-statuses/:id Find Novel Status By Id
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

use App\Containers\AppSection\NovelStatus\UI\API\Controllers\FindNovelStatusByIdController;
use Illuminate\Support\Facades\Route;

Route::get('novel-statuses/{id}', FindNovelStatusByIdController::class)
    ->middleware(['auth:api']);

