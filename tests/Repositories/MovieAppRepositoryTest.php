<?php namespace Tests\Repositories;

use App\Models\MovieApp;
use App\Repositories\MovieAppRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class MovieAppRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var MovieAppRepository
     */
    protected $movieAppRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->movieAppRepo = \App::make(MovieAppRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_movie_app()
    {
        $movieApp = MovieApp::factory()->make()->toArray();

        $createdMovieApp = $this->movieAppRepo->create($movieApp);

        $createdMovieApp = $createdMovieApp->toArray();
        $this->assertArrayHasKey('id', $createdMovieApp);
        $this->assertNotNull($createdMovieApp['id'], 'Created MovieApp must have id specified');
        $this->assertNotNull(MovieApp::find($createdMovieApp['id']), 'MovieApp with given id must be in DB');
        $this->assertModelData($movieApp, $createdMovieApp);
    }

    /**
     * @test read
     */
    public function test_read_movie_app()
    {
        $movieApp = MovieApp::factory()->create();

        $dbMovieApp = $this->movieAppRepo->find($movieApp->id);

        $dbMovieApp = $dbMovieApp->toArray();
        $this->assertModelData($movieApp->toArray(), $dbMovieApp);
    }

    /**
     * @test update
     */
    public function test_update_movie_app()
    {
        $movieApp = MovieApp::factory()->create();
        $fakeMovieApp = MovieApp::factory()->make()->toArray();

        $updatedMovieApp = $this->movieAppRepo->update($fakeMovieApp, $movieApp->id);

        $this->assertModelData($fakeMovieApp, $updatedMovieApp->toArray());
        $dbMovieApp = $this->movieAppRepo->find($movieApp->id);
        $this->assertModelData($fakeMovieApp, $dbMovieApp->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_movie_app()
    {
        $movieApp = MovieApp::factory()->create();

        $resp = $this->movieAppRepo->delete($movieApp->id);

        $this->assertTrue($resp);
        $this->assertNull(MovieApp::find($movieApp->id), 'MovieApp should not exist in DB');
    }
}
