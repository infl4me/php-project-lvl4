<?php

namespace Tests\Feature;

use App\Models\Label;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\CreatesApplication;
use Tests\TestCase;

class LabelTest extends TestCase
{
    use DatabaseTransactions;
    use DatabaseMigrations;

    use CreatesApplication;

    protected function setUp(): void
    {
        parent::setUp();
        Label::factory()->count(2)->create();
    }

    public function testIndex()
    {
        $response = $this->get(route('labels.index'));
        $response->assertOk();
    }

    public function testStore()
    {
        $data = Label::factory()->make()->toArray();
        $response = $this->post(route('labels.store'), $data);
        $label = Label::latest('id')->first();
        $response->assertRedirect(route('labels.show', $label));
        $response->assertSessionHasNoErrors();
        $this->assertDatabaseHas('labels', $data);
    }

    public function testCreate()
    {
        $response = $this->get(route('labels.create'));
        $response->assertOk();
    }

    public function testEdit()
    {
        $label = Label::first();
        $response = $this->get(route('labels.edit', $label));
        $response->assertOk();
    }

    public function testUpdate()
    {
        $label = Label::first();
        $data = Label::factory()->make()->only('name', 'description');

        $response = $this->patch(route('labels.update', $label), $data);

        $response->assertRedirect(route('labels.edit', $label));
        $response->assertSessionHasNoErrors();
        $this->assertDatabaseHas('labels', $data);
    }

    public function testDestroy()
    {
        $labelStatus = Label::first();

        $response = $this->delete(route('labels.destroy', $labelStatus));

        $response->assertRedirect(route('labels.index'));
        $response->assertSessionHasNoErrors();
    }
}
