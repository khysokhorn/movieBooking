<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCinemaRequest;
use App\Http\Requests\UpdateCinemaRequest;
use App\Repositories\CinemaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class CinemaController extends AppBaseController
{
    /** @var  CinemaRepository */
    private $cinemaRepository;

    public function __construct(CinemaRepository $cinemaRepo)
    {
        $this->cinemaRepository = $cinemaRepo;
    }

    /**
     * Display a listing of the Cinema.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $cinemas = $this->cinemaRepository->all();
      
        return view('cinemas.index')
            ->with('cinemas', $cinemas);
    }

    /**
     * Show the form for creating a new Cinema.
     *
     * @return Response
     */
    public function create()
    {
        return view('cinemas.create');
    }

    /**
     * Store a newly created Cinema in storage.
     *
     * @param CreateCinemaRequest $request
     *
     * @return Response
     */
    public function store(CreateCinemaRequest $request)
    {
        $input = $request->all();

        $cinema = $this->cinemaRepository->create($input);

        Flash::success('Cinema saved successfully.');

        return redirect(route('cinemas.index'));
    }

    /**
     * Display the specified Cinema.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cinema = $this->cinemaRepository->find($id);

        if (empty($cinema)) {
            Flash::error('Cinema not found');

            return redirect(route('cinemas.index'));
        }

        return view('cinemas.show')->with('cinema', $cinema);
    }

    /**
     * Show the form for editing the specified Cinema.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cinema = $this->cinemaRepository->find($id);

        if (empty($cinema)) {
            Flash::error('Cinema not found');

            return redirect(route('cinemas.index'));
        }

        return view('cinemas.edit')->with('cinema', $cinema);
    }

    /**
     * Update the specified Cinema in storage.
     *
     * @param int $id
     * @param UpdateCinemaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCinemaRequest $request)
    {
        $cinema = $this->cinemaRepository->find($id);

        if (empty($cinema)) {
            Flash::error('Cinema not found');

            return redirect(route('cinemas.index'));
        }

        $cinema = $this->cinemaRepository->update($request->all(), $id);

        Flash::success('Cinema updated successfully.');

        return redirect(route('cinemas.index'));
    }

    /**
     * Remove the specified Cinema from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cinema = $this->cinemaRepository->find($id);

        if (empty($cinema)) {
            Flash::error('Cinema not found');

            return redirect(route('cinemas.index'));
        }

        $this->cinemaRepository->delete($id);

        Flash::success('Cinema deleted successfully.');

        return redirect(route('cinemas.index'));
    }
}
