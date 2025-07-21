<?php

use App\Models\Role;
use App\Models\User;

test('user has access to bookings feature', function () {
    $owner = User::factory()->create()->assignRole(Role::ROLE_USER);
    $response = $this->actingAs($owner)->getJson('/api/v1/user/bookings');
    $response->assertStatus(200);
});

test('property owner does not have access to bookings feature', function () {
    $owner = User::factory()->create()->assignRole(Role::ROLE_OWNER);
    $response = $this->actingAs($owner)->getJson('/api/v1/user/bookings');
    $response->assertStatus(403);
});
