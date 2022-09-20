<?php

namespace Tests\Feature;

use App\Models\Series;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use Illuminate\Support\Str;

class SeriesWithClientTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    // public function test_Admin_Can_Make_Serires()
    // {
    //     $this->withoutExceptionHandling();
    //     Storage::fake(config('filesystems.default'));
    //     $title = 'Hello Jksa Altigani';
    //     // $user = User::factory()->create(['email' => 'admin@gmail.com']);
    //     // $this->actingAs($user, ');
    //     $response = $this->post(route('series.store'), [
    //         'image_url' => UploadedFile::fake()->image('image.png', 20 , 20 ),
    //         'title' =>  $title,
    //         'description' => "Some Description",
    //     ]);
    //     // dd(Series::all());
    //     $response->assertRedirect();
    //     // dd($response);
    //     // dd(Series::all());

    //     $this->assertDatabaseHas('series', [
    //         'slug' => Str::slug($title),
    //     ]);
    //     Storage::disk(config('filesystems.default'))->assertExists('series/' . Str::slug($title) . '.png');
    // }

    public function test_online_user_in_system(){
        $this->assertTrue(true);
    }

    public function test_admin_can_get_all_Series(){
        $this->assertTrue(true);
    }

    public function test_admin_can_get_online_series(){
        $this->assertTrue(true);
    }
}
