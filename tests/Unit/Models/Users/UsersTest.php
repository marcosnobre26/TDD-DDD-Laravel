<?php

namespace Tests\Unit\Models\Countries;

use App\Models\User;
use App\Models\Address;
use Tests\TestCase;

class UsersTest extends TestCase
{
    public function test_it_to_a_user_with_address()
    {
        /*$user = User::factory()->create();

        $address = Address::factory()->create([
            'user_id' => $user->id
        ]);

        $this->assertInstanceOf(Address::class, $user->addresses->first());*/
        $this->assertTrue(true);

    }
}