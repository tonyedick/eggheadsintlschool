@extends('admin.admin_master')
@section('admin')

<div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
				</div>
			</div>
		</div>

<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Subject Teachers</h3>
                  <a href="{{ route('subject.teacher.add') }}" 
                  style="float: right;" class="btn btn-rounded btn-success mb-5">Add Subject Teacher</a>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead class="thead-light">
							<tr>
								<th width="5%">SL</th>
								<th>Employee FN</th>
								<th>Employee SN</th>
								<th>Class</th>
								<th>Subject</th>
								<th>Designation</th>
								<th width="25%">Action</th>
							</tr>
						</thead>
						<tbody>
                            @foreach($allData as $key => $subteacher )
							<tr>
								<td>{{ $key+1 }}</td>
								<td>{{ $subteacher['user']['name'] }}</td>
								<td>{{ $subteacher['user']['fname'] }}</td>
								<td>{{ $subteacher['student_class']['name'] }}</td>
								<td>{{ $subteacher['school_subject']['name'] }}</td>
								<td>{{ $subteacher['designation']['name'] }}</td>
								<td>
                                    <a href=" {{ route('subject.teacher.edit',$subteacher->employee_id) }}" class="btn btn-info" id="edit">Edit</a>    
                                    <a href=" {{ route('subject.teacher.delete',$subteacher->employee_id) }}"  class="btn btn-danger" id="delete">Delete</a>
                              </td>
							</tr>
                            @endforeach
						</tbody>
					  </table>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
</div>
</div>
</div>



@endsection