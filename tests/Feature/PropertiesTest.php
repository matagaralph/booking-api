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
