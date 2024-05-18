<?php

/**
 * @apiGroup           Novel
 * @apiName            ListNovels
 *
 * @api                {GET} /v1/novels List Novels
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

use App\Containers\AppSection\Novel\UI\API\Controllers\ListNovelsController;
use Illuminate\Support\Facades\Route;

Route::get('novels', ListNovelsController::class)
    ->middleware(['auth:api']);

