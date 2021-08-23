<?php namespace Tests\Repositories;

use App\Models\Show;
use App\Repositories\ShowRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ShowRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ShowRepository
     */
    protected $showRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->showRepo = \App::make(ShowRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_show()
    {
        $show = Show::factory()->make()->toArray();

        $createdShow = $this->showRepo->create($show);

        $createdShow = $createdShow->toArray();
        $this->assertArrayHasKey('id', $createdShow);
        $this->assertNotNull($createdShow['id'], 'Created Show must have id specified');
        $this->assertNotNull(Show::find($createdShow['id']), 'Show with given id must be in DB');
        $this->assertModelData($show, $createdShow);
    }

    /**
     * @test read
     */
    public function test_read_show()
    {
        $show = Show::factory()->create();

        $dbShow = $this->showRepo->find($show->id);

        $dbShow = $dbShow->toArray();
        $this->assertModelData($show->toArray(), $dbShow);
    }

    /**
     * @test update
     */
    public function test_update_show()
    {
        $show = Show::factory()->create();
        $fakeShow = Show::factory()->make()->toArray();

        $updatedShow = $this->showRepo->update($fakeShow, $show->id);

        $this->assertModelData($fakeShow, $updatedShow->toArray());
        $dbShow = $this->showRepo->find($show->id);
        $this->assertModelData($fakeShow, $dbShow->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_show()
    {
        $show = Show::factory()->create();

        $resp = $this->showRepo->delete($show->id);

        $this->assertTrue($resp);
        $this->assertNull(Show::find($show->id), 'Show should not exist in DB');
    }
}
