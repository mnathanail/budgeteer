<?php

namespace App\Shared\Infrastructure\Uuid;

use App\Shared\Application\Uuid\UuidRepositoryInterface;
use App\Shared\Domain\Uuid;
use Ramsey\Uuid\Uuid as RandomUuid;

class UuidRepository implements UuidRepositoryInterface
{

    public function getUuid(): Uuid
    {
        return Uuid::fromString(RandomUuid::uuid4()->toString());
    }
}