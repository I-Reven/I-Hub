<?php

namespace IRaven\IAdmin\Application\Handlers;

use App\Exceptions\Handler;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;
use IRaven\IAdmin\Domain\Contracts\Handlers\ExceptionHandlerContract;
use IRaven\IAdmin\Domain\Exceptions\PingWriteException;
use IRaven\IAdmin\Domain\Exceptions\ValidatorException;
use IRaven\IAdmin\Infra\Http\Resources\ErrorResource;
use Log;
use Throwable;

/**
 * Class ExceptionHandler
 * @package IRaven\IAdmin\Application\Handlers
 */
class ExceptionHandler extends Handler implements ExceptionHandlerContract
{
    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (PingWriteException $e) {
            Log::error($e->getMessage(), $e->getTrace());
            return false;
        });

        $this->reportable(function (ValidatorException $e) {
            Log::error($e->getMessage(), $e->getTrace());
            return false;
        });

        parent::register();
    }

    public function render($request, Throwable $e)
    {
        if ($e instanceof Throwable) {
            return new ErrorResource($e);
        }

        return parent::render($request, $e);
    }
}
