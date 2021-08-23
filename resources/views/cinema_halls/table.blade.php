<div class="table-responsive">
    <table class="table" id="cinemaHalls-table">
        <thead>
        <tr>
            <th>Name</th>
        <th>Totalseat</th>
        <th>Cinema Id</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cinemaHalls as $cinemaHall)
            <tr>
                <td>{{ $cinemaHall->name }}</td>
            <td>{{ $cinemaHall->totalSeat }}</td>
            <td>{{ $cinemaHall->cinema_id }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['cinemaHalls.destroy', $cinemaHall->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('cinemaHalls.show', [$cinemaHall->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('cinemaHalls.edit', [$cinemaHall->id]) }}"
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
