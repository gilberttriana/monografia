<?php

use App\Models\User;

test('authenticated clients visiting home are redirected to their dashboard', function () {
    $client = User::factory()->create(['role' => 'client']);

    $this->actingAs($client)
        ->get(route('home'))
        ->assertRedirect(route('client.dashboard'));
});
