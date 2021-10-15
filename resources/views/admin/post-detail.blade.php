@extends('layouts.admin-master')

@section('title','Health For You')

@section('content')
<div class="col-md-12">
<div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title"> {{ $post->name }}' Detail</h4>
                  <p class="card-category"></p>
                </div>
                <div class="card-body">
                        <img class="img-responsive rounded mx-auto d-block" style="width: 500px;height: 480px;" src="{{ asset('uploads')}}/{{$post->image}}" alt="">
                        <br> 
                        <h4><b> Title </b> :  {{ $post->name }}</h4>
                        <h4><b> Category </b> :  {{ $post->categroy_id }}</h4>
                        <h4><b>Description </b> : {{$post->description}} </h4>
                        <a class="btn btn-primary" href="/admin/post">Back</a>
                </div>
              </div>
</div>
@endsection