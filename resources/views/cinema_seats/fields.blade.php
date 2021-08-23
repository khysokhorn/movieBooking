<!-- Seatnumber Field -->
<div class="form-group col-sm-6">
    {!! Form::label('seatNumber', 'Seatnumber:') !!}
    {!! Form::text('seatNumber', null, ['class' => 'form-control']) !!}
</div>

<!-- Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type', 'Type:') !!}
    {!! Form::select('type', ["Regular", "Premium"], ['class' => 'form-control custom-select']) !!}
</div>


<!-- Cinema Halls Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cinema_halls_id', 'Cinema Halls Id:') !!}
    {!! Form::select('cinema_halls_id', $cinema_hallItems ?? '', null, ['class' => 'form-control custom-select']) !!}
</div>
