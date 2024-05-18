<?php

/**
 * @apiGroup           Discussion
 * @apiName            CreateDiscussion
 *
 * @api                {POST} /v1/discussions Create Discussion
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

use App\Containers\AppSection\Discussion\UI\API\Controllers\CreateDiscussionController;
use Illuminate\Support\Facades\Route;

Route::post('discussions', CreateDiscussionController::class)
    ->middleware(['auth:api']);

