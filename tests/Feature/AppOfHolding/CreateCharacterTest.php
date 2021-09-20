<?php

namespace Tests\Feature\AppOfHolding;

use App\Models\AppOfHolding\Character;
use Illuminate\Foundation\Testing\Concerns\InteractsWithSession;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class CreateCharacterTest extends TestCase
{
    use RefreshDatabase;
//    use InteractsWithSession;

    public function setUp(): void
    {
        parent::setUp();
        $this->withoutMiddleware();
        $this->startSession();
    }

    public function testCreateCharacter()
    {
        $characterAttributes = [
            'name' => 'Zorg Destroyer of worlds',
            'strength' => 15
        ];

        $this->post('app-of-holding/character', $characterAttributes)
            ->assertSuccessful();
        $this->assertDatabaseHas('characters', ['name' => $characterAttributes['name']]);
    }

    public function testCreationFailsOnDuplicate()
    {
        $characterAttributes = [
            'name' => 'Zorg Destroyer of worlds',
            'strength' => 15
        ];

        // Set up Character
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
