<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCinemaAPIRequest;
use App\Http\Requests\API\UpdateCinemaAPIRequest;
use App\Models\Cinema;
use App\Repositories\CinemaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class CinemaController
 * @package App\Http\Controllers\API
 */

class CinemaAPIController extends AppBaseController
{
    /** @var  CinemaRepository */
    private $cinemaRepository;

    public function __construct(CinemaRepository $cinemaRepo)
    {
        $this->cinemaRepository = $cinemaRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/cinemas",
     *      summary="Get a listing of the Cinemas.",
     *      tags={"Cinema"},
     *      description="Get all Cinemas",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/Cinema")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $cinemas = $this->cinemaRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($cinemas->toArray(), 'Cinemas retrieved successfully');
    }

    /**
     * @param CreateCinemaAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/cinemas",
     *      summary="Store a newly created Cinema in storage",
     *      tags={"Cinema"},
     *      description="Store Cinema",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Cinema that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Cinema")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Cinema"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateCinemaAPIRequest $request)
    {
        $input = $request->all();

        $cinema = $this->cinemaRepository->create($input);

        return $this->sendResponse($cinema->toArray(), 'Cinema saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/cinemas/{id}",
     *      summary="Display the specified Cinema",
     *      tags={"Cinema"},
     *      description="Get Cinema",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Cinema",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Cinema"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id)
    {
        /** @var Cinema $cinema */
        $cinema = $this->cinemaRepository->find($id);

        if (empty($cinema)) {
            return $this->sendError('Cinema not found');
        }

        return $this->sendResponse($cinema->toArray(), 'Cinema retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateCinemaAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/cinemas/{id}",
     *      summary="Update the specified Cinema in storage",
     *      tags={"Cinema"},
     *      description="Update Cinema",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Cinema",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Cinema that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Cinema")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Cinema"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateCinemaAPIRequest $request)
    {
        $input = $request->all();

        /** @var Cinema $cinema */
        $cinema = $this->cinemaRepository->find($id);

        if (empty($cinema)) {
            return $this->sendError('Cinema not found');
        }

        $cinema = $this->cinemaRepository->update($input, $id);

        return $this->sendResponse($cinema->toArray(), 'Cinema updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/cinemas/{id}",
     *      summary="Remove the specified Cinema from storage",
     *      tags={"Cinema"},
     *      description="Delete Cinema",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Cinema",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
        /** @var Cinema $cinema */
        $cinema = $this->cinemaRepository->find($id);

        if (empty($cinema)) {
            return $this->sendError('Cinema not found');
        }

        $cinema->delete();

        return $this->sendSuccess('Cinema deleted successfully');
    }
}
