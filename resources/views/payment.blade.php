<x-app-layout>

    <div class="flex justify-center">
        <div class="max-w-sm mt-5 overflow-hidden rounded shadow-lg">
            <div class="px-6 py-4">
                <div class="mb-2 text-xl font-bold">
                    Please finish the payment to complete registration process
                </div>
                <p class="text-base text-gray-700">
                    Your Payment is secured with us
                </p>
            </div>
            @if($application->is_coupon_code_applied)
            @else
            <div class="mb-6 ml-3 md:flex md:items-center">
                <div class="md:w-2/2">
                    <label class="block pr-4 mb-1 font-bold text-gray-500 md:text-right md:mb-0">
                        Promo code
                    </label>

                </div>
                <form action="{{ route('couponapply') }}" method="POST">
                    @csrf
                    <div>
                        <input class="w-full px-4 py-2 leading-tight text-gray-700 bg-gray-200 border-2 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-purple-500" value="" placeholder="Type and press enter" name="coupon_code">
                    </div>

                </form>
            </div>
            @endif
            <div class="px-6 pt-4 pb-2">
                <button class="inline-block px-3 py-1 mb-2 mr-2 font-semibold text-white bg-black rounded-full text-ls" onclick="submit()" id="dis">Proceed to pay {{ $application->amount }}rs</button>

                <form action="{{ route('payment') }}" method="POST">
                    @csrf
                    <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="rzp_live_yLTTpZJyL1x1a3" data-amount="{{ $application->amount }}00" data-buttontext="Pay 1 INR" data-name="Jobs on High" data-description="Paying for High on Jobs Registration" data-image="{{ asset('pay.jpeg') }}" data-prefill.name="{{ Auth::user()->name }}" data-prefill.email="{{ Auth::user()->email }}" data-theme.color="#FF5733">
                    </script>
                </form>

                <div class="mt-4">
                    <p class="text-base text-gray-700">
                        International Payments ouside India Please select wallet and inside the wallet, select payment option paypal.</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        var cost = "{{ $application->amount }}";
        var data = document.getElementsByClassName('razorpay-payment-button');
        document.getElementById('dis').innerHTML = `Proceed to pay ${cost}rs`;

        data[0].style.display = 'none';

        function submit() {
            data[0].click();
            document.getElementById('dis').style.display = 'none';
        }
    </script>
</x-app-layout>
