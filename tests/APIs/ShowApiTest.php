<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Show;

class ShowApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_show()
    {
        $show = Show::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/shows', $show
        );

        $this->assertApiResponse($show);
    }

    /**
     * @test
     */
    public function test_read_show()
    {
        $show = Show::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/shows/'.$show->id
        );

        $this->assertApiResponse($show->toArray());
    }

    /**
     * @test
     */
    public function test_update_show()
    {
        $show = Show::factory()->create();
        $editedShow = Show::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/shows/'.$show->id,
            $editedShow
        );

        $this->assertApiResponse($editedShow);
    }

    /**
     * @test
     */
    public function test_delete_show()
    {
        $show = Show::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/shows/'.$show->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/shows/'.$show->id
        );

        $this->response->assertStatus(404);
    }
}
