<?php

namespace IRaven\IAdmin\Infra\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class PersonalAccessTokenResource
 * @package IRaven\IAdmin\Infra\Http\Resources
 */
class PersonalAccessTokenResource extends JsonResource
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
            'access_token' => $this->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse($this->token->expires_at)->toDateTimeString(),
        ];
    }
}
