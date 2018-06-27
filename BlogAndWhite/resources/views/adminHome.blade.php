@extends('layouts.template')
@section('title', 'Manage Accounts')

@section('content')

<div style="margin-top: 10%;" class="wrapper container col col-sm-10 card-group">
  <div class="card">
    <div class="card-body">
      <center><h5 class="card-title"><a href='{!! url('/admin/manage_posts'); !!}'>Blogs</a></h5></center>
      <p class="card-text">
      	Published blogs: {{$published_posts}}
      </p>
      <p class="card-text">
      	Unpublished blogs: {{$unpublished_posts}}
      </p>
    </div>
  </div>
  <div class="card">
    <div class="card-body">
      <center><h5 class="card-title"><a href='{!! url('/admin/manage_accounts'); !!}'>Author Accounts</a></h5></center>
      <p class="card-text">
      	Enabled accounts: {{$enabled_accounts}}
      </p>
      <p class="card-text">
      	Disabled Accounts: {{$disabled_accounts}}
      </p>
    </div>
  </div>
  <div class="card">
    <div class="card-body">
      <center><h5 class="card-title"><a href='{!! url('/admin/manage_comments'); !!}'>Comments</a></h5></center>
      <p class="card-text">
      	Displayed Comments: {{$displayed_comments}}
      </p>
      <p class="card-text">
      	Hidden Comments: {{$hidden_comments}}
      </p>
    </div>
  </div>
</div>
@stop