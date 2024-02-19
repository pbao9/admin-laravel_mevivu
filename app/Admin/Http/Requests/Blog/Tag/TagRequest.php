<?php

namespace App\Admin\Http\Requests\Blog\Tag;

use App\Admin\Http\Requests\BaseRequest;
use App\Enums\DefaultStatus;
use Illuminate\Validation\Rules\Enum;

class TagRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function methodPost()
    {
        return [
            'name' => ['required', 'string'],
            'status' => ['required', new Enum(DefaultStatus::class)],
            'description' => ['nullable'],
        ];
    }

    protected function methodPut()
    {
        return [
            'id' => ['required', 'exists:App\Models\Tag,id'],
            'name' => ['required', 'string'],
            'slug' => ['required', 'string', 'unique:App\Models\Tag,slug,'.$this->id],
            'status' => ['required', new Enum(DefaultStatus::class)],
            'description' => ['nullable'],
        ];
    }
}