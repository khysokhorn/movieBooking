<div class="table-responsive">
    <table class="table" id="payments-table">
        <thead>
        <tr>
            <th>Amount</th>
        <th>Time Stamp</th>
        <th>Discount Coupon Id</th>
        <th>Remort Transction Id</th>
        <th>Payment Method</th>
        <th>Bookings Id</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($payments as $payment)
            <tr>
                <td>{{ $payment->amount }}</td>
            <td>{{ $payment->time_stamp }}</td>
            <td>{{ $payment->discount_coupon_id }}</td>
            <td>{{ $payment->remort_transction_id }}</td>
            <td>{{ $payment->payment_method }}</td>
            <td>{{ $payment->bookings_id }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['payments.destroy', $payment->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('payments.show', [$payment->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('payments.edit', [$payment->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
