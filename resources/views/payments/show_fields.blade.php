<!-- Amount Field -->
<div class="col-sm-12">
    {!! Form::label('amount', 'Amount:') !!}
    <p>{{ $payment->amount }}</p>
</div>

<!-- Time Stamp Field -->
<div class="col-sm-12">
    {!! Form::label('time_stamp', 'Time Stamp:') !!}
    <p>{{ $payment->time_stamp }}</p>
</div>

<!-- Discount Coupon Id Field -->
<div class="col-sm-12">
    {!! Form::label('discount_coupon_id', 'Discount Coupon Id:') !!}
    <p>{{ $payment->discount_coupon_id }}</p>
</div>

<!-- Remort Transction Id Field -->
<div class="col-sm-12">
    {!! Form::label('remort_transction_id', 'Remort Transction Id:') !!}
    <p>{{ $payment->remort_transction_id }}</p>
</div>

<!-- Payment Method Field -->
<div class="col-sm-12">
    {!! Form::label('payment_method', 'Payment Method:') !!}
    <p>{{ $payment->payment_method }}</p>
</div>

<!-- Bookings Id Field -->
<div class="col-sm-12">
    {!! Form::label('bookings_id', 'Bookings Id:') !!}
    <p>{{ $payment->bookings_id }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $payment->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $payment->updated_at }}</p>
</div>

