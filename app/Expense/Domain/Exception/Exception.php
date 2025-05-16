<?php

namespace App\Expense\Domain\Exception;

use App\Shared\Domain\ExceptionInterface;
use Psy\Exception\RuntimeException;

final class Exception extends RuntimeException implements ExceptionInterface
{
}
