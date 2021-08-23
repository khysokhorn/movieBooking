<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCinemaHallRequest;
use App\Http\Requests\UpdateCinemaHallRequest;
use App\Repositories\CinemaHallRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class CinemaHallController extends AppBaseController
{
    /** @var  CinemaHallRepository */
    private $cinemaHallRepository;

    public function __construct(CinemaHallRepository $cinemaHallRepo)
    {
        $this->cinemaHallRepository = $cinemaHallRepo;
    }

    /**
     * Display a listing of the CinemaHall.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $cinemaHalls = $this->cinemaHallRepository->all();

        return view('cinema_halls.index')
            ->with('cinemaHalls', $cinemaHalls);
    }

    /**
     * Show the form for creating a new CinemaHall.
     *
     * @return Response
     */
    public function create()
    {
        return view('cinema_halls.create');
    }

    /**
     * Store a newly created CinemaHall in storage.
     *
     * @param CreateCinemaHallRequest $request
     *
     * @return Response
     */
    public function store(CreateCinemaHallRequest $request)
    {
        $input = $request->all();

        $cinemaHall = $this->cinemaHallRepository->create($input);

        Flash::success('Cinema Hall saved successfully.');

        return redirect(route('cinemaHalls.index'));
    }

    /**
     * Display the specified CinemaHall.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cinemaHall = $this->cinemaHallRepository->find($id);

        if (empty($cinemaHall)) {
            Flash::error('Cinema Hall not found');

            return redirect(route('cinemaHalls.index'));
        }

        return view('cinema_halls.show')->with('cinemaHall', $cinemaHall);
    }

    /**
     * Show the form for editing the specified CinemaHall.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cinemaHall = $this->cinemaHallRepository->find($id);

        if (empty($cinemaHall)) {
            Flash::error('Cinema Hall not found');

            return redirect(route('cinemaHalls.index'));
        }

        return view('cinema_halls.edit')->with('cinemaHall', $cinemaHall);
    }

    /**
     * Update the specified CinemaHall in storage.
     *
     * @param int $id
     * @param UpdateCinemaHallRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCinemaHallRequest $request)
    {
        $cinemaHall = $this->cinemaHallRepository->find($id);

        if (empty($cinemaHall)) {
            Flash::error('Cinema Hall not found');

            return redirect(route('cinemaHalls.index'));
        }

        $cinemaHall = $this->cinemaHallRepository->update($request->all(), $id);

        Flash::success('Cinema Hall updated successfully.');

        return redirect(route('cinemaHalls.index'));
    }

    /**
     * Remove the specified CinemaHall from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cinemaHall = $this->cinemaHallRepository->find($id);

        if (empty($cinemaHall)) {
            Flash::error('Cinema Hall not found');

            return redirect(route('cinemaHalls.index'));
        }

        $this->cinemaHallRepository->delete($id);

        Flash::success('Cinema Hall deleted successfully.');

        return redirect(route('cinemaHalls.index'));
    }
}
