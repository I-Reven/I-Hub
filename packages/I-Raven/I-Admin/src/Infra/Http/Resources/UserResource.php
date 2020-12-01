<?php

namespace IRaven\IAdmin\Infra\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class UserResource
 * @package IRaven\IAdmin\Infra\Http\Resources
 */
class UserResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'rule' => $this->getRule(),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
