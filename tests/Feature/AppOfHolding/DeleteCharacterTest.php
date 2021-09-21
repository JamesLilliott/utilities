<?php

namespace Tests\Feature\AppOfHolding;

use App\Models\AppOfHolding\Character;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DeleteCharacterTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->loginWithFakeUser();
    }

    public function testDeleteCharacter()
    {
        /** @var Character $character */
        $character = Character::create([
            'user_id' => 1,
            'name' => 'Fred',
            'strength' => '12'
        ]);

        $this->post('/app-of-holding/character/delete/' . $character->id);

        $this->assertDatabaseMissing('characters', ['id' => $character->id]);
    }
}
