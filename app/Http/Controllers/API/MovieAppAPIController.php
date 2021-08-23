<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMovieAppAPIRequest;
use App\Http\Requests\API\UpdateMovieAppAPIRequest;
use App\Models\MovieApp;
use App\Repositories\MovieAppRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

use Response;

/**
 * Class MovieAppController
 * @package App\Http\Controllers\API
 */

class MovieAppAPIController extends AppBaseController
{
    /** @var  MovieAppRepository */
    private $movieAppRepository;

    public function __construct(MovieAppRepository $movieAppRepo)
    {
        $this->movieAppRepository = $movieAppRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/movie_apps",
     *      summary="Get a listing of the MovieApps.",
     *      tags={"MovieApps"},
     *      description="Get all MovieApps",
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
     *                  @SWG\Items(ref="#/definitions/MovieApp")
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
        $movieApps = $this->movieAppRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($movieApps->toArray(), 'Movie Apps retrieved successfully');
    }

    /**
     * @param CreateCnimaAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/movie_apps",
     *      summary="Store a newly created MovieApps in storage",
     *      tags={"MovieApps"},
     *      description="Store MovieApps",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="MovieApps that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/MovieApp")
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
     *                  ref="#/definitions/MovieApp"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateMovieAppAPIRequest $request)
    {
        $input = $request->all();

        $movieApp = $this->movieAppRepository->create($input);

        return $this->sendResponse($movieApp->toArray(), 'Movie App saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/movie_apps/{id}",
     *      summary="Display the specified MovieApps",
     *      tags={"MovieApps"},
     *      description="Get MovieApps",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of MovieApps",
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
     *                  ref="#/definitions/MovieApp"
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
        /** @var MovieApp $movieApp */
        $movieApp = $this->movieAppRepository->find($id);

        if (empty($movieApp)) {
            return $this->sendError('Movie App not found');
        }

        return $this->sendResponse($movieApp->toArray(), 'Movie App retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateCnimaAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/movie_apps/{id}",
     *      summary="Update the specified MovieApp in storage",
     *      tags={"MovieApps"},
     *      description="Update MovieApp",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of MovieApp",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="MovieApp that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/MovieApp")
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
     *                  ref="#/definitions/MovieApp"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateMovieAppAPIRequest $request)
    {
        $input = $request->all();

        /** @var MovieApp $movieApp */
        $movieApp = $this->movieAppRepository->find($id);

        if (empty($movieApp)) {
            return $this->sendError('Movie App not found');
        }

        $movieApp = $this->movieAppRepository->update($input, $id);

        return $this->sendResponse($movieApp->toArray(), 'MovieApp updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/movie_apps/{id}",
     *      summary="Remove the specified MovieApp from storage",
     *      tags={"MovieApps"},
     *      description="Delete MovieApp",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of MovieApp",
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
        /** @var MovieApp $movieApp */
        $movieApp = $this->movieAppRepository->find($id);

        if (empty($movieApp)) {
            return $this->sendError('Movie App not found');
        }

        $movieApp->delete();

        return $this->sendSuccess('Movie App deleted successfully');
    }
}
