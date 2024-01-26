

<head>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/jquery.printPage.js"></script>
    <script type="text/javascript" src="http://www.position-absolute.com/creation/print/jquery.printPage.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

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
                margin: 0mm; 
            }

            body {
                margin: 0mm; 
            }
    }

    .container-fluid{
        width: 100%;
        display: flex;
        justify-content: center;
        
    } 
    .print{
        width: 240px;
        padding-bottom: 30px;
        display: flex;
        align-items: center;    
        justify-content: center;
        flex-direction: column;
    }
    img{
        border: 1px solid black;
        border-radius: 50%;
    }
    span{
        font-size: 10px;
        margin: 5px 0px;
    }
    #heading_test{
        font-size: 14px;
        font-weight: bold;
        line-height: 0%;
        margin-top: 20px;
    }
    #head{
        font-size: 10px;
        margin-top: 13px;
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
    #t_price,#dis, #s_total_price,#pay_method,#footer,#ks{
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
        width: 73%;
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

{{-- @if(isset($voucherNo))
    <p>Voucher Number: {{ $voucherNo }}</p>
    <p>Voucher Number: {{ $payment }}</p>
    <p>Voucher Number: {{ $voucher }}</p>
@endif  --}}


{{-- @if(isset($payment))
    @php
        $paymentArray = json_decode($payment, true);
    @endphp

    @if(is_array($paymentArray))
        @foreach($paymentArray as $paymentDetails)
            <p>Voucher Number: {{ $paymentDetails['voucher_no'] }}</p>
            @if(isset($paymentDetails['total_amu']))
                <p>Total Amount: {{ $paymentDetails['total_amu'] }}</p>
            @endif
            @if(isset($paymentDetails['stu_name']))
                <p>Student Name: {{ $paymentDetails['stu_name'] }}</p>
            @endif
        @endforeach
    @endif
@endif
 --}}

    <center>
        <div class="container-fluid" id="dataContainer">
            {{-- @if(session()->has('tableData_' . request('token')))
            @php
                $tableDataJson = session('tableData_' . request('token'));
                $tableData = json_decode($tableDataJson, true);
            @endphp --}}

            <div class="print">
                <img style="display: inline-block;" width="90px" src="{{ asset('image/logo/logo2.jpg') }}" alt="">
                <span id="heading_test">YHA Computer Training Center</span>
                <span id="head">No.29, Hledan Insein Road, <br> Giordano Upper Floor(6<sup>th</sup>) Kamaryut</span>
                <span style="margin-top: 3px; font-weight:bold; letter-spacing: 0.5px;"><i class="fa-solid fa-mobile-screen-button"></i> 09-882328992</span>

                @if(isset($payment))
                    @php
                        $paymentArray = json_decode($payment, true);
                    @endphp
                        @if(is_array($paymentArray))
                        @foreach($paymentArray as $paymentDetails)
                        <div id="nrc_date">
                            <span id="nrc">Voucher No: <span id="nrc_no">{{ $paymentDetails['voucher_no'] }}</span> </span>
                            <span id="date"><span id="date_no"> </span></span>
                        </div>
                        @endforeach
                    @endif
                @endif

    @if(isset($voucher))
    @php
        $voucherArray = json_decode($voucher, true);
    @endphp
        @if(is_array($voucherArray))
        @php
        $currentStudentName = null;
    @endphp
    
    @foreach($voucherArray as $voucherDetails)
        @if($currentStudentName != $voucherDetails['stu_name'])
            @if($currentStudentName !== null)
                </table>
            @endif
    
            <table>
                <div id="name">
                    <span id="stu_name">Student Name</span>
                    <span id="s_name">{{$voucherDetails['stu_name']}}</span>
                </div>
                    
                <tr>
                    <th>Class</th>
                    <th>Ks</th>
                </tr>
    
                @php
                    $course = \App\Models\Course::find($voucherDetails['course_id']);
                @endphp
    
                <tr>
                    @if($course)
                        <td>{{ $course->name }}<br> <span id="class_start">Class Start Date: <span id="class_date">{{$voucherDetails['enroll_date']}}</span> </span></td>
                    @endif
                    <td>90000</td>
                </tr>
    
            @php
                $currentStudentName = $voucherDetails['stu_name'];
            @endphp
    
        @else
            @php
                $course = \App\Models\Course::find($voucherDetails['course_id']);
            @endphp
    
            <tr>
                @if($course)
                    <td>{{ $course->name }}<br> <span id="class_start">Class Start Date: <span id="class_date">{{$voucherDetails['enroll_date']}}</span> </span></td>
                @endif
                <td>90000</td>
            </tr>
    
        @endif
        @endforeach
        
        @if(count($voucherArray) > 0)
            </table>
        @endif
    
    @endif
@endif
   

    @if(isset($payment))
        @php
            $paymentArray = json_decode($payment, true);
        @endphp
            @if(is_array($paymentArray))    
            @foreach($paymentArray as $paymentDetails)

                <div id="total">
                    <div class="p"><span id="t_price">Total Amount: </span> <span id="prices">{{ $paymentDetails['total_amu'] }}</span>  </div>
                    <div class="p" style="border-bottom: 0.4px dotted black; padding-bottom: 5px; "><span id="dis"> Discount: </span><span id="prices">{{ $paymentDetails['discount'] }}</span> </div>
                    <div class="p" style="border-bottom: 0.4px dotted black; padding-bottom: 5px; "><span id="pay_method">Paid: </span><span id="prices">{{ $paymentDetails['paid'] }}</span> </div>
                    <div class="p" style="border-bottom: 0.4px dotted black; padding-top: 5px; "><span id="pay_method">Balance: </span><span id="prices">0.00</span> </div>
                </div>
                @endforeach
            @endif
        @endif
                <span id="footer" style="text-align: center; font-size: 8px;">
                    No Refund Thank You
                </span>
            </div>  
        </div>
    </center>

    <script>
    

$(document).ready(function () { 
    window.print();
})

const currentDate = new Date();
const options = {
  day: 'numeric',
  month: 'numeric',
  year: 'numeric',
  hour: 'numeric',
  minute: 'numeric',
  second: 'numeric',
  hour12: true,
};

const formattedDate = currentDate.toLocaleString(undefined, options);
let date_no = document.querySelector("#date_no");
date_no.textContent = formattedDate;


</script>



