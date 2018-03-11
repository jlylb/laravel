@extends('layouts.home')

@section('content')

<div class="container">
    <div class="row">
    @foreach ($users as $user)
        <p><b>[{{ $user->name }}]</b> {{ link_to('admin/user/'.$user->id,$user->email) }}</p>
        <hr>
    @endforeach
    </div>
    {{ $users->links() }}
    <el-pagination
  background
  layout="prev, pager, next"
  :total="1000">
</el-pagination>
</div>
@endsection