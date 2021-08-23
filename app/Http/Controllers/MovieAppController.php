<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMovieAppRequest;
use App\Http\Requests\UpdateMovieAppRequest;
use App\Repositories\MovieAppRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class MovieAppController extends AppBaseController
{
    /** @var  MovieAppRepository */
    private $movieAppRepository;

    public function __construct(MovieAppRepository $movieAppRepo)
    {
        $this->movieAppRepository = $movieAppRepo;
    }

    /**
     * Display a listing of the MovieApp.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $movieApps = $this->movieAppRepository->all();

        return view('movie_apps.index')
            ->with('movieApps', $movieApps);
    }

    /**
     * Show the form for creating a new MovieApp.
     *
     * @return Response
     */
    public function create()
    {
        return view('movie_apps.create');
    }

    /**
     * Store a newly created MovieApp in storage.
     *
     * @param CreateMovieAppRequest $request
     *
     * @return Response
     */
    public function store(CreateMovieAppRequest $request)
    {
        $input = $request->all();

        $movieApp = $this->movieAppRepository->create($input);

        Flash::success('Movie App saved successfully.');

        return redirect(route('movieApps.index'));
    }

    /**
     * Display the specified MovieApp.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $movieApp = $this->movieAppRepository->find($id);

        if (empty($movieApp)) {
            Flash::error('Movie App not found');

            return redirect(route('movieApps.index'));
        }

        return view('movie_apps.show')->with('movieApp', $movieApp);
    }

    /**
     * Show the form for editing the specified MovieApp.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $movieApp = $this->movieAppRepository->find($id);

        if (empty($movieApp)) {
            Flash::error('Movie App not found');

            return redirect(route('movieApps.index'));
        }

        return view('movie_apps.edit')->with('movieApp', $movieApp);
    }

    /**
     * Update the specified MovieApp in storage.
     *
     * @param int $id
     * @param UpdateMovieAppRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMovieAppRequest $request)
    {
        $movieApp = $this->movieAppRepository->find($id);

        if (empty($movieApp)) {
            Flash::error('Movie App not found');

            return redirect(route('movieApps.index'));
        }

        $movieApp = $this->movieAppRepository->update($request->all(), $id);

        Flash::success('Movie App updated successfully.');

        return redirect(route('movieApps.index'));
    }

    /**
     * Remove the specified MovieApp from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $movieApp = $this->movieAppRepository->find($id);

        if (empty($movieApp)) {
            Flash::error('Movie App not found');

            return redirect(route('movieApps.index'));
        }

        $this->movieAppRepository->delete($id);

        Flash::success('Movie App deleted successfully.');

        return redirect(route('movieApps.index'));
    }
}
