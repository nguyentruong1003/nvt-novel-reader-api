<?php

/**
 * @apiGroup           NovelType
 * @apiName            UpdateNovelType
 *
 * @api                {PATCH} /v1/novel-types/:id Update Novel Type
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

use App\Containers\AppSection\NovelType\UI\API\Controllers\UpdateNovelTypeController;
use Illuminate\Support\Facades\Route;

Route::patch('novel-types/{id}', UpdateNovelTypeController::class)
    ->middleware(['auth:api']);

