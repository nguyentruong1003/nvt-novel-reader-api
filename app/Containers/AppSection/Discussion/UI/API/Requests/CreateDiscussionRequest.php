<?php

namespace App\Containers\AppSection\Discussion\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

class CreateDiscussionRequest extends ParentRequest
{
    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    protected array $decode = [
        // 'id',
        'novel_id'
    ];

    protected array $urlParameters = [
        // 'id',
    ];

    public function rules(): array
    {
        return [
            // 'id' => 'required',
        ];
    }

    public function authorize(): bool
    {
        return $this->check([
            'hasAccess',
        ]);
    }
}
