@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Season</td>
          <td>Episode</td>
          <td>Quote</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($quotes as $quote)
        <tr>
            <td>{{$quote->id}}</td>
            <td>{{$quote->Season}}</td>
            <td>{{$quote->Episode}}</td>
            <td>{{$quote->Quote}}</td>
            <td><a href="{{ route('quotes.edit',$quote->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('quotes.destroy', $quote->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection