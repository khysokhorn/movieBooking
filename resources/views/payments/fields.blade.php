<!-- Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('amount', 'Amount:') !!}
    {!! Form::text('amount', null, ['class' => 'form-control']) !!}
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

<!-- Discount Coupon Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('discount_coupon_id', 'Discount Coupon Id:') !!}
    {!! Form::text('discount_coupon_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Remort Transction Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('remort_transction_id', 'Remort Transction Id:') !!}
    {!! Form::text('remort_transction_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Payment Method Field -->
<div class="form-group col-sm-6">
    {!! Form::label('payment_method', 'Payment Method:') !!}
    {!! Form::select('payment_method', ], null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Bookings Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bookings_id', 'Bookings Id:') !!}
    {!! Form::select('bookings_id', $bookingItems, null, ['class' => 'form-control custom-select']) !!}
</div>
