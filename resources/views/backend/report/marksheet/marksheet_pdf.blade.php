@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

 <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		 

		<!-- Main content -->
		<section class="content">
		  <div class="row">

		
<div class="col-12">
<div class="box bb-3 border-warning">
				  <div class="box-header">
					<h4 class="box-title">Manage <strong>MarkSheet PDF View</strong></h4>
				  </div>

	  <div class="box-body" style="border: solid 1px; padding: 10px;">
		


  <div class="row">  <!-- start 1st row -->
  		<div style="float: right" class="col-md-2 text-center">
          <img src="{{ url('backend/images/login.svg') }}" style="width: 160px; height: 160px;">			
  		</div>

      <div class="col-md-8 text-center" style="float: left;">
  			<h2><strong>Eggheads International School</strong><h2>
  			<h4><strong>Secondary</strong></h4>
  			<h6><strong>Address: Along Link road Between Deeper Life Bible Church Headquarters, Court Estate and Circular Road, Elimgbu, PHC.</strong></h6>
  			<h6>Email: eggheadsschool@yahoo.com  Web: eggheadsintlschool.com</h6>
  			
  		</div>

      <div style="float: right" class="col-md-2 text-center">
        <img src="{{ (!empty($value['student']['image']))? url('upload/student_images/'.$value['student']['image']):url('upload/no_image.jpg') }}" style="width: 100px; width: 100px;"> 		
  		</div>
  			
  </div>

      <div class="col-md-12">
        <hr style="border: solid 1px; width: 100%; color: #ddd; margin-bottom: 0px;">
  			
  		</div>


  </div> <!--  end 1st row -->


  <br>
	<div class="row"> <!-- start 2nd row -->

		<div class="col-md-6">
		

 <table border="1" style="border-color: #000000;" width="100%" cellpadding="8" cellspacing="2">
@php
	$assign_student = App\Models\AssignStudent::where('year_id',$allMarks['0']->year_id)->where('class_id',$allMarks['0']->class_id)->first();
@endphp

<tr>
	<td width="40%"><strong>Name</strong> </td>
	<td width="60%">{{ $allMarks['0']['student']['name']}} {{ $allMarks['0']['student']['fname'] }}</td>
</tr>

<tr>
	<td width="40%"><strong>Academic Year</strong></td>
	<td width="60%">{{ $allMarks['0']['year']['name'] }}</td>
</tr>
			
</table>
 	
		</div> <!-- // end col md 6 -->

    <div class="col-md-6">
		

 <table border="1" style="border-color: #000000; float:right" width="100%" cellpadding="8" cellspacing="2">
@php
	$assign_student = App\Models\AssignStudent::where('year_id',$allMarks['0']->year_id)->where('class_id',$allMarks['0']->class_id)->first();
@endphp

<tr>
	<td width="40%"><strong>Class</strong></td>
	<td width="60%">{{ $allMarks['0']['student_class']['name'] }}</td>
</tr>

<tr>
	<td width="40%"><strong>Term</strong></td>
	<td width="60%">{{ $allMarks['0']['exam_type']['name'] }}</td>
</tr>

</table>
 	
		</div> <!-- // end col md 6 -->
	</div> <!--  end 2nd row -->

<br><br>
      <div class="row"> <!-- 3td row start -->
        <div class="col-md-12">

<table border="1" style="border-color: #000000;" width="100%" cellpadding="1" cellspacing="1">
<thead>
  <tr>
    <th class="text-center">SUBJECTS</th>

    <th class="text-center">MID TERM SCORE</th>
    <th class="text-center">PERCENTAGE</th>
    <th class="text-center">GRADE</th>
    <th class="text-center">CLASS AVERAGE</th>    
  </tr>
</thead>

<tbody>
  @php
      $total_marks = 0;
      $total_point = 0;
  @endphp

@foreach($allMarks as $key => $mark)
@php
  $get_mark = $mark->marks;
  $total_marks = (float)$total_marks+(float)$get_mark;
  $total_subject = App\Models\StudentMarks::where('year_id',$mark->year_id)->where('class_id',$mark->class_id)->where('exam_type_id',$mark->exam_type_id)->where('student_id',$mark->student_id)->get()->count();
@endphp
<tr>
  <td class="text-center">{{ $key+1 }}</td>

  <td class="text-center">{{ $get_mark }}</td>

@php
  $grade_marks = App\Models\MarksGrade::where([['start_marks','<=', (int)$get_mark],['end_marks', '>=',(int)$get_mark ]])->first();
  $grade_percentage = (float)($get_mark/40)*100;
  $grade_name = $grade_marks->grade_name;
  $grade_point = number_format((float)$grade_marks->grade_point,2);
  $total_point = (float)$total_point+(float)$grade_point;
  $grade_average = number_format((float)($total_marks/840)*100,2);
@endphp
<td class="text-center">{{ $grade_percentage }}</td>
<td class="text-center">{{ $grade_name }}</td>
<td class="text-center">{{ $grade_point }}</td>

</tr>
@endforeach

<tr>
  <td colspan="3"><strong style="padding-left: 30px;">LEARNER'S GRAND TOTAL</strong></td>
  <td colspan="3"><strong style="padding-left: 38px;">{{ $total_marks }}</strong></td>
</tr>

<tr>
  <td colspan="3"><strong style="padding-left: 30px;">LEARNER'S AVERAGE</strong></td>
  <td colspan="3"><strong style="padding-left: 38px;">{{ $grade_average }}</strong></td>
</tr>

</tbody>
          </table>

        </div> <!-- // end Col md -12    -->     
      </div> <!-- end 3td row start -->

      <div class="row">  <!--  4th row start -->
        <div class="col-md-12">

<table border="1" style="border-color: #000000;" width="100%" cellpadding="1" cellspacing="1">
@php
$total_grade = 0;
$point_for_letter_grade = (float)$total_point/(float)$total_subject;
$total_grade = App\Models\MarksGrade::where([['start_point','<=',$point_for_letter_grade],['end_point','>=',$point_for_letter_grade]])->first();
$grade_point_avg = $total_point/$total_subject;
@endphp
<tr>
  <td width="25%"><strong style="padding-left: 30px;">PREVIOUS GPA</strong></td>
  <td width="25%"> 
    @if($count_fail > 0)
    0.00
    @else
    {{number_format((float)$grade_point_avg,2)}}
    @endif
  </td>
  <td width="25%"><strong style="padding-left: 30px;">CURRENT GPA</strong></td>
  <td width="25%">  {{number_format((float)$grade_point_avg,2)}} </td>
</tr>

  </table>        
        </div>        
      </div>   <!--  End 4th row start -->

<div class="row">  <!--  5th row start -->
  <div class="col-md-12">

<table border="1" style="border-color: #000000;" width="100%" cellpadding="1" cellspacing="1">
 <tbody>
    <tr>
      <td style="text-align: left;"><strong style="padding-left: 30px;">REMARKS:</strong>
        @if($count_fail > 0)
        Fail
        @else
        @endif
      </td>
    </tr>
  
 </tbody>
  </table>        
        </div>        
      </div>   <!--  End 5th row start -->

      <div class="col-md-12">


      <br><br>

	<table border="1" style="border-color: #000000;" width="100%" cellpadding="8" cellspacing="2">
	<p>GRADE CLASSES:</p>
			@foreach($allGrades as $mark)
{{ $mark->grade_name }} = {{ $mark->start_marks }} - {{ $mark->end_marks }}....
 
			@endforeach

</table>

</div> <!-- // end col md 6 -->

 <br><br><br><br>
 
<div class="row"> <!--  6th row start -->
  <div class="col-md-6 text-center"> 
    <img src="{{ url('upload/signature.png') }}" style="width: 200px; height: 60px;">	
  <hr style="border: solid 1px; widows: 60%; color: #000000; margin-bottom: -3px;">
    <div>Principal</div>
  </div>

    <div class="col-md-6">
    <p style="text-align: right;"><u><i>Print Date: </i>{{ date('d M Y') }} </u></p>
  </div>
  
</div>  <!--  End 6th row start -->


<br><br>

<!-- 	------------------------------------------------		 -->       
			</div>
			<!-- /.col -->
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
  </div>

@endsection
