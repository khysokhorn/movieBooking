<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Cinema;

class CinemaApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_cinema()
    {
        $cinema = Cinema::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/cinemas', $cinema
        );

        $this->assertApiResponse($cinema);
    }

    /**
     * @test
     */
    public function test_read_cinema()
    {
        $cinema = Cinema::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/cinemas/'.$cinema->id
        );

        $this->assertApiResponse($cinema->toArray());
    }

    /**
     * @test
     */
    public function test_update_cinema()
    {
        $cinema = Cinema::factory()->create();
        $editedCinema = Cinema::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/cinemas/'.$cinema->id,
            $editedCinema
        );

        $this->assertApiResponse($editedCinema);
    }

    /**
     * @test
     */
    public function test_delete_cinema()
    {
        $cinema = Cinema::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/cinemas/'.$cinema->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/cinemas/'.$cinema->id
        );

        $this->response->assertStatus(404);
    }
}
