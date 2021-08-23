<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Cinema_Seat;

class Cinema_SeatApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_cinema__seat()
    {
        $cinemaSeat = Cinema_Seat::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/cinema__seats', $cinemaSeat
        );

        $this->assertApiResponse($cinemaSeat);
    }

    /**
     * @test
     */
    public function test_read_cinema__seat()
    {
        $cinemaSeat = Cinema_Seat::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/cinema__seats/'.$cinemaSeat->id
        );

        $this->assertApiResponse($cinemaSeat->toArray());
    }

    /**
     * @test
     */
    public function test_update_cinema__seat()
    {
        $cinemaSeat = Cinema_Seat::factory()->create();
        $editedCinema_Seat = Cinema_Seat::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/cinema__seats/'.$cinemaSeat->id,
            $editedCinema_Seat
        );

        $this->assertApiResponse($editedCinema_Seat);
    }

    /**
     * @test
     */
    public function test_delete_cinema__seat()
    {
        $cinemaSeat = Cinema_Seat::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/cinema__seats/'.$cinemaSeat->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/cinema__seats/'.$cinemaSeat->id
        );

        $this->response->assertStatus(404);
    }
}
