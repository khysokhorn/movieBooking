<?php namespace Tests\Repositories;

use App\Models\Cnima;
use App\Repositories\CnimaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class CnimaRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var CnimaRepository
     */
    protected $cnimaRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->cnimaRepo = \App::make(CnimaRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_cnima()
    {
        $cnima = Cnima::factory()->make()->toArray();

        $createdCnima = $this->cnimaRepo->create($cnima);

        $createdCnima = $createdCnima->toArray();
        $this->assertArrayHasKey('id', $createdCnima);
        $this->assertNotNull($createdCnima['id'], 'Created Cnima must have id specified');
        $this->assertNotNull(Cnima::find($createdCnima['id']), 'Cnima with given id must be in DB');
        $this->assertModelData($cnima, $createdCnima);
    }

    /**
     * @test read
     */
    public function test_read_cnima()
    {
        $cnima = Cnima::factory()->create();

        $dbCnima = $this->cnimaRepo->find($cnima->id);

        $dbCnima = $dbCnima->toArray();
        $this->assertModelData($cnima->toArray(), $dbCnima);
    }

    /**
     * @test update
     */
    public function test_update_cnima()
    {
        $cnima = Cnima::factory()->create();
        $fakeCnima = Cnima::factory()->make()->toArray();

        $updatedCnima = $this->cnimaRepo->update($fakeCnima, $cnima->id);

        $this->assertModelData($fakeCnima, $updatedCnima->toArray());
        $dbCnima = $this->cnimaRepo->find($cnima->id);
        $this->assertModelData($fakeCnima, $dbCnima->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_cnima()
    {
        $cnima = Cnima::factory()->create();

        $resp = $this->cnimaRepo->delete($cnima->id);

        $this->assertTrue($resp);
        $this->assertNull(Cnima::find($cnima->id), 'Cnima should not exist in DB');
    }
}
