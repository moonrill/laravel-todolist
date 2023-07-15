<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Services\UserService;
use Tests\TestCase;

class UserServiceTest extends TestCase
{
   private UserService $userService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->userService = $this->app->make(UserService::class);
    }

    public function testSample()
    {
        self::assertTrue(true);
    }

    public function testLoginSuccess()
    {
        self::assertTrue($this->userService->login('noir', 'rahasia'));
    }

    public function testLoginUserNotFound()
    {
        self::assertFalse($this->userService->login('noah', '123'));
    }

    public function testLoginWrongPassword()
    {
        self::assertFalse($this->userService->login('noir', '123'));
    }
}
