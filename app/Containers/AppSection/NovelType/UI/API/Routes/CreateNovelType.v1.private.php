<?php

/**
 * @apiGroup           NovelType
 * @apiName            CreateNovelType
 *
 * @api                {POST} /v1/novel-types Create Novel Type
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

use App\Containers\AppSection\NovelType\UI\API\Controllers\CreateNovelTypeController;
use Illuminate\Support\Facades\Route;

Route::post('novel-types', CreateNovelTypeController::class)
    ->middleware(['auth:api']);

