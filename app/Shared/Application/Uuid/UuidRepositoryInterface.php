<?php

namespace App\Shared\Application\Uuid;

use App\Shared\Domain\Uuid;

interface UuidRepositoryInterface
{
    public function getUuid(): Uuid;
}