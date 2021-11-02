@extends('layouts.master')

@section('content')
@include('layouts.modals.company.create')
@include('layouts.modals.company.delete')
@include('layouts.modals.company.edit')
<div class="container-fluid">  
    <div class="d-flex justify-content-between p-1">
        <h2 class="font-weight-light">List of Companies</h2>
        <a class="btn btn-primary mt-3" href="#" data-toggle="modal" data-target="#createCompany">Create Company</a>
    </div>    
    <table id="data_table" class="table table-striped table-bordered p-2" style="width:100%">
        <thead>
            <tr>
                <th style="width:15%">Logo</th>
                <th>Name</th>
                <th>Email</th>
                <th>Website</th>
                <th style="width:15%">Actions</th>
            </tr>
        </thead>
    </table>    
</div>
@endsection
@section('script')
<script>
    $(document).ready(function() {
        console.log('EDISONT');
        fetch_data();

        function fetch_data(){
            $('#data_table').DataTable({
                processing: false,
                serverSide: true,
                ajax:"{{ route('company.index') }}",
                columns:[
                    {
                        data: 'logo',
                        name: 'logo',
                        render: function(data, type, full,meta){
                            return "<img src=storage/logo/" + data +" width='50' height='50' class='rounded' />";
                        }
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'website',
                        name: 'website'
                    },
                    {
                        data:null,
                        render: function(data,type,row){
                            return '<div class="d-flex justify-content-around" role="group">'+
                            '<button id="edit_company" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editCompany" value="'+row['id'] +'" >Edit</button>' +
                            '<button id="delete_company" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteCompany" value="'+row['id'] +'" >Delete</button>' +
                        '</div>';
                        }
                    }
                ]
            })

        // Edit Company
        $('#data_table tbody').on( 'click', '#edit_company', function () {
            var id = $(this).val(); 
            console.log('Edit '+id);
            $('#editFormCompany').prop('action',"{{ route('company.update',"id") }}");
            $.get("{{ route('company.edit',"id") }}", {id:id}, function(data) {
                $('#editLogo').attr('src','storage/logo/'+data.logo);
                $('#id').val(data.id);
                $('#name').val(data.name);
                $('#email').val(data.email);
                $('#website').val(data.website);
            });

         });
        //  Delete Company
         $('#data_table tbody').on( 'click', '#delete_company', function () {
            var id = $(this).val(); 
            $('#deleteFormCompany').prop('action','/company/'+id);
         });
        }

        
    })
    
</script>   
<script>
    function readImage(input) {
      
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#createLogo')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(200);
                    $('#editLogo')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(200);      
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script> 
@endsection