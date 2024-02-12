@extends('admin.master.master') 

@section('content')

  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <style>
    table {
      /* border-collapse: collapse; */
      width: 100%; 
    }

    th, td {
      /* border: 1px solid #ddd; */
      padding: 8px;
      text-align: left;
    }

    th {
      background-color: #f2f2f2;
    }

    #searchBar, #startDate, #endDate {
      margin-bottom: 10px;
    }

    input{
      outline: none;
      border: 2px solid #ff6c0f;
      margin-right: 10px;
      padding: 5px 10px;
      border-radius: 7px;
      box-shadow: 2px 2px 7px rgba(223, 223, 223, 0.884);
    }
    #clearFilters{
        background-color: #ff6c0f;
        border: 2px solid #ff6c0f;
        color: white;
    }
    #clearFilters:hover{
        color: #ff6c0f;
        background: none;
    }
    select{
      padding: 5px 10px;
      border: none;
      outline: none;
    }
    /* Override Bootstrap Pagination Styles */
.pagination {
    /* background-color: rgb(43, 255, 0); */
}

.pagination li a {
    color: #ff6c0f;
}

.pagination li.active a{
    background: none;
    border-color: blue;
    color: white;
}
tr th{
  color: #ff6c0f;
}
tr:nth-child(odd){
  background-color: #cecece;
}

  </style>
</head>
<body>

<input type="text" id="searchBar" placeholder="Search by Voucher No">

<label style="color: #ff6c0f;" for="startDate">Start Date:</label>
<input type="date" id="startDate">

<label style="color: #ff6c0f;" for="endDate">End Date:</label>
<input type="date" id="endDate">

<button class="btn" id="clearFilters">Clear Date</button>

<select id="statusFilter">
  <option value="all">All Records</option>
  <option value="remaining">Remain Balance</option>
  <option value="paid">Paid Records</option>
</select>

<table id="myTable">
  <thead>
    <tr>
      <th>Voucher_NO</th>
      <th>Voucher_Date</th>
      <th>Paid</th>
      <th>Total Amount</th>
      <th>Balance</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($payment as $payments)
    <tr>
      <td>{{ $payments->voucher_no }}</td>
      <td>{{ $payments->vou_date }}</td>
      <td>{{ $payments->paid }}</td>
      <td>{{ $payments->total_amu }}</td>
      <td>{{ $payments->balance }}</td>
      <td>{{ $payments->status }}</td>
    </tr>
    @endforeach
    {{ $payment->links() }}

  </tbody>
  <tfoot>
    <tr>
      <th colspan="2">Total Amounts</th>
      <th id="paidTotal">0.00</th>
      <th id="totalAmountTotal">0.00</th>
      <th id="balanceTotal">0.00</th>
    </tr>
  </tfoot>
</table>

<script>
  $(document).ready(function(){
    $("#myTable tbody tr").hover(function(){
      $(this).css("background-color", "#f5f5f5");
    }, function(){
      $(this).css("background-color", "");
    });

    calculateTotals();

    $("#searchBar, #startDate, #endDate").on("keyup change", function() {
      calculateTotals();

      var nameFilter = $("#searchBar").val().toLowerCase();
      var startDateFilter = $("#startDate").val();
      var endDateFilter = $("#endDate").val();

      $("#myTable tbody tr").filter(function() {
        var rowName = $(this).find("td:eq(0)").text().toLowerCase();
        var rowDate = $(this).find("td:eq(1)").text();

        var nameMatch = rowName.indexOf(nameFilter) > -1;
        var dateMatch = (!startDateFilter || rowDate >= startDateFilter) && (!endDateFilter || rowDate <= endDateFilter);

        $(this).toggle(nameMatch && dateMatch);
      });
    });

    $("#clearFilters").on("click", function() {
        $("#startDate, #endDate").val("");
        $("#searchBar").trigger("keyup");
    });

    function calculateTotals() {
  var balanceTotal = 0.00;
  var totalAmountTotal = 0.00;
  var paidTotal = 0.00;

  $("#myTable tbody tr:visible").each(function() {
    balanceTotal += parseFloat($(this).find("td:eq(4)").text());
    totalAmountTotal += parseFloat($(this).find("td:eq(3)").text());
    paidTotal += parseFloat($(this).find("td:eq(2)").text());
  });

  $("#balanceTotal").text(balanceTotal.toFixed(2));
  $("#totalAmountTotal").text(totalAmountTotal.toFixed(2));
  $("#paidTotal").text(paidTotal.toFixed(2));
}



  $("#startDate, #endDate").on("change", function() {
    calculateTotals();

    var nameFilter = $("#searchBar").val().toLowerCase();
    var startDateFilter = new Date($("#startDate").val());
    var endDateFilter = new Date($("#endDate").val());

    $("#myTable tbody tr").filter(function() {
      var rowName = $(this).find("td:eq(0)").text().toLowerCase();
      var rowDate = new Date($(this).find("td:eq(1)").text());

      var nameMatch = rowName.indexOf(nameFilter) > -1;
      var dateMatch = (!startDateFilter || rowDate >= startDateFilter) && (!endDateFilter || rowDate <= endDateFilter);

      $(this).toggle(nameMatch && dateMatch);
    });
  });

  $("#statusFilter").on("change", function () {
        var selectedValue = $(this).val();

        $("#searchBar, #startDate, #endDate").val("");

        $("#myTable tbody tr").show();

        if (selectedValue === "remaining") {
            $("#myTable tbody tr").filter(function () { 
                return $(this).find("td:eq(5)").text() == 0;
            }).hide();
        } else if (selectedValue === "paid") {
            $("#myTable tbody tr").filter(function () {
                return $(this).find("td:eq(5)").text() == 1;
            }).hide();
        }
        calculateTotals();
    });

  });

</script>
@endsection