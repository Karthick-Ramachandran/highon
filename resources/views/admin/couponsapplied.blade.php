@extends('layouts.admin')

@section('content')
<div class="text-center">
    <h2>Users paid with coupon code</h2>
</div>

<!-- <div class="row justify-content-center mb-3 mt-3">
    <form>
        <div class="input-group">
            <input type="text" class="form-control bg-light" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>
</div> -->


<div class="row justify-content-center">
    @foreach($users as $user)
    @if($user->user->dont_show)
    @else
    <div class="col-xl-4 col-ls-4 col-md-6 col-sm-12 col-xs-12">
        <div class="card mt-2">
            <div class="card-body">
                <h4 class="card-title">{{ $user->user->second->firstName }} {{ $user->user->second->surname }}</h4>
                <h6> <span style="font-weight: bold">Applied coupon: </span> {{ $user->applied_coupon }}</h6>
                <h6> <span style="font-weight: bold"></span> {{ $user->applied_coupon }}</h6>
                <div class="card-description">
                    <a href="{{ route('detailspage', ['id' => $user->user->id]) }}" class="btn btn-primary">View Details</a>
                </div>

            </div>
        </div>
    </div>
    @endif
    @endforeach
</div>

<div class="row justify-content-center mt-4 mb-4">
    @if($users->onFirstPage())
    @else
    <a href="{{ $users->previousPageUrl() }}" class="btn btn-primary">Prev Page</a>
    @endif
    @if($users->hasMorePages())
    <a href="{{ $users->nextPageUrl()	 }}" class="btn btn-secondary ml-2">Next Page</a>
    @else
    @endif
</div>
@endsection
