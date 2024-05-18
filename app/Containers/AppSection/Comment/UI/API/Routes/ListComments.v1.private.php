<?php

/**
 * @apiGroup           Comment
 * @apiName            ListComments
 *
 * @api                {GET} /v1/comments List Comments
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

use App\Containers\AppSection\Comment\UI\API\Controllers\ListCommentsController;
use Illuminate\Support\Facades\Route;

Route::get('comments', ListCommentsController::class)
    ->middleware(['auth:api']);

