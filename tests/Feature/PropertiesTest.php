<?php

use App\Models\Role;
use App\Models\User;

test('property owner has access to properties feature', function () {
    $owner = User::factory()->create()->assignRole(Role::ROLE_OWNER);
    $response = $this->actingAs($owner)->getJson('/api/v1/owner/properties');
    $response->assertStatus(200);
});

test('user does not have access to properties feature', function () {
    $owner = User::factory()->create()->assignRole(Role::ROLE_USER);
    $response = $this->actingAs($owner)->getJson('/api/v1/owner/properties');
    $response->assertStatus(403);
});

test('property owner can add property', function () {
    $owner = User::factory()->create()->assignRole(Role::ROLE_OWNER);
    $response = $this->actingAs($owner)->postJson('/api/v1/owner/properties',
        [
            'name' => 'Test Property',
            'city_id' => 2,
            'address_street' => '45 Nelson Mandela Avenue',
            'address_postcode' => '12345',
        ]
    );
    $response->assertSuccessful();
    $response->assertJsonFragment(['name' => 'Test Property']);
});
