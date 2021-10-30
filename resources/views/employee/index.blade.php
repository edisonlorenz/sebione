@extends('layouts.app')

@section('content')
@include('layouts.modals.employee.create')
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
                <th>Last name</th>
                <th>Email</th>
                <th>Phone</th>
            </tr>
        </thead>
    </table>    
</div>
@endsection