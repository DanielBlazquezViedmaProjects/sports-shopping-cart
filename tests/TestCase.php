<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Faker\Factory as FakerFactory;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
}
