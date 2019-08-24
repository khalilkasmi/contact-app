@extends('layout.main')

@section('title','Home')

@section('content')
    <div class="container">
      <div class="row">
        <div class="col align-center">
          <h1>Find Contacts</h1>
        </div>
      </div>
    </div>

    <search-component></search-component>
@endsection
