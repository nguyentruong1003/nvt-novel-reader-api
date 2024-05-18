<?php

/**
 * @apiGroup           NovelCategory
 * @apiName            CreateNovelCategory
 *
 * @api                {POST} /v1/novel-categories Create Novel Category
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

use App\Containers\AppSection\NovelCategory\UI\API\Controllers\CreateNovelCategoryController;
use Illuminate\Support\Facades\Route;

Route::post('novel-categories', CreateNovelCategoryController::class)
    ->middleware(['auth:api']);

