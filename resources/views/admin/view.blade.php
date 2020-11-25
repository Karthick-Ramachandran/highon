@extends('layouts.admin')

@section('content')

<div class="row justify-content-center">
    <div class="col-xl-6 col-ls-6 col-md-12 col-xs-12">

        <div class="card">
            <img src="{{ asset('/books/' . $users->complete->photo) }}" class="card-img-top" alt="No image">
            <div class="card-body">
                <h4> <span style="font-weight: bold">First Name: </span> {{ $users->second->firstName }}</h4>
                <h4> <span style="font-weight: bold">Sur Name: </span> {{ $users->second->surname }}</h4>
                <h4> <span style="font-weight: bold">Phone Number: </span> {{ $users->complete->phone }}</h4>
                <h4> <span style="font-weight: bold">Experienced: </span> {{ $users->second->exp ? "Yes"  : "No" }}</h4>
                <h4> <span style="font-weight: bold">Date of birth: </span> {{ $users->second->dob }}</h4>
                <h4> <span style="font-weight: bold">Age: </span> {{ $users->second->age }}</h4>
                <h4> <span style="font-weight: bold">Gender: </span> {{ $users->second->sex }}</h4>
                <h4> <span style="font-weight: bold">Nationality: </span> {{ $users->second->nationality }}</h4>
                <h4> <span style="font-weight: bold">Qualification: </span> {{ $users->second->qualification }}</h4>
                <h4> <span style="font-weight: bold">Looking for: </span> {{ $users->first->position }}</h4>

            </div>
        </div>
    </div>

    <div class="col-xl-6 col-ls-6 col-md-12 col-xs-12">
        <div class="card">
            <div class="card-body">

                <h4> <span style="font-weight: bold">Notice period: </span> {{ $users->complete->notice }}</h4>
                <h4> <span style="font-weight: bold">Height: </span> {{ $users->complete->height }}</h4>
                <h4> <span style="font-weight: bold">Weight: </span> {{ $users->complete->weight }}</h4>
                <h4> <span style="font-weight: bold">Country: </span> {{ $users->first->country }}</h4>

                <h4> <span style="font-weight: bold">Waist: </span> {{ $users->complete->waist }}</h4>
                <h4> <span style="font-weight: bold">Shoe Size: </span> {{ $users->complete->shoe }}</h4>
                <h4> <span style="font-weight: bold">Permanent address: </span> {{ $users->complete->address }}</h4>
                <h4> <span style="font-weight: bold">Mailing Address: </span> {{ $users->complete->mailing_add }}</h4>
                <h4> <span style="font-weight: bold">Email: </span> {{ $users->complete->email }}</h4>
                <h4> <span style="font-weight: bold">Passport number: </span> {{ $users->complete->passport }}</h4>
                <h4> <span style="font-weight: bold">View passport copy: </span>
                    <a target="_blank" href="{{asset('/passport/' . $users->complete->copy)}}">view</a>
                </h4>
                <h4> <span style="font-weight: bold">Email: </span> {{ $users->complete->email }}</h4>

            </div>
        </div>
    </div>
</div>
<h4 class="text-center mt-4">
    Experience
</h4>
<div class="row justify-content-center mb-4 mt-1">

    @forelse($qual as $qualification)
    <div class="col-xl-4 col-ls-4 col-md-6 col-sm-12 mt-4 mb-5">
        <div class="card">
            <div class="card-body">
                <h4> <span style="font-weight: bold">Company: </span> {{ $qualification->company }} </h4>
                <h4> <span style="font-weight: bold">Permit: </span> {{ $qualification->permit }} </h4>
                <h4> <span style="font-weight: bold">Duration: </span> {{ $qualification->duration }} </h4>
                <h4> <span style="font-weight: bold">Country: </span> {{ $qualification->country }} </h4>
                <h4> <span style="font-weight: bold">Designation: </span> {{ $qualification->position }} </h4>

            </div>
        </div>
    </div>
    @empty
    <h4 class="text-center">No Data found</h4>
    @endforelse
</div>

<div class="row justify-content-center mt-4 mb-4">
    @if($qual->onFirstPage())
    @else
    <a href="{{ $qual->previousPageUrl() }}" class="btn btn-primary">Prev Page</a>
    @endif
    @if($qual->hasMorePages())
    <a href="{{ $qual->nextPageUrl()	 }}" class="btn btn-secondary ml-2">Next Page</a>
    @else
    @endif
</div>
@endsection
