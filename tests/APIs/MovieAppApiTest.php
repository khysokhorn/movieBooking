<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\MovieApp;

class MovieAppApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_movie_app()
    {
        $movieApp = MovieApp::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/movie_apps', $movieApp
        );

        $this->assertApiResponse($movieApp);
    }

    /**
     * @test
     */
    public function test_read_movie_app()
    {
        $movieApp = MovieApp::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/movie_apps/'.$movieApp->id
        );

        $this->assertApiResponse($movieApp->toArray());
    }

    /**
     * @test
     */
    public function test_update_movie_app()
    {
        $movieApp = MovieApp::factory()->create();
        $editedMovieApp = MovieApp::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/movie_apps/'.$movieApp->id,
            $editedMovieApp
        );

        $this->assertApiResponse($editedMovieApp);
    }

    /**
     * @test
     */
    public function test_delete_movie_app()
    {
        $movieApp = MovieApp::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/movie_apps/'.$movieApp->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/movie_apps/'.$movieApp->id
        );

        $this->response->assertStatus(404);
    }
}
