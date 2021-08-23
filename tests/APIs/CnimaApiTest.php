<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Cnima;

class CnimaApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_cnima()
    {
        $cnima = Cnima::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/cnimas', $cnima
        );

        $this->assertApiResponse($cnima);
    }

    /**
     * @test
     */
    public function test_read_cnima()
    {
        $cnima = Cnima::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/cnimas/'.$cnima->id
        );

        $this->assertApiResponse($cnima->toArray());
    }

    /**
     * @test
     */
    public function test_update_cnima()
    {
        $cnima = Cnima::factory()->create();
        $editedCnima = Cnima::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/cnimas/'.$cnima->id,
            $editedCnima
        );

        $this->assertApiResponse($editedCnima);
    }

    /**
     * @test
     */
    public function test_delete_cnima()
    {
        $cnima = Cnima::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/cnimas/'.$cnima->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/cnimas/'.$cnima->id
        );

        $this->response->assertStatus(404);
    }
}
