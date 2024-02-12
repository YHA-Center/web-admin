@extends('admin.master.master')

@section('content')

<style>
    #change_Ui{
        background-color: #ff6c0f;
        border: 2px solid #ff6c0f;
        color: white;
    }
    #change_Ui:hover{
        color: #ff6c0f;
        background: none;
    }
</style>

<body>

    @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif

    <div class="container mt-4">
        <h2>Final Payment</h2>
    
        <form action="{{ route('final_pay') }}" method="GET" class="mb-3">
            <div class="form-group">
                <label for="voucher_no">Voucher No:</label>
                <input required type="text" class="form-control" id="voucher_no" name="voucher_no" placeholder="Enter Voucher No">
            </div>
            <button id="change_Ui" type="submit" class="btn">Search</button>
        </form>
    @if(isset($payment))
        <form action="{{ route('process_final_pay') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="vou_no">Voucher No:</label>
                <input required type="text" class="form-control" id="vou_no" name="vou_no" value="{{ $payment->voucher_no }}" readonly>
            </div>

            <div class="form-group">
                <label for="balance">Balance:</label>
                <input required type="text" class="form-control" id="balance" name="balance" value="{{ $payment->balance }}" readonly>
            </div>
        @elseif(isset($error))

            <div class="alert alert-info" role="alert">
                No Record is found!!!
            </div>
            
            
        @endif

            <div class="form-group"> 
                <label for="f_paid">Final Paid:</label>
                <input required type="text" class="form-control" id="f_paid" name="f_paid" value="" >
            </div>

            <div class="form-group" style="display:none;">
                <label for="status">Status</label>
                <input required type="text" class="form-control" id="status" name="status" value="">
            </div>
            
            <input id="change_Ui" required type="submit" class="btn" value="Save">
        </form>
    </div>

    <script>
        let f_paid = document.querySelector('#f_paid');
        f_paid.addEventListener('keyup', function(){
            
            const decimalPlaces = 2;
            let balance = document.querySelector('#balance');
            let balance_value_fixed = parseFloat(balance.value).toFixed(decimalPlaces);
            let f_paid = document.querySelector('#f_paid');
            let f_paid_value_fixed = parseFloat(f_paid.value).toFixed(decimalPlaces);
            let status = document.querySelector('#status');
            if(balance_value_fixed == f_paid_value_fixed){
                status.value = 1;
            }else{
                status.value = 0;
            }
        })
    </script>

@endsection
