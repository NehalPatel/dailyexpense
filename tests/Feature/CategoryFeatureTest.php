<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryFeatureTest extends TestCase
{

    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test */
    public function user_can_create_new_category()
    {
        $user = User::factory()->create();

        $data = ['name' => 'test category'];

        $this
            ->actingAs($user, 'web')
            ->post(route('categories.store'), $data)
            ->assertStatus(302)
            ->assertRedirect(route('categories.index'))
            ->assertSessionHas('message', 'New category created !');
    }

    /**  @test */
    public function user_can_update_existing_category()
    {
        $category = Category::factory()->create();
        $user = User::factory()->create();

        $data = ['name' => 'updated category'];

        $this->actingAs($user, 'web')
            ->put(route('categories.update', $category), $data)
            ->assertStatus(302)
            ->assertRedirect(route('categories.index'))
            ->assertSessionHas('message', 'Category updated!');
    }

    /** @test */
    public function user_can_delete_existing_category()
    {
        $category = Category::factory()->create();
        $user = User::factory()->create();

        $this->actingAs($user, 'web')
            ->delete(route('categories.destroy', $category))
            ->assertStatus(302)
            ->assertRedirect(route('categories.index'))
            ->assertSessionHas('message', 'Category deleted!');
    }

    /** @test  */
    public function cannot_create_empty_category()
    {
        $user = User::factory()->create();

        $data = ['name' => ''];

        $this
            ->actingAs($user, 'web')
            ->from(route('categories.create'))
            ->post(route('categories.store'), $data)
            ->assertSessionHasErrors(['name' =>'The name field is required.'])
            ->assertStatus(302)
            ->assertRedirect(route('categories.create'));
    }
}
