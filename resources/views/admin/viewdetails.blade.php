@extends('layouts.admin')

@section('content')

<div class="row justify-content-center">
    <div class="col-xl-10 col-ls-10 col-md-12 col-xs-12">
        <div class="card">
            <div class="card-body">
                <h4> <span style="font-weight: bold">First Name: </span> {{ $users->adminData->firstname }}</h4>
                <h4> <span style="font-weight: bold">Last Name: </span> {{ $users->adminData->lastname }}</h4>
                <h4> <span style="font-weight: bold">Business name: </span> {{ $users->adminData->business }}</h4>
                <h4> <span style="font-weight: bold">Country: </span> {{ $users->adminData->country }}</h4>
                <h4> <span style="font-weight: bold">Industry: </span> {{ $users->adminData->industry }}</h4>
                <h4> <span style="font-weight: bold">Registration number: </span> {{ $users->adminData->reg }}</h4>
                <h4> <span style="font-weight: bold">Business Address: </span> {{ $users->adminData->bus_add }}</h4>

                @if($users->request_admin)
                <div class="card-description">
                    <a href="{{ route('approveemployer', ['id' => $users->id]) }}" class="btn btn-success mb-2">Approve employer</a>
                </div>
                @else
                <div class="card-description">
                    <button class="btn btn-secondary mb-2">Approved!</button>
                </div>
                @endif
            </div>

        </div>

    </div>

</div>



@endsection
