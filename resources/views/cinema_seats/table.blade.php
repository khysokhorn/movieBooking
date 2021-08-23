<div class="table-responsive">
    <table class="table" id="cinemaSeats-table">
        <thead>
        <tr>
            <th>Seatnumber</th>
        <th>Type</th>
        <th>Cinema Halls Id</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cinemaSeats as $cinemaSeat)
            <tr>
                <td>{{ $cinemaSeat->seatNumber }}</td>
            <td>{{ $cinemaSeat->type }}</td>
            <td>{{ $cinemaSeat->cinema_halls_id }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['cinemaSeats.destroy', $cinemaSeat->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('cinemaSeats.show', [$cinemaSeat->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('cinemaSeats.edit', [$cinemaSeat->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
