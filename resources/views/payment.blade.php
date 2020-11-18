<x-app-layout>

    <div class="flex justify-center">
        <div class="max-w-sm mt-5 rounded overflow-hidden shadow-lg">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">
                    Please finish the payment to complete registeration process
                </div>
                <p class="text-gray-700 text-base">
                    Your Payment is secured with Razor Pay
                </p>
            </div>
            <div class="px-6 pt-4 pb-2">
                <button class="inline-block bg-black rounded-full px-3 py-1 text-ls font-semibold text-white mr-2 mb-2" onclick="submit()" id="dis">Proceed to pay {{ $app->payment }}rs</button>

                <form action="{{ route('payment') }}" method="POST">
                    @csrf
                    <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="{{ env('RAZOR_KEY') }}" data-amount="{{ $app->payment }}00" data-name="Jobs On High" data-description="Paying for Jobs on High Registeration" data-image="{{ asset('/image/nice.png') }}" data-prefill.name="{{ Auth::user()->name }}" data-prefill.email="{{ Auth::user()->email }}" data-theme.color="#ff7529">
                    </script>
                </form>
            </div>
        </div>
    </div>

    <script>
        var data = document.getElementsByClassName('razorpay-payment-button');

        data[0].style.display = 'none';

        function submit() {
            data[0].click();
            document.getElementById('dis').style.display = 'none';
        }
    </script>
</x-app-layout>
