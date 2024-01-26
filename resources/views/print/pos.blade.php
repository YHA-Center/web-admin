{{-- @extends('admin.master.master');

@section('content') --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    {{-- <script src="{{asset("js/jquery_printPage.js")}}"></script> --}}
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script type="text/javascript" src="js/jquery.printPage.js"></script>
    <script type="text/javascript" src="http://www.position-absolute.com/creation/print/jquery.printPage.js"></script>
    <title>Voucher Printing Form</title>
</head>

<style>
    .cellname{
        color: red;
    }
    .class_date{
        color: blue;
    }
    .cellclass{
        color: #ff6c0f;
    }
    .cellPrice{
        color: purple;
    }
    .cancel_btn{
        background: #ff6c0f;
        color: white;
        border: none;
        outline: none;
        margin-top: 10px;
        padding: 5px 15px;
        border-radius: 10px;
    }
    .voucher span,.voucher_date span{
        font-size: 16px;
        font-weight: bold;
    }
    label{
        font-size: 18px;
        color: black;
    }
    input{
        border: 1px solid #ff6c0f;
    }
    table,tr,td,th{
        font-size: 18px;
        color: black;
    }

</style>
<body>

<div class="container-fluid px-5">
    <div style="background-color: #ff6c0f; color:white; padding: 10px;" class="card-header p-0 d-flex align-items-center justify-content-center">
        <h4>YHA PwefwfwOS System</h4>
        <img width="90px" src="{{ asset('image/logo/logo.png') }}" alt="">
    </div>
    <div class="row justify-content-center mt-3">
        <div class="col-xl-6 col-12">
            <div class="card">
                
                <div class="card-body">
                    <form id="voucherForm">
                        <!-- Voucher Number and Date -->
                        <div class="form-row mb-3">
                            <div class="form-group col-md-6">
                                <label for="voucherNumber">Voucher Number:</label>
                                <input required type="text" id="voucherNumber" class="form-control" value="{{ rand(1000, 9999) }}" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="voucherDate">Voucher Date:</label>
                                <input required type="date" id="voucherDate" class="form-control" value="{{ date('Y-m-d') }}" readonly>
                            </div>
                        </div>
                        <!-- Student Names -->
                        <div class="form-group mb-3">
                            <label for="studentNames">Student Names (comma-separated):</label>
                            <input required type="text" id="studentNames" class="form-control">
                        </div>

                        <!-- Class Selection -->
                        <div class="form-group mb-3">
                            <label for="classSelect">Select Course:</label>
                            <select id="classSelect" class="form-control" onchange="updatePrice()">
                                <option value="math">Math Class</option>
                                <option value="science">Science Class</option>
                                <option value="history">History Class</option>
                                <!-- Add more class options as needed -->
                            </select>
                        </div>

                        <!-- Class Start Date -->
                        <div class="form-group mb-3">
                            <label for="classStartDate">Course Start Date:</label>
                            <input required type="date" id="classStartDate" class="form-control">
                        </div>

                        <!-- Class Price -->
                        <div class="form-group mb-3">
                            <label for="classPrice">Course Fee:</label>
                            <input required type="text" id="classPrice" class="form-control" readonly>
                        </div>

                        <div class="d-flex justify-content-between">
                            <div class="form-group">
                                <a href="{{ route('admin.home') }}"><button type="button" style="border: 1px solid #ff6c0f; color: #ff6c0f" class="btn">Back</button></a>
                            </div>
                            <!-- Submit Button -->
                            <div class="form-group">
                                <button type="button" style="background:#ff6c0f; color:white; float: right;" class="btn" onclick="generateTable()">Add Voucher Record</button>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-12">
            <div class="vou d-flex align-items-center justify-content-between mb-3">
                <div class="voucher_show">
                    <span>Voucher:</span>
                    <span id="voucher_no">8889</span>
                </div>
                <div class="voucher_date_show">
                    <span>Voucher Date:</span>
                    <span id="voucher_date">1/12/2024</span>
                </div>
            </div>
           
            <!-- Table to Display Student Info -->
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="fs-5 text-black">Student Name</th>
                            <th class="fs-5 text-black">Start Date</th>
                            <th class="fs-5 text-black">Course</th>
                            <th class="fs-5 text-black">Fees</th>
                            <th class="fs-5 text-black">Cancel</th>
                        </tr>
                        <tr>
                            <td>Fei Fei</td>
                            <td>12/8/2023</td>
                            <td>Java</td>
                            <td>300</td>
                        </tr>
                        <tr>
                            <td>Kaung Zwe</td>
                            <td>12/8/2023</td>
                            <td>PHP</td>
                            <td>600</td>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        <!-- Existing table body content or leave it empty -->
                    </tbody>
                </table>
            </div>

            <div class="balance d-flex justify-content-end mb-3">
                <!-- Total Price, Discount, and Subtotal -->
                <div class="form-row d-inline-block">
                    <div class="d-flex justify-content-between align-items-center mb-1 form-group col-md-12">
                        <label for="totalPrice">Total Fee:</label>
                        <input required type="text" id="totalPrice" class="form-control w-50" readonly>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-1 form-group col-md-12">
                        <label for="discount">Discount:</label>
                        <input required type="text" id="discount" class="form-control w-50" value="0" onchange="updateTotalPrice()" onblur="updateTotalPrice()">
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-1 form-group col-md-12">
                        <label for="subtotal">Paid:</label>
                        <input required type="text" id="subtotal" class="form-control p w-50" value="0" onchange="updateTotalPrice()" onblur="updateTotalPrice()">
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-1 form-group col-md-12">
                        <label for="Balance">Balance:</label>
                        <input required type="text" id="balance" class="form-control b w-50" readonly>
                    </div>
                </div>
            </div>
            <div style="float: right;" class="form-group">
                <a href="{{route('invoice')}}" class="btnpri btn btn-primary">Print</a>
            </div>
            

        </div>
    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


<script>
    function updatePrice() {
        // Update class price based on the selected class
        var classSelect = document.getElementById("classSelect");
        var classPriceInput = document.getElementById("classPrice");
        var totalPriceInput = document.getElementById("totalPrice");
        var classPrice = 0;

        switch (classSelect.value) {
            case "math":
                classPrice = 100;
                break;
            case "science":
                classPrice = 120;
                break;
            case "history":
                classPrice = 90;
                break;
            // Add more cases for other classes as needed
        }

        classPriceInput.value = classPrice;
    }

         
// table section
function generateTable() {
    var studentNames = document.getElementById("studentNames").value.split(',');
    var classSelect = document.getElementById("classSelect");
    var classPrice = parseFloat(document.getElementById("classPrice").value);
    var classStartDate = document.getElementById("classStartDate");
    var classStartDate_value = classStartDate.value;

    var tableBody = document.getElementById("tableBody");
    var totalPriceInput = document.getElementById("totalPrice");

    studentNames.forEach(function (name) {
        var row = document.createElement("tr");

        var cellName = document.createElement("td");
        cellName.classList.add("cellname");
        cellName.textContent = name.trim();
        row.appendChild(cellName);

        var class_date = document.createElement("td");
        class_date.classList.add("class_date");
        class_date.textContent = classStartDate_value.trim();
        row.appendChild(class_date);

        var cellClass = document.createElement("td");
        cellClass.classList.add('cellclass');
        cellClass.textContent = classSelect.options[classSelect.selectedIndex].text;
        row.appendChild(cellClass);

        var cellPrice = document.createElement("td");
        cellPrice.classList.add("cellPrice");
        cellPrice.textContent = classPrice.toFixed(2);
        row.appendChild(cellPrice);

        var cancel = document.createElement("button");
        cancel.innerText = "Cancel";
        cancel.classList.add("cancel_btn");
        row.appendChild(cancel);

        tableBody.appendChild(row);

        // Update total fee
        updateTotalPrice();

        var voucherNumber = document.getElementById('voucherNumber');
        var voucherNumber_value = voucherNumber.value;

        var voucher_no = document.getElementById('voucher_no');
        voucher_no.innerText = voucherNumber_value;
    });
}


// Function to update total fee
function updateTotalPrice() {
    var totalFee = 0;
    var rows = document.querySelectorAll("#tableBody tr");

    rows.forEach(function (row) {
        var priceCell = row.querySelector("td:nth-child(4)");
        if (priceCell) {
            totalFee += parseFloat(priceCell.textContent);
        }
    });

    var discount = parseFloat(document.getElementById("discount").value) || 0;
    var paid = parseFloat(document.getElementById("subtotal").value) || 0;

    var balanceInput = document.getElementById("balance");
    var totalPriceInput = document.getElementById("totalPrice");

    var balance = totalFee - discount - paid;

    balanceInput.value = balance.toFixed(2);
    totalPriceInput.value = totalFee.toFixed(2);
}

$(document).ready(function(){
    $('.btnpri').printPage();
});

</script>




    
{{-- @endsection --}}

