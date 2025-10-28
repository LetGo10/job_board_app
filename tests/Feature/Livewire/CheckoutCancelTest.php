<?php

namespace Tests\Feature\Livewire;

use App\Livewire\CheckoutCancel;
use Livewire\Livewire;
use Tests\TestCase;

class CheckoutCancelTest extends TestCase
{
    public function test_renders_successfully()
    {
        Livewire::test(CheckoutCancel::class)
            ->assertStatus(200);
    }
}
