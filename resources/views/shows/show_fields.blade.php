<!-- Date Field -->
<div class="col-sm-12">
    {!! Form::label('date', 'Date:') !!}
    <p>{{ $show->date }}</p>
</div>

<!-- Start Time Field -->
<div class="col-sm-12">
    {!! Form::label('start_time', 'Start Time:') !!}
    <p>{{ $show->start_time }}</p>
</div>

<!-- Endtime Field -->
<div class="col-sm-12">
    {!! Form::label('endTime', 'Endtime:') !!}
    <p>{{ $show->endTime }}</p>
</div>

<!-- Cinema Halls Id Field -->
<div class="col-sm-12">
    {!! Form::label('cinema_halls_id', 'Cinema Halls Id:') !!}
    <p>{{ $show->cinema_halls_id }}</p>
</div>

<!-- Movie Apps Id Field -->
<div class="col-sm-12">
    {!! Form::label('movie_apps_id', 'Movie Apps Id:') !!}
    <p>{{ $show->movie_apps_id }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $show->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $show->updated_at }}</p>
</div>

