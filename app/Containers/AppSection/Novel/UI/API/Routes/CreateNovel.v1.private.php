<?php

/**
 * @apiGroup           Novel
 * @apiName            CreateNovel
 *
 * @api                {POST} /v1/novels Create Novel
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

use App\Containers\AppSection\Novel\UI\API\Controllers\CreateNovelController;
use Illuminate\Support\Facades\Route;

Route::post('novels', CreateNovelController::class)
    ->middleware(['auth:api']);

