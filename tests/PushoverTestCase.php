<?php

namespace Pushover\Tests;

use Exception;
use Faker\Factory;
use Faker\Generator;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Foundation\Exceptions\Handler;
use Tests\TestCase;

abstract class PushoverTestCase extends TestCase
{
    /**
     * @var Generator
     */
    protected $faker;

    /**
     * Disables exception handling for tests.
     */
    protected function disableExceptionHandling()
    {
        $this->app->instance(ExceptionHandler::class, new class extends Handler {
            public function __construct() {}
            public function report(Exception $e) {}
            public function render($request, Exception $e) {
                throw $e;
            }
        });
    }

    /**
     * Makes the faker available for tests
     */
    protected function useFaker()
    {
        $this->faker = Factory::create();
    }
}
