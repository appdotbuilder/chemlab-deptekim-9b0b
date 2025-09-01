<?php

use App\Models\User;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

test('landing page renders correctly', function () {
    $response = $this->get('/');

    $response->assertStatus(200)
             ->assertSee('ChemLab Deptekim')
             ->assertSee('Sistem terintegrasi peminjaman alat laboratorium');
});

test('equipment index page is accessible when authenticated', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get('/equipment');

    $response->assertStatus(200)
             ->assertSee('Daftar Alat')
             ->assertSee('Spektrofotometer UV-Vis');
});

test('loan creation form is accessible when authenticated', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get('/loans/create');

    $response->assertStatus(200)
             ->assertSee('Ajukan Peminjaman Alat')
             ->assertSee('Upload JSA');
});

test('dashboard is accessible when authenticated', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get('/dashboard');

    $response->assertStatus(200)
             ->assertSee('Dashboard')
             ->assertSee('Alat Tersedia');
});

test('protected routes require authentication', function () {
    $response = $this->get('/dashboard');
    $response->assertRedirect('/login');

    $response = $this->get('/equipment');
    $response->assertRedirect('/login');

    $response = $this->get('/loans/create');
    $response->assertRedirect('/login');
});