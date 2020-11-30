@extends('layouts.admin')

@section('content')
<div class="text-center">
    <h2>Search Results</h2>
</div>



<div class="row justify-content-center">
    @foreach($users as $user)
    <div class="col-xl-4 col-ls-4 col-md-6 col-sm-12 col-xs-12">
        <div class="card mt-2">
            <div class="card-body">
                <h4 class="card-title">{{ $user->user->second->firstName }} {{ $user->user->second->surname }}</h4>
                <h6> <span style="font-weight: bold">Looking for: </span> {{ $user->position }}</h6>

                @if($user->user->second->exp)
                <button class=" mb-2 btn btn-warning">Experienced</button>
                @else
                <button class=" mb-2 btn btn-danger">Fresher</button>

                @endif
                <div class="card-description">
                    <a href="{{ route('detailspage', ['id' => $user->user->id]) }}" class="btn btn-primary">View Details</a>
                </div>
            </div>
        </div>
    </div>
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
