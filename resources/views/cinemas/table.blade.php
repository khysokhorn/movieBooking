<div class="table-responsive">
    <table class="table" id="cinemas-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>City Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cinemas as $cinema)
            <tr>
                <td>{{ $cinema->name }}</td>
                <td>{{ $cinema->city_id }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['cinemas.destroy', $cinema->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('cinemas.show', [$cinema->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('cinemas.edit', [$cinema->id]) }}" class='btn btn-default btn-xs'>
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