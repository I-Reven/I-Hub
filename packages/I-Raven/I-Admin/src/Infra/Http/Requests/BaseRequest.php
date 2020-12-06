<?php


namespace IRaven\IAdmin\Infra\Http\Requests;

use App;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Foundation\Http\FormRequest;
use IRaven\IAdmin\Domain\Contracts\Handlers\ExceptionHandlerContract;

/**
 * Class BaseRequest
 * @package IRaven\IAdmin\Infra\Http\Requests
 */
abstract class BaseRequest extends FormRequest
{
    /**
     * BaseRequest constructor.
     * @param array $query
     * @param array $request
     * @param array $attributes
     * @param array $cookies
     * @param array $files
     * @param array $server
     * @param null $content
     */
    public function __construct(array $query = [], array $request = [], array $attributes = [], array $cookies = [], array $files = [], array $server = [], $content = null)
    {
        App::singleton(
            ExceptionHandler::class,
            ExceptionHandlerContract::class
        );

        parent::__construct($query, $request, $attributes, $cookies, $files, $server, $content);
    }
}
