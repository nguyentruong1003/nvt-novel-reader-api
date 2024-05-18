<?php

/**
 * @apiGroup           TranslatorGroup
 * @apiName            DeleteTranslatorGroup
 *
 * @api                {DELETE} /v1/translator-groups/:id Delete Translator Group
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

use App\Containers\AppSection\TranslatorGroup\UI\API\Controllers\DeleteTranslatorGroupController;
use Illuminate\Support\Facades\Route;

Route::delete('translator-groups/{id}', DeleteTranslatorGroupController::class)
    ->middleware(['auth:api']);

