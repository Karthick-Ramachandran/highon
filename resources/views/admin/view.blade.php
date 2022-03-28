@extends('layouts.admin')

@section('content')

<div class="row justify-content-center">
    <div class="col-xl-6 col-ls-6 col-md-12 col-xs-12">

        <div class="card">
            <img src="{{ asset('/books/' . \App\Models\SecondComplete::where('application_id', '=', $appId)->first()->photo) }}" class="card-img-top" alt="No image">
            <div class="card-body">
                <h4> <span style="font-weight: bold">First Name: </span> {{ \App\Models\Second::where('application_id', '=', $appId)->first()->firstName }}</h4>
                <h4> <span style="font-weight: bold">Sur Name: </span> {{ \App\Models\Second::where('application_id', '=', $appId)->first()->surname }}</h4>
                <h4> <span style="font-weight: bold">Phone Number: </span> {{ \App\Models\SecondComplete::where('application_id', '=', $appId)->first()->phone }}</h4>
                <h4> <span style="font-weight: bold">Experienced: </span> {{\App\Models\Second::where('application_id', '=', $appId)->first()->exp ? "Yes"  : "No" }}</h4>
                <h4> <span style="font-weight: bold">Date of birth: </span> {{ \App\Models\Second::where('application_id', '=', $appId)->first()->dob }}</h4>
                <h4> <span style="font-weight: bold">Age: </span> {{ \App\Models\Second::where('application_id', '=', $appId)->first()->age }}</h4>
                <h4> <span style="font-weight: bold">Gender: </span> {{ \App\Models\Second::where('application_id', '=', $appId)->first()->sex }}</h4>
                <h4> <span style="font-weight: bold">Nationality: </span> {{ \App\Models\Second::where('application_id', '=', $appId)->first()->nationality }}</h4>
                <h4> <span style="font-weight: bold">Qualification: </span> {{ \App\Models\Second::where('application_id', '=', $appId)->first()->qualification }}</h4>
                <h4> <span style="font-weight: bold">Looking for: </span> {{  \App\Models\First::where('application_id', '=', $appId)->first()->position }}</h4>

            </div>
        </div>
    </div>

    <div class="col-xl-6 col-ls-6 col-md-12 col-xs-12">
        <div class="card">
            <div class="card-body">

                <h4> <span style="font-weight: bold">Notice period: </span> {{ \App\Models\SecondComplete::where('application_id', '=', $appId)->first()->notice }}</h4>
                <h4> <span style="font-weight: bold">Height: </span> {{ \App\Models\SecondComplete::where('application_id', '=', $appId)->first()->height }}</h4>
                <h4> <span style="font-weight: bold">Weight: </span> {{ \App\Models\SecondComplete::where('application_id', '=', $appId)->first()->weight }}</h4>
                <h4> <span style="font-weight: bold">Country: </span> {{ \App\Models\First::where('application_id', '=', $appId)->first()->country }}</h4>

                <h4> <span style="font-weight: bold">Waist: </span> {{ \App\Models\SecondComplete::where('application_id', '=', $appId)->first()->waist }}</h4>
                <h4> <span style="font-weight: bold">Shoe Size: </span> {{ \App\Models\SecondComplete::where('application_id', '=', $appId)->first()->shoe }}</h4>
                <h4> <span style="font-weight: bold">Permanent address: </span> {{ \App\Models\SecondComplete::where('application_id', '=', $appId)->first()->address }}</h4>
                <h4> <span style="font-weight: bold">Mailing Address: </span> {{ \App\Models\SecondComplete::where('application_id', '=', $appId)->first()->mailing_add }}</h4>
                <h4> <span style="font-weight: bold">Email: </span> {{ \App\Models\SecondComplete::where('application_id', '=', $appId)->first()->email }}</h4>
                <h4> <span style="font-weight: bold">Passport number: </span> {{ \App\Models\SecondComplete::where('application_id', '=', $appId)->first()->passport }}</h4>
                <h4> <span style="font-weight: bold">View passport copy: </span>
                    <a target="_blank" href="{{asset('/passport/' . \App\Models\SecondComplete::where('application_id', '=', $appId)->first()->copy)}}">view</a>
                </h4>
                <h4> <span style="font-weight: bold">Email: </span> {{ \App\Models\SecondComplete::where('application_id', '=', $appId)->first()->email }}</h4>

            </div>
        </div>
    </div>
</div>
<h4 class="mt-4 text-center">
    Experience
</h4>
<div class="mt-1 mb-4 row justify-content-center">

    @forelse($qual as $qualification)
    <div class="mt-4 mb-5 col-xl-4 col-ls-4 col-md-6 col-sm-12">
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

<div class="mt-4 mb-4 row justify-content-center">
    @if($qual->onFirstPage())
    @else
    <a href="{{ $qual->previousPageUrl() }}" class="btn btn-primary">Prev Page</a>
    @endif
    @if($qual->hasMorePages())
    <a href="{{ $qual->nextPageUrl()	 }}" class="ml-2 btn btn-secondary">Next Page</a>
    @else
    @endif
</div>
@endsection
