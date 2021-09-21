<?php

namespace Tests\Feature\AppOfHolding;

use App\Models\AppOfHolding\Character;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateCharacterTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->withoutMiddleware();
        $this->startSession();
        $this->loginWithFakeUser();
    }

    public function testCreateCharacter()
    {
        $characterAttributes = [
            'name' => 'Zorg Destroyer of worlds',
            'strength' => 15
        ];

        $this->followingRedirects()->post('app-of-holding/character', $characterAttributes)
            ->assertSee($characterAttributes['name']);

        $this->assertDatabaseHas('characters', ['name' => $characterAttributes['name']]);
    }

    public function testCreationFailsOnDuplicate()
    {
        $characterAttributes = [
            'user_id' => 1,
            'name' => 'Zorg Destroyer of worlds',
            'strength' => 15
        ];

        Character::create($characterAttributes);
        $this->assertDatabaseHas('characters', ['name' => $characterAttributes['name']]);

        $this->post('app-of-holding/character', $characterAttributes)
            ->assertSessionHasErrors(['name' => 'The name has already been taken.']);
    }

    public function testCreationFailsOnNoName()
    {
        $characterAttributes = ['strength' => 15];

        $this->post('app-of-holding/character', $characterAttributes)
            ->assertSessionHasErrors(['name' => 'The name field is required.']);
    }

    public function testCreationFailsOnNoStrength()
    {
        $characterAttributes = ['name' => 'Zorg Destroyer of worlds'];

        $this->post('app-of-holding/character', $characterAttributes)
            ->assertSessionHasErrors(['strength' => 'The strength field is required.']);
    }

    public function testCreationFailsOnInvalidStrengthType()
    {
        $characterAttributes = [
            'name' => 'Zorg Destroyer of worlds',
            'strength' => 'strong man'
        ];

        $this->post('app-of-holding/character', $characterAttributes)
            ->assertSessionHasErrors(['strength' => "The strength must be a number."]);
    }

    public function testCreationFailsOnStrengthTooHigh()
    {
        $characterAttributes = [
            'name' => 'Zorg Destroyer of worlds',
            'strength' => 30
        ];

        $this->post('app-of-holding/character', $characterAttributes)
            ->assertSessionHasErrors(['strength' => 'The strength must be less than or equal 20.']);
    }

    public function testCreationFailsOnStrengthTooLow()
    {
        $characterAttributes = [
            'name' => 'Zorg Destroyer of worlds',
            'strength' => -1
        ];

        $this->post('app-of-holding/character', $characterAttributes)
            ->assertSessionHasErrors(['strength' => 'The strength must be greater than or equal 1.']);
    }
}
