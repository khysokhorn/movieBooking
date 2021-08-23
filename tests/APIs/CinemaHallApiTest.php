<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\CinemaHall;

class CinemaHallApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_cinema_hall()
    {
        $cinemaHall = CinemaHall::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/cinema_halls', $cinemaHall
        );

        $this->assertApiResponse($cinemaHall);
    }

    /**
     * @test
     */
    public function test_read_cinema_hall()
    {
        $cinemaHall = CinemaHall::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/cinema_halls/'.$cinemaHall->id
        );

        $this->assertApiResponse($cinemaHall->toArray());
    }

    /**
     * @test
     */
    public function test_update_cinema_hall()
    {
        $cinemaHall = CinemaHall::factory()->create();
        $editedCinemaHall = CinemaHall::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/cinema_halls/'.$cinemaHall->id,
            $editedCinemaHall
        );

        $this->assertApiResponse($editedCinemaHall);
    }

    /**
     * @test
     */
    public function test_delete_cinema_hall()
    {
        $cinemaHall = CinemaHall::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/cinema_halls/'.$cinemaHall->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/cinema_halls/'.$cinemaHall->id
        );

        $this->response->assertStatus(404);
    }
}
