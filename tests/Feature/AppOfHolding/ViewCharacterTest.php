<?php

namespace Tests\Feature\AppOfHolding;

use App\Models\AppOfHolding\Character;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ViewCharacterTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->withoutMiddleware();
        $this->loginWithFakeUser();
    }

    public function testViewCharacters()
    {
        Character::create([
            'user_id' => 1,
            'name' => 'Frank',
            'strength' => 12,
        ]);
        Character::create([
            'user_id' => 1,
            'name' => 'Tim',
            'strength' => 13,
        ]);

        $this->get('/app-of-holding/character')
            ->assertSee('Frank')->assertSee('Tim');
    }

    public function testViewCharactersWhenOnlyOne()
    {
        Character::create([
            'user_id' => 1,
            'name' => 'Frank',
            'strength' => 12,
        ]);

        $this->get('/app-of-holding/character')
            ->assertSee('Frank');
    }

    public function testViewCharactersWhenEmpty()
    {
        $this->get('/app-of-holding/character')
            ->assertDontSee('Frank')->assertDontSee('Tim');
    }
}
