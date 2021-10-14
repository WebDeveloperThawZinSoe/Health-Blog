@extends('layouts.admin-master')

@section('title','Health For You | Account List')

@section('content')

<div class="col-md-6">
<div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Register New Member</h4>
                  <p class="card-category">Make New Register</p>
                </div>
                <div class="card-body">
                  <form action="/admin/accounts/create" method="post">
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
                          <label class="bmd-label-floating">Email</label>
                          <input name="email" type="email" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Password</label>
                          <input name="password" type="password" class="form-control">
                        </div>
                      </div>
                    </div>

                    <button type="submit" class="btn btn-primary pull-right">Add Account</button>
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
                            <th>Email</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                      <tbody>
                        @foreach ($users as $key=>$user)
                            <tr>
                            <td>
                                {{ ++$key }}
                            </td>
                            <td>
                                {{ $user->name }}
                            </td>
                            <td>
                                {{ $user->email }}
                            </td>
                            <td>
                                <a onclick="return confirm('Confirm delete this account')" class="btn btn-danger" href="/admin/accounts/{{$user->id}}/delete">Delete</a>
                            </td>                          
                            </tr>
                        @endforeach
                      </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>

@endsection