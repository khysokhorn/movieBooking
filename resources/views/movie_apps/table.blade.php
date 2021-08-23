<div class="table-responsive">
    <table class="table" id="movieApps-table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Duration</th>
                <th>ReleaseDate</th>
                <th>Country</th>
                <th>Genre</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($movieApps as $movieApp)
            <tr>
                <td>{{ $movieApp->title }}</td>
                <td>{{ $movieApp->description }}</td>
                <td>{{ $movieApp->duration }}</td>
                <td>{{ $movieApp->releaseDate }}</td>
                <td>{{ $movieApp->country }}</td>
                <td>{{ $movieApp->genre }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['movieApps.destroy', $movieApp->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('movieApps.show', [$movieApp->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('movieApps.edit', [$movieApp->id]) }}" class='btn btn-default btn-xs'>
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