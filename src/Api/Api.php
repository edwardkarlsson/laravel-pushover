<?php

namespace Pushover\Api;

interface Api
{
    public function call(string $endpoint, array $payload);
}
