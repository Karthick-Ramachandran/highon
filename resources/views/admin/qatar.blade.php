@extends('layouts.admin')

@section('content')
<div class="text-center">
    <h2>Search Employees in Qatar</h2>
</div>

<div class="mt-3 mb-3 row justify-content-center">
    <form method="GET" action="{{ route('countrysearch', ['country' => 'Qatar']) }}">
        <div class="input-group">
            <input type="text" name="position" class="form-control bg-light" placeholder="Type designation and enter" aria-label="Search" aria-describedby="basic-addon2">

        </div>
    </form>
</div>


<div class="row justify-content-center">
    @foreach($users as $user)
    @if($user->user->dont_show)
    @else
    <div class="col-xl-4 col-ls-4 col-md-6 col-sm-12 col-xs-12">
        <div class="mt-2 card">
            <div class="card-body">
                {{-- get seconds with application Id --}}

                <h4 class="card-title">{{ \App\Models\Second::where('application_id', '=', $user->id)->first()->firstName }} {{ \App\Models\Second::where('application_id', '=', $user->id)->first()->surname}}</h4>
                <h6> <span style="font-weight: bold">Looking for: </span> {{ $user->position }}</h6>

                @if(\App\Models\Second::where('application_id', '=', $user->id)->first()->exp)
                <button class="mb-2 btn btn-warning">Experienced</button>
                @else
                <button class="mb-2 btn btn-danger">Fresher</button>

                @endif
                <div class="card-description">
                    <a href="{{ route('detailspage', ['id' => $user->user->id, "appId" => $user->id]) }}" class="btn btn-primary">View Details</a>
                </div>

                @if(Auth::user()->is_super_admin)
                <form class="mt-3" action="{{ route('ignoreuser', ['id' => $user->user->id]) }}" method="POST">
                    @csrf
                    <div class="card-description">
                        <button type="submit" class="btn btn-primary">Hide</button>
                    </div>
                </form>
                @endif
            </div>
        </div>
    </div>
    @endif
    @endforeach
</div>

<div class="mt-4 mb-4 row justify-content-center">
    @if($users->onFirstPage())
    @else
    <a href="{{ $users->previousPageUrl() }}" class="btn btn-primary">Prev Page</a>
    @endif
    @if($users->hasMorePages())
    <a href="{{ $users->nextPageUrl()	 }}" class="ml-2 btn btn-secondary">Next Page</a>
    @else
    @endif
</div>
@endsection
