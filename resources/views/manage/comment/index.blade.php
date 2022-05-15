@extends('layouts.appAdmin')

@section('title')
    Manage Users
@endsection


@section('content')


<div class="content-wrapper" style="background: none; padding:20px 60px ;">

    <a  href="{{route('manage.comments.create')}}"> <button class="btn btn-info btn-sm" style="margin: 0 0 20px 0">Create Comment</button></a>

    <table class="table table-bordered yajra-datatable">
        <thead>
            <tr>
                <th>id</th>
                <th style="width:30%">Content</th>
                <th>Owner</th>
                <th>Post</th>
                <th>Parent</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
        </table>
        

</div>
@endsection


@push('scripts')
<script>
    $(function () {
              
        var table = $('.yajra-datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{route('manage.comments.index')}}",
            columns: [
               {data: 'id', name: 'id'},
                {data: 'content', name: 'content'},
                {data: 'owner', name: 'owner'},
                {data: 'post_id', name: 'post_id'},

    
                {data: 'parent' , name:'parent'},
               
                {
                    data: 'action', 
                    name: 'action', 
                    orderable: true, 
                    searchable: true
                },
            ]
        });
    
        
      });
      
</script>
@endpush