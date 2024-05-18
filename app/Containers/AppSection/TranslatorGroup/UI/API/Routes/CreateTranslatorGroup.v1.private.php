<?php

/**
 * @apiGroup           TranslatorGroup
 * @apiName            CreateTranslatorGroup
 *
 * @api                {POST} /v1/translator-groups Create Translator Group
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

use App\Containers\AppSection\TranslatorGroup\UI\API\Controllers\CreateTranslatorGroupController;
use Illuminate\Support\Facades\Route;

Route::post('translator-groups', CreateTranslatorGroupController::class)
    ->middleware(['auth:api']);

