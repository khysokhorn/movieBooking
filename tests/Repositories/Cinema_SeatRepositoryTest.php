<?php namespace Tests\Repositories;

use App\Models\Cinema_Seat;
use App\Repositories\Cinema_SeatRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class Cinema_SeatRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var Cinema_SeatRepository
     */
    protected $cinemaSeatRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->cinemaSeatRepo = \App::make(Cinema_SeatRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_cinema__seat()
    {
        $cinemaSeat = Cinema_Seat::factory()->make()->toArray();

        $createdCinema_Seat = $this->cinemaSeatRepo->create($cinemaSeat);

        $createdCinema_Seat = $createdCinema_Seat->toArray();
        $this->assertArrayHasKey('id', $createdCinema_Seat);
        $this->assertNotNull($createdCinema_Seat['id'], 'Created Cinema_Seat must have id specified');
        $this->assertNotNull(Cinema_Seat::find($createdCinema_Seat['id']), 'Cinema_Seat with given id must be in DB');
        $this->assertModelData($cinemaSeat, $createdCinema_Seat);
    }

    /**
     * @test read
     */
    public function test_read_cinema__seat()
    {
        $cinemaSeat = Cinema_Seat::factory()->create();

        $dbCinema_Seat = $this->cinemaSeatRepo->find($cinemaSeat->id);

        $dbCinema_Seat = $dbCinema_Seat->toArray();
        $this->assertModelData($cinemaSeat->toArray(), $dbCinema_Seat);
    }

    /**
     * @test update
     */
    public function test_update_cinema__seat()
    {
        $cinemaSeat = Cinema_Seat::factory()->create();
        $fakeCinema_Seat = Cinema_Seat::factory()->make()->toArray();

        $updatedCinema_Seat = $this->cinemaSeatRepo->update($fakeCinema_Seat, $cinemaSeat->id);

        $this->assertModelData($fakeCinema_Seat, $updatedCinema_Seat->toArray());
        $dbCinema_Seat = $this->cinemaSeatRepo->find($cinemaSeat->id);
        $this->assertModelData($fakeCinema_Seat, $dbCinema_Seat->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_cinema__seat()
    {
        $cinemaSeat = Cinema_Seat::factory()->create();

        $resp = $this->cinemaSeatRepo->delete($cinemaSeat->id);

        $this->assertTrue($resp);
        $this->assertNull(Cinema_Seat::find($cinemaSeat->id), 'Cinema_Seat should not exist in DB');
    }
}
