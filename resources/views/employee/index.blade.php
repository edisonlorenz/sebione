@extends('layouts.master')

@section('content')
@include('layouts.modals.employee.create')
@include('layouts.modals.employee.edit')
@include('layouts.modals.employee.delete')

<div class="container-fluid">  
    <div class="d-flex justify-content-between p-1">
        <h2 class="font-weight-light">List of Employees</h2>
        <a class="btn btn-primary mt-3" href="#" data-toggle="modal" data-target="#createEmployee">Create Employee</a>
    </div>    
    <table id="data_table" class="table table-striped table-bordered p-2" style="width:100%">
        <thead>
            <tr>
                <th>Company</th>
                <th>First name</th>
                <th>Lastname</th>
                <th>Email</th>
                <th>Phone</th>
                <th style="width:15%">Action</th>
            </tr>
        </thead>
    </table>    
</div>
@endsection
@section('script')
<script>
     $(document).ready(function() {
        fetch_data();

        function fetch_data(){
            $('#data_table').DataTable({
                processing: false,
                serverSide: true,
                ajax:"{{ route('employee.index') }}",
                columns:[
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'first_name',
                        name: 'first_name'
                    },
                    {
                        data: 'last_name',
                        name: 'last_name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'phone',
                        name: 'phone'
                    },
                    {
                        data:null,
                        render: function(data,type,row){
                            return '<div class="d-flex justify-content-around" role="group">'+
                            '<button id="edit_employee" class="btn btn-primary btn-sm" style="margin-right:10px;" data-toggle="modal" data-target="#editEmployee" value="'+row['user_id'] +'" >Edit</button>' +
                            '<button id="delete_employee" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteEmployee" value="'+row['user_id'] +'" >Delete</button>' +
                        '</div>';
                        }
                    }
                 
                ]
            })
    }
     // Edit Employee
    $('#data_table tbody').on( 'click', '#edit_employee', function () {
            var id = $(this).val(); 
            console.log('Editss' +id);
            $('#editFormEmployee').prop('action',"{{ route('employee.update',"id") }}");
            $.get("{{ route('employee.edit',"id") }}", {id:id}, function(data) {
                console.log(data);
                $('#edit_employeeId').val(data.id);
                $('#edit_companyId').val(data.company_id);
                $('#edit_firstname').val(data.first_name);
                $('#edit_lastname').val(data.last_name);
                $('#edit_email').val(data.email);
                $('#edit_phone').val(data.phone);
            });

         });

         //  Delete Employee
         $('#data_table tbody').on( 'click', '#delete_employee', function () {
            var id = $(this).val(); 
            console.log('Delete '+id);
            $('#deleteFormEmployee').prop('action',"employee/"+id);
         });

     });
</script>
@endsection