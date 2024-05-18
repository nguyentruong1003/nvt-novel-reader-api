<?php

/**
 * @apiGroup           Novel
 * @apiName            FindNovelById
 *
 * @api                {GET} /v1/novels/:id Find Novel By Id
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

use App\Containers\AppSection\Novel\UI\API\Controllers\FindNovelByIdController;
use Illuminate\Support\Facades\Route;

Route::get('novels/{id}', FindNovelByIdController::class)
    ->middleware(['auth:api']);

