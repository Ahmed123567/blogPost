@extends('layouts.appAdmin')

@section('title')
    Manage Posts
@endsection


@section('content')


<div class="content-wrapper" style="background: none; padding:20px 60px ;">

    <a  href="{{route('manage.post.create')}}"> <button class="btn btn-info btn-sm" style="margin: 0 0 20px 0">Create Post</button></a>

    <table class="table table-bordered yajra-datatable">
        <thead>
            <tr>
                <th>id</th>
                <th>topic</th>
                <th style="width:30%">Content</th>
                <th>Owner</th>
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
            ajax: "{{route('manage.post.index')}}",
            columns: [
               {data: 'id', name: 'id'},
               {data: 'metadata', name: 'metadata'},
                {data: 'content', name: 'content'},
                {data: 'owner', name: 'owner'},    
               
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