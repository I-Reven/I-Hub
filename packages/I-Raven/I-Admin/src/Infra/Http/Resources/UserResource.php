<?php

namespace IRaven\IAdmin\Infra\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Symfony\Component\HttpFoundation\Response;
use const http\Client\Curl\Features\HTTP2;

/**
 * Class UserResource
 * @package IRaven\IAdmin\Infra\Http\Resources
 */
class UserResource extends JsonResource
{

    public function with($request)
    {
        return [
            'status' => 'SUCCESS',
            'code' => Response::HTTP_OK,
            'message' => "",
        ];
    }


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
