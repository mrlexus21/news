<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Support\Facades\Log;

class ServiceException extends Exception
{
    /**
     * Report or log an exception.
     *
     * @return void
     */
    public function report(Exception $exception)
    {
        Log::error('New error in service check this - ' . $exception);
    }
}
