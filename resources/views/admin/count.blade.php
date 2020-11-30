@extends('layouts.admin')

@section('content')

<div class="mt-4">
    <h4 class="text-center">
        Coupon Count
    </h4>

</div>

<div class="mt-4">
    <h2 class="text-center">{{ $users->coupon_code }}</h2>

    <h3 class="text-center">Total number of users applied this coupon: {{ $users->count() }}</h3>
</div>

@endsection
