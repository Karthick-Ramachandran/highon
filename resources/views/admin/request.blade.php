@extends('layouts.admin')

@section('content')
<div class="text-center">
    <h2>Employer Requests</h2>
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
    <div class="col-xl-4 col-ls-4 col-md-6 col-sm-12 col-xs-12">
        <div class="card mt-2">
            <div class="card-body">
                <h4 class="card-title">{{ $user->adminData->firstname }} {{ $user->adminData->lastname }}</h4>
                <p> <span style="font-weight: bold">Company: </span> {{ $user->adminData->business }} </p>
                <div class="card-description">
                    <div>
                        <a href="{{ route('employerdata', ['id' => $user->id]) }}" class="btn btn-primary mb-2">View Details</a>
                        <form action="{{ route('ignoreuser', ['id' => $user->id]) }}" method="POST">
                            @csrf
                            <div class="card-description">
                                <button type="submit" class="btn btn-primary">Hide</button>
                            </div>
                        </form>
                    </div>

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
