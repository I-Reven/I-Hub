<?php

namespace IRaven\IAdmin\Domain\Exceptions;

use Exception;
use Illuminate\Contracts\Validation\Validator;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

/**
 * Class PingWriteException
 * @package IRaven\IAdmin\Domain\Exceptions
 */
class ValidatorException extends Exception
{
    public function __construct(Validator $validation, int $code = 0, Throwable $previous = null)
    {
        parent::__construct(json_encode($validation->errors()->messages()['name']), $code ?: Response::HTTP_FOUND, $previous);
    }
}
