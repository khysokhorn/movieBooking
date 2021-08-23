<!-- Number Of Seat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('number_of_seat', 'Number Of Seat:') !!}
    {!! Form::text('number_of_seat', null, ['class' => 'form-control']) !!}
</div>

<!-- Time Stamp Field -->
<div class="form-group col-sm-6">
    {!! Form::label('time_stamp', 'Time Stamp:') !!}
    {!! Form::text('time_stamp', null, ['class' => 'form-control','id'=>'time_stamp']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#time_stamp').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Users Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('users_id', 'Users Id:') !!}
    {!! Form::select('users_id', $userItems, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Users Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('users_id', 'Users Id:') !!}
    {!! Form::select('users_id', $userItems, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Users Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('users_id', 'Users Id:') !!}
    {!! Form::select('users_id', $userItems, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Shows Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('shows_id', 'Shows Id:') !!}
    {!! Form::select('shows_id', $showItems, null, ['class' => 'form-control custom-select']) !!}
</div>
