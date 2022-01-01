@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->

			<section class="content">

				<!-- Basic Forms -->
 			<div class="box">
   			<div class="box-header with-border">
				 <h4 class="box-title">Edit Form Teacher</h4>
   			</div>
   				
			   <!-- /.box-header -->
   			<div class="box-body">
			<div class="row">
	  		 <div class="col">

		<form method="post" action="{{ route('update.form.teacher',$editData->employee_id) }}">
			@csrf
					
			<div class="add_item">
			 	<div class="row">
			   		<div class="col-4">	

					   <div class="form-group">
					   		<h5>Employee Name <span class="text-danger">*</span></h5>
					   		<div class="controls">
						   <select name="employee_id" required="" class="form-control">
							   <option value="" selected="" disabled="">Select Employee</option>
							   @foreach($employees as $employee)
                               <option value="{{ $employee->id }}" {{ ($editData->employee_id == $employee->id)? "selected":"" }}>{{ $employee->name }}</option>
                               @endforeach
						   </select>
						    </div>
						</div> <!--// end form group-->
					</div>
					<div class="col-md-4">
					<div class="form-group">
					   		<h5>Class Name <span class="text-danger">*</span></h5>
					   		<div class="controls">
						   <select name="class_id" required="" class="form-control">
							   <option value="" selected="" disabled="">Select Class</option>
							   @foreach($classes as $class)
                               <option value="{{ $class->id }}" {{ ($editData->class_id == $class->id)? "selected":"" }}>{{ $class->name }}</option>
                               @endforeach
						   </select>
						</div>
						</div> <!--// end form group-->
					
					</div> <!--// end col-md-4-->

					<div class="col-md-4">
					<div class="form-group">
					   		<h5>Designation <span class="text-danger">*</span></h5>
					   		<div class="controls">
						   <select name="designation_id" required="" class="form-control">
							   <option value="" selected="" diasabled="">Select Designation</option>
							   @foreach($designations as $designation)
                               <option value="{{ $designation->id }}" {{ ($editData->designation_id == $designation->id)? "selected":"" }}>{{ $designation->name }}</option>
                               @endforeach
						   </select>
						</div>
						</div> <!--// end form group-->

                	</div> 
					</div>
				</div> <!-- // End add_item -->


			   		<div class="text-xs-right">
						<input type="submit" class="btn btn-rounded btn-info mb-5" value="Update">
			  		 </div>
		   	</form>

			</div>
			<!-- /.col -->
			</div>
			<!-- /.row -->
			</div>
			<!-- /.box-body -->
			</div>
			<!-- /.box -->

		</section>



		
	</div>
</div>


@endsection