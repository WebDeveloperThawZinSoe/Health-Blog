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
            @foreach($posts as $post)
            <div class="col-md-4">
              
                <h3> <?php echo $post->name ?> </h3>
                <h6> {{$post->categroy_id}} | {{ $post->created_at->diffForHumans() }} </h6>

                <p> {{ mb_substr($post->description,0,100) }} ... read rome </p>
                <p><a class="btn btn-secondary" href="/posts/{{ $post->id }}/detail" role="button">View details &raquo;</a></p>
            </div>

            @endforeach
        
        </div>
        <div class="d-flex justify-content-center"> {{ $posts->links() }}</div>
        <hr>

      </div> <!-- /container -->
</main>
@endsection