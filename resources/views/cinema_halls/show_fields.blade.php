<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $cinemaHall->name }}</p>
</div>

<!-- Totalseat Field -->
<div class="col-sm-12">
    {!! Form::label('totalSeat', 'Totalseat:') !!}
    <p>{{ $cinemaHall->totalSeat }}</p>
</div>

<!-- Cinema Id Field -->
<div class="col-sm-12">
    {!! Form::label('cinema_id', 'Cinema Id:') !!}
    <p>{{ $cinemaHall->cinema_id }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $cinemaHall->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $cinemaHall->updated_at }}</p>
</div>

