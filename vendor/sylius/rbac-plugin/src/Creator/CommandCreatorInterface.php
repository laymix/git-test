<?php

declare(strict_types=1);

namespace Sylius\RbacPlugin\Creator;

use Prooph\Common\Messaging\Command;
use Symfony\Component\HttpFoundation\Request;

interface CommandCreatorInterface
{
    public function fromRequest(Request $request): Command;
}
