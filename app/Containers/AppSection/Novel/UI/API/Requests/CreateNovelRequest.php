<?php

namespace App\Containers\AppSection\Novel\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

class CreateNovelRequest extends ParentRequest
{
    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    protected array $decode = [
        // 'id',
        'categories.*'
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
