@extends('layouts.admin-master')

@section('title','Health For You')

@section('content')
<div class="col-md-12">

              <div class="card">
                <div class="card-header card-header-warning">
                  <h4 class="card-title">Edit {{$post->name}}  Post</h4>
                  <p class="card-category"></p>
                </div>
                <div class="card-body">
                  <form enctype="multipart/form-data"  method="post">
                      @csrf
                     <input type="hidden" name="id" value="{{ $post->id }}">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Name</label>
                          <input name="name" value="{{$post->name}}" type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Category</label>
                          <select name="category" required  class="form-control">
                              @foreach($categories as $category)
                              <option value="{{ $category->name }}">{{ $category->name }}</option>
                              @endforeach
                           </select>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Description</label>
                          <textarea name="description"  class="form-control"> {{$post->description}} </textarea>
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="">
                          <label class="bmd-label-floating">Image</label>
                          <input required type="file" name="file"  >
                        </div>
                      </div>

                     
                    
                    </div>

                    

                    <button type="submit" class="btn btn-warning pull-right">Edit Post</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
</div>


@endsection