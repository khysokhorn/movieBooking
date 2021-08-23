<div class="table-responsive">
    <table class="table" id="shows-table">
        <thead>
        <tr>
            <th>Date</th>
        <th>Start Time</th>
        <th>Endtime</th>
        <th>Cinema Halls Id</th>
        <th>Movie Apps Id</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($shows as $show)
            <tr>
                <td>{{ $show->date }}</td>
            <td>{{ $show->start_time }}</td>
            <td>{{ $show->endTime }}</td>
            <td>{{ $show->cinema_halls_id }}</td>
            <td>{{ $show->movie_apps_id }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['shows.destroy', $show->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('shows.show', [$show->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('shows.edit', [$show->id]) }}"
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
