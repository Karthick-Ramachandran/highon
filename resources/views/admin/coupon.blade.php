@extends('layouts.admin')

@section('content')

<div class="mt-4">
    <h4 class="text-center">
        Add coupon code
    </h4>

    <div class="row justify-content-center">
        <div class="col-xl-8 col-ls-8 col-sm-12 col-xs-12">
            <form action="{{ route('createcoupon') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="coupon_code">Coupon code</label>
                    <input class="form-control" type="text" name="coupon_code" id="coupon_code" placeholder="Coupon code" required>
                </div>
                <div class="form-group">
                    <label for="amount">Amount</label>
                    <input class="form-control" type="number" name="amount" id="amount" placeholder="Amount you want to reduce" required>
                </div>

                <div class="row justify-content-center">
                    <input type="submit" value="Create" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>

<div class="mt-4">
    <div class="row justify-content-center mb-2">
        @forelse($coupon as $coupons)
        <div class="col-xl-4 col-ls-4 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-description">
                        <p class="text-center">{{ $coupons->coupon_code }}</p>
                        <p class="text-center">{{ $coupons->amount }}</p>
                        <div class="row justify-content-center mt-2">
                            <a href="{{ route('deletecoupon', ['id' => $coupons->id]) }}" class="btn btn-danger">Delete</a>
                        </div>
                        <div class="row justify-content-center mt-2">
                            <a href="{{ route('couponcount', ['id' => $coupons->id]) }}" class="btn btn-success">Applied count</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        @empty
        <h4 class="text-center">No Coupons Found</h4>

        @endforelse
    </div>
</div>
<div class="row justify-content-center mt-4 mb-4">
    @if($coupon->onFirstPage())
    @else
    <a href="{{ $coupon->previousPageUrl() }}" class="btn btn-primary">Prev Page</a>
    @endif
    @if($coupon->hasMorePages())
    <a href="{{ $coupon->nextPageUrl()	 }}" class="btn btn-secondary ml-2">Next Page</a>
    @else
    @endif
</div>
@endsection
