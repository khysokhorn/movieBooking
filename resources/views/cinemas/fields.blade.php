<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- TotalCinemaHalls Field -->
<div class="form-group col-sm-6">
    {!! Form::label('totalCinemaHalls', 'Total Cinema Halls:') !!}
    {!! Form::text('totalCinemaHalls', null, ['class' => 'form-control']) !!}
</div>


<!-- City Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('city_id', 'City Id:') !!}
    {!! Form::select('city_id', $cityItems, null, ['class' => 'form-control custom-select']) !!}
</div>