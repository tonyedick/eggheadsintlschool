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
				  <h3 class="box-title">Form Teachers</h3>
                  <a href="{{ route('form.teacher.add') }}" 
                  style="float: right;" class="btn btn-rounded btn-success mb-5">Add Form Teacher</a>
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
								<th>Class Name</th>
								<th>Designation</th>
								<th width="25%">Action</th>
							</tr>
						</thead>
						<tbody>
                            @foreach($allData as $key => $form )
							<tr>
								<td>{{ $key+1 }}</td>
								<td>{{ $form['user']['name'] }}</td>
								<td>{{ $form['user']['fname'] }}</td>
								<td>{{ $form['student_class']['name']}}</td>
								<td>{{ $form['designation']['name'] }}</td>
								<td>
                                    <a href=" {{ route('form.teacher.edit',$form->employee_id) }}" class="btn btn-info" id="edit">Edit</a>    
                                    <a href=" {{ route('form.teacher.delete',$form->employee_id) }}"  class="btn btn-danger" id="delete">Delete</a>
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