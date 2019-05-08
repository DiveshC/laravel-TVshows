@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Quote
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('quotes.update', $quote->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="name">Quote Season:</label>
          <input type="text" class="form-control" name="Season" value={{ $quote->Season }} />
        </div>
        <div class="form-group">
          <label for="price">Episode :</label>
          <input type="text" class="form-control" name="Episode" value={{ $quote->Episode }} />
        </div>
        <div class="form-group">
          <label for="quantity">Quote:</label>
          <input type="text" class="form-control" name="share_qty" value={{ $quote-> Quote }} />
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
@endsection