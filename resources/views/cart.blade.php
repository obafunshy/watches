@extends('layouts.app')

@section('content')
    <cart :basket-list="{{ $baskets }}"></cart>
@endsection
