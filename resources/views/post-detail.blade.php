@extends('layouts.master')

@section('title','Health For You')

@section('content')



<div class="jumbotron">
        <div class="container" >
          <h1 class="display-3" >Hello, world!</h1>
          <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
          <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
        </div>
</div>


      <div class="container">
        <!-- Example row of columns -->
        <div class="row">
         
            <div class="col-md-12">
                <h3> {{$post->name}} </h3>
                <h6> {{$post->categroy_id}} | {{ $post->created_at->diffForHumans() }} </h6>
                <br>
                <img class="img-responsive" style="width: 100%;" src="{{ asset('uploads')}}/{{$post->image}}" alt=""> 
                <br>
                <p> {{$post->description }} </p>

                <p><a class="btn btn-secondary" href="/" role="button"> Back</a></p>
            </div>

          
        
        </div>
       
        <hr>

      </div> <!-- /container -->
</main>
@endsection