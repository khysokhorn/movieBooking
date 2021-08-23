<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateShowAPIRequest;
use App\Http\Requests\API\UpdateShowAPIRequest;
use App\Models\Show;
use App\Repositories\ShowRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ShowController
 * @package App\Http\Controllers\API
 */

class ShowAPIController extends AppBaseController
{
    /** @var  ShowRepository */
    private $showRepository;

    public function __construct(ShowRepository $showRepo)
    {
        $this->showRepository = $showRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/shows",
     *      summary="Get a listing of the Shows.",
     *      tags={"Show"},
     *      description="Get all Shows",
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
     *                  @SWG\Items(ref="#/definitions/Show")
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
        $shows = $this->showRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($shows->toArray(), 'Shows retrieved successfully');
    }

    /**
     * @param CreateShowAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/shows",
     *      summary="Store a newly created Show in storage",
     *      tags={"Show"},
     *      description="Store Show",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Show that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Show")
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
     *                  ref="#/definitions/Show"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateShowAPIRequest $request)
    {
        $input = $request->all();

        $show = $this->showRepository->create($input);

        return $this->sendResponse($show->toArray(), 'Show saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/shows/{id}",
     *      summary="Display the specified Show",
     *      tags={"Show"},
     *      description="Get Show",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Show",
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
     *                  ref="#/definitions/Show"
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
        /** @var Show $show */
        $show = $this->showRepository->find($id);

        if (empty($show)) {
            return $this->sendError('Show not found');
        }

        return $this->sendResponse($show->toArray(), 'Show retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateShowAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/shows/{id}",
     *      summary="Update the specified Show in storage",
     *      tags={"Show"},
     *      description="Update Show",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Show",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Show that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Show")
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
     *                  ref="#/definitions/Show"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateShowAPIRequest $request)
    {
        $input = $request->all();

        /** @var Show $show */
        $show = $this->showRepository->find($id);

        if (empty($show)) {
            return $this->sendError('Show not found');
        }

        $show = $this->showRepository->update($input, $id);

        return $this->sendResponse($show->toArray(), 'Show updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/shows/{id}",
     *      summary="Remove the specified Show from storage",
     *      tags={"Show"},
     *      description="Delete Show",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Show",
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
        /** @var Show $show */
        $show = $this->showRepository->find($id);

        if (empty($show)) {
            return $this->sendError('Show not found');
        }

        $show->delete();

        return $this->sendSuccess('Show deleted successfully');
    }
}
