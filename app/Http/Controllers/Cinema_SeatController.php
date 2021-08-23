<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCinema_SeatRequest;
use App\Http\Requests\UpdateCinema_SeatRequest;
use App\Repositories\Cinema_SeatRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class Cinema_SeatController extends AppBaseController
{
    /** @var  Cinema_SeatRepository */
    private $cinemaSeatRepository;

    public function __construct(Cinema_SeatRepository $cinemaSeatRepo)
    {
        $this->cinemaSeatRepository = $cinemaSeatRepo;
    }

    /**
     * Display a listing of the Cinema_Seat.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $cinemaSeats = $this->cinemaSeatRepository->all();

        return view('cinema_seats.index')
            ->with('cinemaSeats', $cinemaSeats);
    }

    /**
     * Show the form for creating a new Cinema_Seat.
     *
     * @return Response
     */
    public function create()
    {
        return view('cinema_seats.create');
    }

    /**
     * Store a newly created Cinema_Seat in storage.
     *
     * @param CreateCinema_SeatRequest $request
     *
     * @return Response
     */
    public function store(CreateCinema_SeatRequest $request)
    {
        $input = $request->all();

        $cinemaSeat = $this->cinemaSeatRepository->create($input);

        Flash::success('Cinema  Seat saved successfully.');

        return redirect(route('cinemaSeats.index'));
    }

    /**
     * Display the specified Cinema_Seat.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cinemaSeat = $this->cinemaSeatRepository->find($id);

        if (empty($cinemaSeat)) {
            Flash::error('Cinema  Seat not found');

            return redirect(route('cinemaSeats.index'));
        }

        return view('cinema_seats.show')->with('cinemaSeat', $cinemaSeat);
    }

    /**
     * Show the form for editing the specified Cinema_Seat.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cinemaSeat = $this->cinemaSeatRepository->find($id);

        if (empty($cinemaSeat)) {
            Flash::error('Cinema  Seat not found');

            return redirect(route('cinemaSeats.index'));
        }

        return view('cinema_seats.edit')->with('cinemaSeat', $cinemaSeat);
    }

    /**
     * Update the specified Cinema_Seat in storage.
     *
     * @param int $id
     * @param UpdateCinema_SeatRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCinema_SeatRequest $request)
    {
        $cinemaSeat = $this->cinemaSeatRepository->find($id);

        if (empty($cinemaSeat)) {
            Flash::error('Cinema  Seat not found');

            return redirect(route('cinemaSeats.index'));
        }

        $cinemaSeat = $this->cinemaSeatRepository->update($request->all(), $id);

        Flash::success('Cinema  Seat updated successfully.');

        return redirect(route('cinemaSeats.index'));
    }

    /**
     * Remove the specified Cinema_Seat from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cinemaSeat = $this->cinemaSeatRepository->find($id);

        if (empty($cinemaSeat)) {
            Flash::error('Cinema  Seat not found');

            return redirect(route('cinemaSeats.index'));
        }

        $this->cinemaSeatRepository->delete($id);

        Flash::success('Cinema  Seat deleted successfully.');

        return redirect(route('cinemaSeats.index'));
    }
}
