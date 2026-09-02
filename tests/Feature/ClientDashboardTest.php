<?php

use App\Models\Technician;
use App\Models\TechnicianRating;
use App\Models\User;

test('non-client users cannot view the contractor search', function () {
    $user = User::factory()->create(['role' => 'member']);

    $this->actingAs($user)->get(route('client.dashboard'))->assertForbidden();
});

test('client login redirects to the contractor search', function () {
    $user = User::factory()->create([
        'role' => 'client',
        'email' => 'client@example.com',
    ]);

    session(['url.intended' => route('dashboard', ['current_team' => $user->currentTeam->slug])]);

    $this->post(route('login'), [
        'email' => $user->email,
        'password' => 'password',
    ])->assertRedirect(route('client.dashboard'));
});

test('inertia client login redirects instead of returning a session message', function () {
    $user = User::factory()->create([
        'role' => 'client',
        'email' => 'inertia-client@example.com',
    ]);

    $this->withHeaders([
        'X-Inertia' => 'true',
        'X-Requested-With' => 'XMLHttpRequest',
        'Accept' => 'text/html, application/xhtml+xml',
    ])->post(route('login'), [
        'email' => $user->email,
        'password' => 'password',
    ])->assertStatus(409)
        ->assertHeader('X-Inertia-Location', route('client.dashboard'));
});

test('clients see technicians and ratings from the database', function () {
    $user = User::factory()->create(['role' => 'client']);
    $technician = Technician::query()->create([
        'name' => 'Juan Perez',
        'specialty' => 'Electricista',
        'location' => 'Corinto, Chinandega',
        'years_experience' => 8,
        'is_verified' => true,
        'is_available' => true,
        'services' => ['Instalaciones'],
    ]);
    TechnicianRating::query()->create([
        'technician_id' => $technician->id,
        'user_id' => $user->id,
        'rating' => 5,
    ]);

    $response = $this->actingAs($user)->get(route('client.dashboard'));

    $response->assertOk()
        ->assertSee('Juan Perez')
        ->assertSee('5.0')
        ->assertSee('1 opinión');
});

test('clients without technicians see an empty state', function () {
    $user = User::factory()->create(['role' => 'client']);

    $this->actingAs($user)
        ->get(route('client.dashboard'))
        ->assertOk()
        ->assertSee('No hay contratistas disponibles con esos filtros.');
});
