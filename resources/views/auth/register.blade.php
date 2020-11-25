<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <input type="checkbox" name="is_agreed" value="Hello" onchange="hello()">
                &nbsp; I hereby declare that the above mentioned information is true to my knowledge and will appreciate.

            </div>

            <div class="mt-4">
                <span>By submitting an application, you agree to Jobs on High's <a style="color: blue" href="{{ url('/terms-and-conditions') }}">
                        Terms of Service</a> and <a style="color: blue" href="{{ url('/privacy-policy') }}">
                        Privacy policy</a>, as well as your application being followed by the Employer and processed in accordance with the Employer's privacy policy.</span>
            </div>

            <div class="flex items-center justify-end mt-4">

                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4" id="registerbutton" disabled>
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
    <script>
        function hello() {
            console.log(event.target.checked);
            if (event.target.checked) {
                document.getElementById('registerbutton').disabled = false;
            } else {
                document.getElementById('registerbutton').disabled = true;

            }
        }
    </script>
</x-guest-layout>