<?php

namespace IRaven\IAdmin\Infra\Http\Resources;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class ErrorResource
 * @package IRaven\IAdmin\Infra\Http\Resources
 */
class ErrorResource extends JsonResource
{
    /**
     * @param Request $request
     * @param JsonResponse $response
     */
    public function withResponse($request, $response)
    {

        $response->setStatusCode($this->getCode() ?: Response::HTTP_BAD_REQUEST);
    }

    public function with($request)
    {
        return [
            'status' => 'ERR',
            'code' => $this->getCode(),
            'message' => $this->getMessage(),
        ];
    }

    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [];
    }
}
