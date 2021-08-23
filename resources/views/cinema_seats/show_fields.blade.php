<!-- Seatnumber Field -->
<div class="col-sm-12">
    {!! Form::label('seatNumber', 'Seatnumber:') !!}
    <p>{{ $cinemaSeat->seatNumber }}</p>
</div>

<!-- Type Field -->
<div class="col-sm-12">
    {!! Form::label('type', 'Type:') !!}
    <p>{{ $cinemaSeat->type }}</p>
</div>

<!-- Cinema Halls Id Field -->
<div class="col-sm-12">
    {!! Form::label('cinema_halls_id', 'Cinema Halls Id:') !!}
    <p>{{ $cinemaSeat->cinema_halls_id }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $cinemaSeat->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $cinemaSeat->updated_at }}</p>
</div>

