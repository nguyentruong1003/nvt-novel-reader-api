<?php

/**
 * @apiGroup           Novel
 * @apiName            UpdateNovel
 *
 * @api                {PATCH} /v1/novels/:id Update Novel
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

use App\Containers\AppSection\Novel\UI\API\Controllers\UpdateNovelController;
use Illuminate\Support\Facades\Route;

Route::patch('novels/{id}', UpdateNovelController::class)
    ->middleware(['auth:api']);

