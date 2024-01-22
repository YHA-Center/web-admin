@extends('layouts.my')
@section('content')

<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, Helvetica, sans-serif
    }
    @media print {
            @page {
                /
                size: 80mm auto;
                margin: 0.3mm; 
            }

            body {
                margin: 1mm; 
            }
    }

    .container{
        width: 100%;
        display: flex;
        justify-content: center;
    } 
    .print{
        padding-top: 0px;
        padding-bottom: 10px;
        display: flex;
        align-items: center;    
        justify-content: center;
        flex-direction: column;
    }
    span{
        font-size: 10px;
        margin: 5px 0px;
    }
    #head{
        font-size: 12px;
        font-weight: bold;
    }
    table{
        width: 100%;
        font-size: 8px;
        text-align: start;
        padding: 5px 0px;
        border-bottom: 0.4px dotted black;
        border-collapse: collapse;
    }tr{
        width: 100%;
        font-size: 8px;
        text-align: start;
        padding: 5px 0px;
        border-bottom: 0.4px dotted black;
        border-collapse: collapse;
    }
    th{
        width: 100%;
        font-size: 8px;
        text-align: start;
        padding: 5px 0px;
        border-bottom: 0.4px dotted black;
        border-collapse: collapse;
    }
    td{
        width: 100%;
        font-size: 8px;
        text-align: start;
        padding: 5px 0px;
        border-bottom: 0.4px dotted black;
        border-collapse: collapse;
    }
    #nrc_date{
        display: flex;
        justify-content: space-between;
        width: 100%;
    }
    #nrc,#date,#stu_name,#class_start,#t_price,#dis, #s_total_price,#pay_method,#footer,#ks{
        font-weight: bold;
    }
    #nrc_no,#date_no,#s_name,#class_date,#prices{
        font-weight: normal;
    }
    #name{
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-top: 5px;

    }
    #class_start{
        margin-top: 5px; 
        font-size: 8px;
    }
    #total{
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: end;
        text-align: end;
        line-height: 50%;
        margin-top: 20px;
    }
    .p{
        width: 57%;
        display: flex;
        justify-content: space-between;
    }
    #footer{
        margin: 20px;
    }
    #time{
        font-weight: normal;
    }
</style>

<div id="dataContainer">
    <!-- Display the session data -->
    @if(session()->has('tableData_' . request('token')))
        @php
            $tableDataJson = session('tableData_' . request('token'));
            $tableData = json_decode($tableDataJson, true);
        @endphp

{{--         
        @if(count($tableData) > 0)
            @php
                $data = $tableData[0];
            @endphp

                <h1>Voucher : {{ $data['voucher_no'] }}</h1>
                <h1>voucher_date : {{ $data['voucher_date'] }}</h1>
                <h1>totalPrice : {{ $data['totalPrice'] }}</h1>
                <h1>discount : {{ $data['discount'] }}</h1>
                <h1>subtotal : {{ $data['subtotal'] }}</h1>
                <h1>balance : {{ $data['balance'] }}</h1>
            @else
            <p>No data available</p>
        @endif

           
            @php
                $i = 0;
                $count = count($tableData);
            @endphp
            
        <ul>
            @foreach ($tableData as $data)
                <li>
                    {{ $data['name'] }} - {{ $data['classDate'] }} - 
                    {{ $data['className'] }} - {{ $data['classPrice'] }}
                </li>
            @endforeach


               
        </ul>--}}

    @else
        <p>No tableData received</p>
    @endif 
</div>


    <center>
        <div class="container" id="dataContainer">
            @if(session()->has('tableData_' . request('token')))
            @php
                $tableDataJson = session('tableData_' . request('token'));
                $tableData = json_decode($tableDataJson, true);
            @endphp

            <div class="print">
                <img width="76px" src="{{ asset('imgs/logo2.jpg') }}" alt="">
                <span id="head">No.29, Heldan Insein Road, <br> Giordano Upper Floor(6th) Kamaryut</span>
                <span style="margin-top: 3px; font-weight:bold; letter-spacing: 0.5px;">09-760464143</span>

            @if(count($tableData) > 0)
            @php
                $data = $tableData[0];
            @endphp
                <div id="nrc_date">
                    <span id="nrc">Voucher No: <span id="nrc_no">{{ $data['voucher_no'] }}</span> </span>
                    <span id="date"><span id="date_no">{{ $data['voucher_date'] }}</span> <span id="time"> 2:10 PM</span></span>
                </div>
            @else
                <p>No data available</p>
            @endif

            @php
    $previousName = null;
@endphp

@foreach ($tableData as $data)
<table>
    @if ($data['name'] !== $previousName)
        <div id="name">
            <span id="stu_name">Student Name</span>
            <span id="s_name">{{ $data['name'] }}</span>
        </div>
        @php
            $previousName = $data['name'];
        @endphp
        <tr>
            <th>Class</th>
            <th>Ks</th>
        </tr>
        @endif
        <tr>
            <td style="color: red">{{ $data['className'] }}<br> <span id="class_start">Class Start Date: <span id="class_date">{{ $data['classDate'] }}</span> </span></td>
            <td>{{ $data['classPrice'] }}</td>
        </tr>
    </table>
@endforeach


                <div id="total">
                    <div class="p"><span id="t_price">Total Amount: </span> <span id="prices">{{ $data['totalPrice'] }}</span>  </div>
                    <div class="p" style="border-bottom: 0.4px dotted black; padding-bottom: 5px; "><span id="dis"> Discount: </span><span id="prices">{{ $data['discount'] }} </span> </div>
                    <div class="p"><span id="s_total_price"> Net Amount: </span> <span id="prices">{{ $data['voucher_date'] }}</span>  </div>
                    <div class="p" style="border-bottom: 0.4px dotted black; padding-bottom: 5px; "><span id="pay_method">Paid: </span><span id="prices">{{ $data['subtotal'] }} </span> </div>
                    <div class="p" style="border-bottom: 0.4px dotted black; padding-top: 5px; "><span id="pay_method">Balance: </span><span id="prices">{{ $data['balance'] }} </span> </div>
                </div>

                <span id="footer" style="text-align: center; font-size: 8px;">
                    No Refund <br>
                    Thank You
                </span>
            </div>  
        </div>
    </center>

     @else
        <p>No tableData received</p>
    @endif



@endsection