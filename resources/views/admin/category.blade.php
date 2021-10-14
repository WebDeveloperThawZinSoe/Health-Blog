@extends('layouts.admin-master')

@section('title','Health For You')

@section('content')
<div class="col-md-6">
<div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Register New Category</h4>
                  <p class="card-category">Make New Category</p>
                </div>
                <div class="card-body">
                  <form action="/admin/category/create" method="post">
                      @csrf
                   
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Name</label>
                          <input name="name" type="text" class="form-control">
                        </div>
                      </div>
                    
                    </div>

                    <button type="submit" class="btn btn-primary pull-right">Add Category</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
</div>

<div class="col-md-6">
    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title ">Simple Table</h4>
            <p class="card-category"> Here is a subtitle for this table</p>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead class=" text-primary">
                        <tr>
                            <th>Number</th>
                            <th>Name</th>
                            <th>Delete</th>
                            <th>Update</th>
                        </tr>
                    </thead>
                      <tbody>
                        @foreach ($category as $key=>$cat)
                            <tr>
                            <td>
                                {{ ++$key }}
                            </td>
                            <td>
                                {{ $cat->name }}
                            </td>
                            <td>
                                <a onclick="return confirm('Confirm delete this category')" class="btn btn-danger" href="/admin/category/{{$cat->id}}/delete">Delete</a>
                            </td>    
                            <td>
                                <a class="btn btn-warning" href="/admin/category/{{$cat->id}}/update">Update</a>
                            </td>                          
                            </tr>
                        @endforeach
                      </tbody>
                    </table>
                    <div class="d-flex justify-content-center"> {{ $category->links() }}</div>
                   
            </div>
        </div>
    </div>
</div>
@endsection