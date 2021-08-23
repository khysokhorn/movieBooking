<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Totalseat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('totalSeat', 'Total Seat:') !!}
    {!! Form::text('totalSeat', null, ['class' => 'form-control']) !!}
</div>

<!-- Cinema Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cinema_id', 'Cinema Id:') !!}
    {!! Form::select('cinema_id', $cinemaItems, null, ['class' => 'form-control custom-select']) !!}
</div>