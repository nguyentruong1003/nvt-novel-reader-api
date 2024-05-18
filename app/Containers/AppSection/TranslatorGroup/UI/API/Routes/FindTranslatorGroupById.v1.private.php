<?php

/**
 * @apiGroup           TranslatorGroup
 * @apiName            FindTranslatorGroupById
 *
 * @api                {GET} /v1/translator-groups/:id Find Translator Group By Id
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

use App\Containers\AppSection\TranslatorGroup\UI\API\Controllers\FindTranslatorGroupByIdController;
use Illuminate\Support\Facades\Route;

Route::get('translator-groups/{id}', FindTranslatorGroupByIdController::class)
    ->middleware(['auth:api']);

