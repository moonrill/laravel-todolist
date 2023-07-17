<?php

namespace Tests\Feature;

use App\Services\TodolistService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class TodolistServiceTest extends TestCase
{
    private TodolistService $todolistService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->todolistService = $this->app->make(TodolistService::class);
    }

    public function testTodolistNotNull()
    {
        self::assertNotNull($this->todolistService);
    }

    public function testSaveTodo()
    {
        $this->todolistService->saveTodo("1", "Noir");

        $todolist = Session::get('todolist');
        foreach ($todolist as $value) {
            self::assertEquals("1", $value['id']);
            self::assertEquals("Noir", $value['todo']);
        }
    }

    public function testGetTodoListEmpty()
    {
        self::assertEquals([], $this->todolistService->getTodo());
    }

    public function testGetTodolistNotEmpty()
    {
        $expected = [
            [
                'id' => '1',
                'todo' => 'Noir'
            ],
            [
                'id' => '2',
                'todo' => 'Black'
            ]
        ];

        $this->todolistService->saveTodo('1', 'Noir');
        $this->todolistService->saveTodo('2', 'Black');

        self::assertEquals($expected, $this->todolistService->getTodo());
    }
}
