@extends('layouts.admin')

@section('content')

<div class="mt-4">
    <h4 class="text-center">
        Change Payment
    </h4>

    <div class="row justify-content-center">
        <div class="col-xl-8 col-ls-8 col-sm-12 col-xs-12">
            <form action="{{ route('changepayment') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="amount">Amount</label>
                    <input class="form-control" type="number" name="payment" id="amount" value="{{ $pay->payment }}" required>
                </div>

                <div class="row justify-content-center">
                    <input type="submit" value="Create" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>

@endsection