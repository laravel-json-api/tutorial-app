<?php

namespace App\JsonApi\V1\Posts;

use Illuminate\Validation\Rule;
use LaravelJsonApi\Laravel\Http\Requests\ResourceRequest;
use LaravelJsonApi\Validation\Rule as JsonApiRule;

class PostRequest extends ResourceRequest
{

    /**
     * Get the validation rules for the resource.
     *
     * @return array
     */
    public function rules(): array
    {
        $post = $this->model();
        $uniqueSlug = Rule::unique('posts', 'slug');

        if ($post) {
            $uniqueSlug->ignoreModel($post);
        }

        return [
            'content' => ['required', 'string'],
            'publishedAt' => ['nullable', JsonApiRule::dateTime()],
            'slug' => ['required', 'string', $uniqueSlug],
            'tags' => JsonApiRule::toMany(),
            'title' => ['required', 'string'],
        ];
    }

}
