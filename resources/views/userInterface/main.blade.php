
@extends('layouts.appUser')

@section('content')

    <div class="container">
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" name="search" id="txtSearch" placeholder="Search" aria-label="Search">
      </form>


      <div class="row" id="search-result">
          @foreach ($posts as $post )
            <div class="col-md-6">
                <h2 class="post-title">
                   <p style="text-decoration: none">{{$post->metadata}}</p>
                </h2>
                <p class="lead">{{$post->user->name}}</p>
                <p>
                    {{$post->content}}
                </p>
                @if ($post->image != null)
                <img src="{{ asset('images/'. $post->image) }}" height="100px" width="150px" alt=""> 
                @endif
                <p>
                <span class="glyphicon glyphicon-time"></span> 
                {{ $post->created_at }}
                </p>
                   <a class="btn btn-default" href="{{route('user.main.post' , ['post_id' => $post->id])}}">Read More</a>
            </div>
            
          @endforeach
     
        </div>


      <hr />

      <h5>Pagination:</h5>
      <div style="background: none; color:white !important;">
        {{ $posts->links() }}
      </div>
      <br><br><br>
    </div>

   @endsection

   @push('scripts')
     <script>
       

          text_search = document.querySelector('#txtSearch');

          text_search.onkeyup = ()=>{
            let text = $('#txtSearch').val();

$.ajax({

    type:"GET",
    // url: '/search',
    url: '{{route("user.main.search")}}',
    data: {search: $('#txtSearch').val()},
    success: function(data) {

      let result = ''

      $('#search-result').html('')
      data.forEach(element => {
        console.log(element.user)
        if (element.image == null){
          img = ''
        }else{
          img = ` <img src="{{asset('images/${element.image}')}} " height="100px" width="150px" alt=""> `
        }
        result = `
          <div class="col-md-6">
                <h2 class="post-title">
                   <p style="text-decoration: none">${element.metadata}</p>
                </h2>
                <p class="lead">{{$post->user->name}}</p>
                <p>
                    ${element.content}
                </p>
                ${img}
                <p>
                <span class="glyphicon glyphicon-time"></span> 
                  ${element.created_at}
                </p>
                   <a class="btn btn-default" href="{{route('user.main.post' , ['post_id' => $post->id])}}">Read More</a>
            </div>
        `
        $('#search-result').append(result)
       console.log(result)
      });
     

    }



});

          }

  $('#txtSearch').on('keyup', function(){

    console.log('hello')
      var text = $('#txtSearch').val();

      $.ajax({

          type:"GET",
          url: '{{route("user.main.search")}}',
          // dataType:'json'
          data: {
           
            search: $('#txtSearch').val()
          },
          success: function(data) {

              console.log(data);

          }



      });


  });


     </script>
   @endpush