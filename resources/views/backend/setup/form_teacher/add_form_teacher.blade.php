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
				 <h4 class="box-title">Add Form Teacher</h4>
   			</div>
   				
			   <!-- /.box-header -->
   			<div class="box-body">
			<div class="row">
	  		 <div class="col">

		<form method="post" action="{{ route('store.form.teacher') }}">
			@csrf
			 	<div class="row">
			   		<div class="col-4">		
					<div class="add_item">
				
                        <div class="form-group">
					   		<h5>Employee Name <span class="text-danger">*</span></h5>
					   		<div class="controls">
						   <select name="employee_id" required="" class="form-control">
							   <option value="" selected="" disabled="">Select Employee</option>
							   @foreach($employees as $employee)
                               <option value="{{ $employee->id }}">{{ $employee->name }}, {{ $employee->fname }}</option>
                               @endforeach
						   </select>
						    </div>
						</div> <!--// end form group-->
                    </div>
                    </div>  <!--// end col-md-4-->

                    <div class="col-md-4">
						
                        <div class="form-group">
					   		<h5>Class <span class="text-danger">*</span></h5>
					   		<div class="controls">
						   <select name="class_id" required="" class="form-control">
							   <option value="" selected="" disabled="">Select Class</option>
							   @foreach($classes as $class)
                               <option value="{{ $class->id }}">{{ $class->name }}</option>
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
							   <option value="" selected="" disabled="">Select Designation</option>
							   @foreach($designations as $designation)
                               <option value="{{ $designation->id }}">{{ $designation->name }}</option>
                               @endforeach
						   </select>
							</div>
						</div> <!--// end form group-->
					
					</div> <!--// end col-md-4-->

				</div> <!-- // End row -->


			   		<div class="text-xs-right">
						<input type="submit" class="btn btn-rounded btn-info mb-5" value="submit">
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