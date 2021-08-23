<?php namespace Tests\Repositories;

use App\Models\CinemaHall;
use App\Repositories\CinemaHallRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class CinemaHallRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var CinemaHallRepository
     */
    protected $cinemaHallRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->cinemaHallRepo = \App::make(CinemaHallRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_cinema_hall()
    {
        $cinemaHall = CinemaHall::factory()->make()->toArray();

        $createdCinemaHall = $this->cinemaHallRepo->create($cinemaHall);

        $createdCinemaHall = $createdCinemaHall->toArray();
        $this->assertArrayHasKey('id', $createdCinemaHall);
        $this->assertNotNull($createdCinemaHall['id'], 'Created CinemaHall must have id specified');
        $this->assertNotNull(CinemaHall::find($createdCinemaHall['id']), 'CinemaHall with given id must be in DB');
        $this->assertModelData($cinemaHall, $createdCinemaHall);
    }

    /**
     * @test read
     */
    public function test_read_cinema_hall()
    {
        $cinemaHall = CinemaHall::factory()->create();

        $dbCinemaHall = $this->cinemaHallRepo->find($cinemaHall->id);

        $dbCinemaHall = $dbCinemaHall->toArray();
        $this->assertModelData($cinemaHall->toArray(), $dbCinemaHall);
    }

    /**
     * @test update
     */
    public function test_update_cinema_hall()
    {
        $cinemaHall = CinemaHall::factory()->create();
        $fakeCinemaHall = CinemaHall::factory()->make()->toArray();

        $updatedCinemaHall = $this->cinemaHallRepo->update($fakeCinemaHall, $cinemaHall->id);

        $this->assertModelData($fakeCinemaHall, $updatedCinemaHall->toArray());
        $dbCinemaHall = $this->cinemaHallRepo->find($cinemaHall->id);
        $this->assertModelData($fakeCinemaHall, $dbCinemaHall->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_cinema_hall()
    {
        $cinemaHall = CinemaHall::factory()->create();

        $resp = $this->cinemaHallRepo->delete($cinemaHall->id);

        $this->assertTrue($resp);
        $this->assertNull(CinemaHall::find($cinemaHall->id), 'CinemaHall should not exist in DB');
    }
}
