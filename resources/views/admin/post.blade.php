@extends('layouts.admin-master')

@section('title','Health For You')

@section('content')
<div class="col-md-12">
<div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Add New Post</h4>
                  <p class="card-category">Make New Post</p>
                </div>
                <div class="card-body">
                  <form enctype="multipart/form-data" action="/admin/post/create" method="post">
                      @csrf
                   
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Name</label>
                          <input name="name" type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Category</label>
                          <select name="category"  class="form-control">
                              @foreach($categories as $category)
                              <option value="{{ $category->name }}">{{ $category->name }}</option>
                              @endforeach
                           </select>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Description</label>
                          <textarea name="description"  class="form-control"> </textarea>
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="">
                          <label class="bmd-label-floating">Image</label>
                          <input required type="file" name="file"  >
                        </div>
                      </div>

                     
                    
                    </div>

                    

                    <button type="submit" class="btn btn-primary pull-right">Add Post</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
</div>

<div class="col-md-12">
    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title "> Post Table</h4>
            <p class="card-category"> </p>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead class=" text-primary">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Delete</th>
                            <th>Update</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                      <tbody>
                       @foreach($posts as $k=>$post)
                            <tr>
                                <td> {{ ++$k }}</td>
                                <td> {{ $post->name }} </td>
                                <td> <img class="img-responsive" style="width: 300px;height: 280px;" src="{{ asset('uploads')}}/{{$post->image}}" alt="">  </td>
                                <td> {{ mb_substr($post->description,0,100) }} .... see detail </td>
                                <td>
                                    <a onclick="return confirm('Confirm delete this Post')" class="btn btn-danger" href="/admin/post/{{$post->id}}/delete">Delete</a>
                                </td>    
                                <td>
                                    <a class="btn btn-warning" href="/admin/post/{{$post->id}}/update">Update</a>
                                </td>  
                                <td>
                                    <a class="btn btn-info" href="/admin/post/{{$post->id}}/detail">Detail</a>
                                </td>  
                            </tr>
                       @endforeach
                      </tbody>
                    </table>
                    <div class="d-flex justify-content-center"></div>
                    <div class="d-flex justify-content-center"> {{ $posts->links() }}</div>
            </div>
        </div>
    </div>
</div>
@endsection