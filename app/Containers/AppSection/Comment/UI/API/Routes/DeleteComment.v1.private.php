<?php

/**
 * @apiGroup           Comment
 * @apiName            DeleteComment
 *
 * @api                {DELETE} /v1/comments/:id Delete Comment
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

use App\Containers\AppSection\Comment\UI\API\Controllers\DeleteCommentController;
use Illuminate\Support\Facades\Route;

Route::delete('comments/{id}', DeleteCommentController::class)
    ->middleware(['auth:api']);

