<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCinemaHallAPIRequest;
use App\Http\Requests\API\UpdateCinemaHallAPIRequest;
use App\Models\CinemaHall;
use App\Repositories\CinemaHallRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class CinemaHallController
 * @package App\Http\Controllers\API
 */

class CinemaHallAPIController extends AppBaseController
{
    /** @var  CinemaHallRepository */
    private $cinemaHallRepository;

    public function __construct(CinemaHallRepository $cinemaHallRepo)
    {
        $this->cinemaHallRepository = $cinemaHallRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/cinema_halls",
     *      summary="Get a listing of the CinemaHalls.",
     *      tags={"CinemaHall"},
     *      description="Get all CinemaHalls",
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
     *                  @SWG\Items(ref="#/definitions/CinemaHall")
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
        $cinemaHalls = $this->cinemaHallRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($cinemaHalls->toArray(), 'Cinema Halls retrieved successfully');
    }

    /**
     * @param CreateCinemaHallAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/cinema_halls",
     *      summary="Store a newly created CinemaHall in storage",
     *      tags={"CinemaHall"},
     *      description="Store CinemaHall",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="CinemaHall that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/CinemaHall")
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
     *                  ref="#/definitions/CinemaHall"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateCinemaHallAPIRequest $request)
    {
        $input = $request->all();

        $cinemaHall = $this->cinemaHallRepository->create($input);

        return $this->sendResponse($cinemaHall->toArray(), 'Cinema Hall saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/cinema_halls/{id}",
     *      summary="Display the specified CinemaHall",
     *      tags={"CinemaHall"},
     *      description="Get CinemaHall",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of CinemaHall",
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
     *                  ref="#/definitions/CinemaHall"
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
        /** @var CinemaHall $cinemaHall */
        $cinemaHall = $this->cinemaHallRepository->find($id);

        if (empty($cinemaHall)) {
            return $this->sendError('Cinema Hall not found');
        }

        return $this->sendResponse($cinemaHall->toArray(), 'Cinema Hall retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateCinemaHallAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/cinema_halls/{id}",
     *      summary="Update the specified CinemaHall in storage",
     *      tags={"CinemaHall"},
     *      description="Update CinemaHall",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of CinemaHall",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="CinemaHall that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/CinemaHall")
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
     *                  ref="#/definitions/CinemaHall"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateCinemaHallAPIRequest $request)
    {
        $input = $request->all();

        /** @var CinemaHall $cinemaHall */
        $cinemaHall = $this->cinemaHallRepository->find($id);

        if (empty($cinemaHall)) {
            return $this->sendError('Cinema Hall not found');
        }

        $cinemaHall = $this->cinemaHallRepository->update($input, $id);

        return $this->sendResponse($cinemaHall->toArray(), 'CinemaHall updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/cinema_halls/{id}",
     *      summary="Remove the specified CinemaHall from storage",
     *      tags={"CinemaHall"},
     *      description="Delete CinemaHall",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of CinemaHall",
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
        /** @var CinemaHall $cinemaHall */
        $cinemaHall = $this->cinemaHallRepository->find($id);

        if (empty($cinemaHall)) {
            return $this->sendError('Cinema Hall not found');
        }

        $cinemaHall->delete();

        return $this->sendSuccess('Cinema Hall deleted successfully');
    }
}
