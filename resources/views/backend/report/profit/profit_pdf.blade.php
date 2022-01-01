<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
</head>
<body>


<table id="customers">
  <tr>
    <td><h2>
  <?php $image_path = 'backend/images/login.svg'; ?>
  <img src="{{ public_path() . $image_path }}" width="200" height="100">

    </h2></td>
    <td><h2>Eggheads International School</h2>
<p>Address: Along Link road Between Deeper Life Bible Church Headquarters, Court Estate and Circular Road, Elimgbu, PHC.</p>
<p>Phone : 08066145828</p>
<p>Email: eggheadsschool@yahoo.com  Web: eggheadsintlschool.com</p>
<p> <b> Monthly and Yearly Profit </b> </p>

    </td> 
  </tr>
  
   
</table>

@php 
 
 $student_fee = App\Models\AccountStudentFee::whereBetween('date',[$start_date,$end_date])->sum('amount');

      $other_cost = App\Models\AccountOtherCost::whereBetween('date',[$sdate,$edate])->sum('amount'); 

      $emp_salary = App\Models\AccountEmployeeSalary::whereBetween('date',[$start_date,$end_date])->sum('amount');

      $total_cost = $other_cost+$emp_salary;
      $profit = $student_fee-$total_cost; 
  
@endphp 

<table id="customers">
  <tr>
    <td colspan="2" style="text-align: center;">
      <h4>Reporting Date: {{ date('d M Y', strtotime($sdate) ) }} - {{ date('d M Y', strtotime($edate) ) }}</h4>

    </td>
  </tr>
  <tr>
    <td width="50%"><h4>Purpose</h4></td>
    <td width="50%"><h4>Amount</h4></td>
     
  </tr>
  <tr>
    <td>Student Fee </td>
    <td> {{ $student_fee }}</td>
    
  </tr>

    <tr>
    <td>Employee Salary </td>
    <td> {{ $emp_salary }} </td>
     
  </tr>

  <tr>
    <td>Other Cost </td>
    <td> {{ $other_cost }} </td>
     
  </tr>
  <tr>
    <td>Total Cost</td>
    <td> {{ $total_cost }} </td>
   
  </tr>

  <tr>
    <td>Profit </td>
    <td>{{ $profit }}</td>
   
  </tr>
    
   
</table>
<br> <br>
  <i style="font-size: 10px; float: right;">Print Data : {{ date("d M Y") }}</i>

<hr style="border: dashed 2px; width: 95%; color: #000000; margin-bottom: 50px">
 

</body>
</html>