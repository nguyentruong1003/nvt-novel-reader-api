<?php

/**
 * @apiGroup           NovelType
 * @apiName            FindNovelTypeById
 *
 * @api                {GET} /v1/novel-types/:id Find Novel Type By Id
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

use App\Containers\AppSection\NovelType\UI\API\Controllers\FindNovelTypeByIdController;
use Illuminate\Support\Facades\Route;

Route::get('novel-types/{id}', FindNovelTypeByIdController::class)
    ->middleware(['auth:api']);

