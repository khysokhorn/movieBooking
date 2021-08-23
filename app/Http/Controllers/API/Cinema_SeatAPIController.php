<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCinema_SeatAPIRequest;
use App\Http\Requests\API\UpdateCinema_SeatAPIRequest;
use App\Models\Cinema_Seat;
use App\Repositories\Cinema_SeatRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class Cinema_SeatController
 * @package App\Http\Controllers\API
 */

class Cinema_SeatAPIController extends AppBaseController
{
    /** @var  Cinema_SeatRepository */
    private $cinemaSeatRepository;

    public function __construct(Cinema_SeatRepository $cinemaSeatRepo)
    {
        $this->cinemaSeatRepository = $cinemaSeatRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/cinemaSeats",
     *      summary="Get a listing of the Cinema_Seats.",
     *      tags={"Cinema_Seat"},
     *      description="Get all Cinema_Seats",
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
     *                  @SWG\Items(ref="#/definitions/Cinema_Seat")
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
        $cinemaSeats = $this->cinemaSeatRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($cinemaSeats->toArray(), 'Cinema  Seats retrieved successfully');
    }

    /**
     * @param CreateCinema_SeatAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/cinemaSeats",
     *      summary="Store a newly created Cinema_Seat in storage",
     *      tags={"Cinema_Seat"},
     *      description="Store Cinema_Seat",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Cinema_Seat that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Cinema_Seat")
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
     *                  ref="#/definitions/Cinema_Seat"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateCinema_SeatAPIRequest $request)
    {
        $input = $request->all();

        $cinemaSeat = $this->cinemaSeatRepository->create($input);

        return $this->sendResponse($cinemaSeat->toArray(), 'Cinema  Seat saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/cinemaSeats/{id}",
     *      summary="Display the specified Cinema_Seat",
     *      tags={"Cinema_Seat"},
     *      description="Get Cinema_Seat",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Cinema_Seat",
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
     *                  ref="#/definitions/Cinema_Seat"
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
        /** @var Cinema_Seat $cinemaSeat */
        $cinemaSeat = $this->cinemaSeatRepository->find($id);

        if (empty($cinemaSeat)) {
            return $this->sendError('Cinema  Seat not found');
        }

        return $this->sendResponse($cinemaSeat->toArray(), 'Cinema  Seat retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateCinema_SeatAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/cinemaSeats/{id}",
     *      summary="Update the specified Cinema_Seat in storage",
     *      tags={"Cinema_Seat"},
     *      description="Update Cinema_Seat",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Cinema_Seat",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Cinema_Seat that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Cinema_Seat")
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
     *                  ref="#/definitions/Cinema_Seat"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateCinema_SeatAPIRequest $request)
    {
        $input = $request->all();

        /** @var Cinema_Seat $cinemaSeat */
        $cinemaSeat = $this->cinemaSeatRepository->find($id);

        if (empty($cinemaSeat)) {
            return $this->sendError('Cinema  Seat not found');
        }

        $cinemaSeat = $this->cinemaSeatRepository->update($input, $id);

        return $this->sendResponse($cinemaSeat->toArray(), 'Cinema_Seat updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/cinemaSeats/{id}",
     *      summary="Remove the specified Cinema_Seat from storage",
     *      tags={"Cinema_Seat"},
     *      description="Delete Cinema_Seat",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Cinema_Seat",
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
        /** @var Cinema_Seat $cinemaSeat */
        $cinemaSeat = $this->cinemaSeatRepository->find($id);

        if (empty($cinemaSeat)) {
            return $this->sendError('Cinema  Seat not found');
        }

        $cinemaSeat->delete();

        return $this->sendSuccess('Cinema  Seat deleted successfully');
    }
}
