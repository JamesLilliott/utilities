<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function loginWithFakeUser($attributes = [])
    {
        $user = User::create([
            'name' => $attributes['name'] ?? 'Alice',
            'email' => $attributes['email'] ?? 'Alice@email.com',
            'password' => $attributes['password'] ?? 'password',
        ]);

        $this->actingAs($user);

        return $user;
    }
}
