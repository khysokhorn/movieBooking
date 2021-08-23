<?php namespace Tests\Repositories;

use App\Models\Cinema;
use App\Repositories\CinemaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class CinemaRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var CinemaRepository
     */
    protected $cinemaRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->cinemaRepo = \App::make(CinemaRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_cinema()
    {
        $cinema = Cinema::factory()->make()->toArray();

        $createdCinema = $this->cinemaRepo->create($cinema);

        $createdCinema = $createdCinema->toArray();
        $this->assertArrayHasKey('id', $createdCinema);
        $this->assertNotNull($createdCinema['id'], 'Created Cinema must have id specified');
        $this->assertNotNull(Cinema::find($createdCinema['id']), 'Cinema with given id must be in DB');
        $this->assertModelData($cinema, $createdCinema);
    }

    /**
     * @test read
     */
    public function test_read_cinema()
    {
        $cinema = Cinema::factory()->create();

        $dbCinema = $this->cinemaRepo->find($cinema->id);

        $dbCinema = $dbCinema->toArray();
        $this->assertModelData($cinema->toArray(), $dbCinema);
    }

    /**
     * @test update
     */
    public function test_update_cinema()
    {
        $cinema = Cinema::factory()->create();
        $fakeCinema = Cinema::factory()->make()->toArray();

        $updatedCinema = $this->cinemaRepo->update($fakeCinema, $cinema->id);

        $this->assertModelData($fakeCinema, $updatedCinema->toArray());
        $dbCinema = $this->cinemaRepo->find($cinema->id);
        $this->assertModelData($fakeCinema, $dbCinema->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_cinema()
    {
        $cinema = Cinema::factory()->create();

        $resp = $this->cinemaRepo->delete($cinema->id);

        $this->assertTrue($resp);
        $this->assertNull(Cinema::find($cinema->id), 'Cinema should not exist in DB');
    }
}
