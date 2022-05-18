@extends('layouts.appAdmin')

@section('title')
    Send Email
@endsection


@section('content')
    <div class="content-wrapper" style="background: none; padding:20px 60px ;">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Send Email</h3>
            </div>


            <form action="{{route('manage.users.sendEmail')}}" method="post" enctype="multipart/form-data"> 

                @csrf

                <div class="card-body">

                    <label for="">Email Content</label>
                    <textarea name="content" id="" cols="30" rows="4" class="form-control"></textarea>

                    <input type="hidden" name="user_id" value="{{$user->id}}">
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
    

    </div>
@endsection


@push('scripts')
    <script>

    </script>
@endpush
