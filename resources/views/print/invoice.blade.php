
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
    table,tr,th,td{
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
        margin: 5px 0px;
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
    input{
        border: none;
        outline: none;
        font-size: 10px;
    }
    #prices,#class_fees{
        width: 50px;
        text-align: right;
    }
    #date_no{
        width: 100px;
    }
    #nrc_no{
        width: 50px;
    }
    #total_prices, #dis_prices, #prices, #paid_prices, #bal_prices{
        width: 50px;
        text-align: right;
    }
</style>

    <center>
        <div class="container">
            <form action="">
            <div class="print">
                <img width="76px" src="{{ asset('image/logo/logo2.jpg') }}" alt="">
                <span id="head">No.29, Heldan Insein Road, <br> Giordano Upper Floor(6th) Kamaryut</span>
                <span style="margin-top: 3px; font-weight:bold; letter-spacing: 0.5px;">09-760464143</span>
                <div id="nrc_date">
                    <span id="nrc">Voucher No: <input id="nrc_no" type="text" value="23428"></span>
                    <span id="date"><input style="text-align: right" id="date_no" type="text" value="07/01/2004 2:10 PM"></span>
                </div>
                <div id="name">
                    <span id="stu_name">Student Name</span>
                    <input style="text-align: right" id="s_name" type="text" value="Kaung Zwe">
                </div>
                <table>
                    <tr>
                        <th>Class</th>
                        <th>Ks</th>
                    </tr>
                    <tr>
                        <td><input type="text" id="class_name" value="ICT Foundation">  <br> <span id="class_start">Class Start Date: <input id="class_date" type="text" value=""> </span></td>
                        <td><input id="class_fees" type="text" value="130,000"></td>
                    </tr>
                </table>

                <div id="total">
                    <div class="p"><span id="t_price">Total Amount: </span> <input id="total_prices" type="text" value="480000">  </div>
                    <div class="p" style="border-bottom: 0.4px dotted black; padding-bottom: 5px; "><span id="dis"> Discount: </span> <input id="dis_prices" type="text" value="80000"> </div>
                    <div class="p"><span id="s_total_price"> Net Amount: </span> <input id="prices" type="text" value="480000"> </div>
                    <div class="p" style="border-bottom: 0.4px dotted black; padding-bottom: 5px; "><span id="pay_method">Paid: </span><input id="paid_prices" type="text" value="80000"> </div>
                    <div class="p" style="border-bottom: 0.4px dotted black; padding-top: 5px; "><span id="pay_method">Balance: </span><input id="bal_prices" type="text" value="200"> </div>
                </div>

                <span id="footer" style="text-align: center; font-size: 8px;">
                    No Refund <br>
                    Thank You
                </span>
            </form>
            </div>  
        </div>
    </center>


