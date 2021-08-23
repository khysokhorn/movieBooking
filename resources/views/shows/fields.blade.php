<!-- Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date', 'Date:') !!}
    {!! Form::text('date', null, ['class' => 'form-control','id'=>'date']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Start Time Field -->
<div class="form-group col-sm-6">
    {!! Form::label('start_time', 'Start Time:') !!}
    {!! Form::text('start_time', null, ['class' => 'form-control','id'=>'start_time']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#start_time').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Endtime Field -->
<div class="form-group col-sm-6">
    {!! Form::label('endTime', 'Endtime:') !!}
    {!! Form::text('endTime', null, ['class' => 'form-control','id'=>'endTime']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#endTime').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Cinema Halls Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cinema_halls_id', 'Cinema Halls Id:') !!}
    {!! Form::select('cinema_halls_id', $cinema_hallItems, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Movie Apps Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('movie_apps_id', 'Movie Apps Id:') !!}
    {!! Form::select('movie_apps_id', $movie_appItems, null, ['class' => 'form-control custom-select']) !!}
</div>
