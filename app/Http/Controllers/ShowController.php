<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateShowRequest;
use App\Http\Requests\UpdateShowRequest;
use App\Repositories\ShowRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ShowController extends AppBaseController
{
    /** @var  ShowRepository */
    private $showRepository;

    public function __construct(ShowRepository $showRepo)
    {
        $this->showRepository = $showRepo;
    }

    /**
     * Display a listing of the Show.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $shows = $this->showRepository->all();

        return view('shows.index')
            ->with('shows', $shows);
    }

    /**
     * Show the form for creating a new Show.
     *
     * @return Response
     */
    public function create()
    {
        return view('shows.create');
    }

    /**
     * Store a newly created Show in storage.
     *
     * @param CreateShowRequest $request
     *
     * @return Response
     */
    public function store(CreateShowRequest $request)
    {
        $input = $request->all();

        $show = $this->showRepository->create($input);

        Flash::success('Show saved successfully.');

        return redirect(route('shows.index'));
    }

    /**
     * Display the specified Show.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $show = $this->showRepository->find($id);

        if (empty($show)) {
            Flash::error('Show not found');

            return redirect(route('shows.index'));
        }

        return view('shows.show')->with('show', $show);
    }

    /**
     * Show the form for editing the specified Show.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $show = $this->showRepository->find($id);

        if (empty($show)) {
            Flash::error('Show not found');

            return redirect(route('shows.index'));
        }

        return view('shows.edit')->with('show', $show);
    }

    /**
     * Update the specified Show in storage.
     *
     * @param int $id
     * @param UpdateShowRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateShowRequest $request)
    {
        $show = $this->showRepository->find($id);

        if (empty($show)) {
            Flash::error('Show not found');

            return redirect(route('shows.index'));
        }

        $show = $this->showRepository->update($request->all(), $id);

        Flash::success('Show updated successfully.');

        return redirect(route('shows.index'));
    }

    /**
     * Remove the specified Show from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $show = $this->showRepository->find($id);

        if (empty($show)) {
            Flash::error('Show not found');

            return redirect(route('shows.index'));
        }

        $this->showRepository->delete($id);

        Flash::success('Show deleted successfully.');

        return redirect(route('shows.index'));
    }
}
