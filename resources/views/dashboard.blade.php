<x-app-layout>
    <x-slot name="header">

    </x-slot>
    <h1 class="text-center subpixel-antialiased mt-8 font-black">
        Welcome to Jobs on High
    </h1>
    <div class="mt-4">
        <div class="grid justify-items-center grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-3">
            <div class="max-w-sm rounded overflow-hidden shadow-lg mb-4">
                <img class="w-full" src="{{ asset('step1.png') }}" alt="Sunset in the mountains">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">Step 1</div>
                    <p class="text-gray-700 text-base">
                        Choose a country
                    </p>
                </div>
                @if(Auth::user()->first)
                @if(Auth::user()->first->is_completed)
                <div class="px-6 pt-4 pb-2">
                    <button class="inline-block bg-red-400 rounded-full px-3 py-1 text-xl font-semibold text-white-700 mr-2 mb-2">
                        Completed
                    </button>
                </div>
                @else
                <div class="px-6 pt-4 pb-2">
                    <button class="inline-block bg-gray-200 rounded-full px-3 py-1 text-xl font-semibold text-gray-700 mr-2 mb-2">
                        <a href="{{ url('/step/one') }}">Start Step 1</a>
                    </button>
                </div>
                @endif
                @else
                <div class="px-6 pt-4 pb-2">
                    <button class="inline-block bg-gray-200 rounded-full px-3 py-1 text-xl font-semibold text-gray-700 mr-2 mb-2">
                        <a href="{{ url('/step/one') }}">Start Step 1</a>
                    </button>
                </div>
                @endif
            </div>
            <div class="max-w-sm rounded overflow-hidden shadow-lg mb-4">
                <img class="w-full" src="{{ asset('step2.png') }}" alt="Sunset in the mountains">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">Step 2</div>
                    <p class="text-gray-700 text-base">
                        Personal Details
                    </p>
                </div>
                @if(Auth::user()->first)
                @if(Auth::user()->first->is_completed)
                @if(Auth::user()->second)
                @if(Auth::user()->second->is_completed)
                <div class="px-6 pt-4 pb-2">
                    <button class="inline-block bg-red-400 rounded-full px-3 py-1 text-xl font-semibold text-white-700 mr-2 mb-2">
                        <a href="{{ url('/edit/step/two') }}">Edit Step 2</a>

                    </button>
                </div>
                @else
                <div class="px-6 pt-4 pb-2">

                    <button class="inline-block bg-gray-200 rounded-full px-3 py-1 text-xl font-semibold text-gray-700 mr-2 mb-2">
                        <a href="{{ url('/step/two') }}">Start Step 2</a>
                    </button>
                </div>
                @endif
                @else
                <div class="px-6 pt-4 pb-2">
                    <button class="inline-block bg-gray-200 rounded-full px-3 py-1 text-xl font-semibold text-gray-700 mr-2 mb-2">
                        <a href="{{ url('/step/two') }}">Start Step 2</a>
                    </button>
                </div>
                @endif
                @else
                <div class="px-6 pt-4 pb-2">
                    <button class="inline-block bg-gray-200 rounded-full px-3 py-1 text-xl font-semibold text-gray-700 mr-2 mb-2">
                        Complete first Step to continue
                    </button>
                </div>
                @endif
                @else
                <div class="px-6 pt-4 pb-2">
                    <button class="inline-block bg-gray-200 rounded-full px-3 py-1 text-xl font-semibold text-gray-700 mr-2 mb-2">
                        Complete first Step to continue
                    </button>
                </div>
                @endif
            </div>
            <div class="max-w-sm rounded overflow-hidden shadow-lg mb-4">
                <img class="w-full" src="{{ asset('step3.png') }}" alt="Sunset in the mountains">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">Step 3</div>
                    <p class="text-gray-700 text-base">
                        Payment
                    </p>
                </div>
                @if(Auth::user()->second)
                @if(Auth::user()->second->is_completed)
                @if(Auth::user()->third)
                @if(Auth::user()->third->is_completed)
                <div class="px-6 pt-4 pb-2">
                    <button class="inline-block bg-red-400 rounded-full px-3 py-1 text-xl font-semibold text-white-700 mr-2 mb-2">
                        Completed
                    </button>
                </div>
                @else
                <div class="px-6 pt-4 pb-2">
                    <button class="inline-block bg-gray-200 rounded-full px-3 py-1 text-xl font-semibold text-gray-700 mr-2 mb-2">
                        <a href="/payment">Start Step 3</a>
                    </button>
                </div>
                @endif
                @else
                <div class="px-6 pt-4 pb-2">
                    <button class="inline-block bg-gray-200 rounded-full px-3 py-1 text-xl font-semibold text-gray-700 mr-2 mb-2">
                        <a href="/payment">Start Step 3</a>
                    </button>
                </div>
                @endif
                @else
                <div class="px-6 pt-4 pb-2">
                    <button class="inline-block bg-gray-200 rounded-full px-3 py-1 text-xl font-semibold text-gray-700 mr-2 mb-2">
                        Complete Step 2 to continue Step 3
                    </button>
                </div>
                @endif
                @else
                <div class="px-6 pt-4 pb-2">
                    <button class="inline-block bg-gray-200 rounded-full px-3 py-1 text-xl font-semibold text-gray-700 mr-2 mb-2">
                        Complete Step 2 to continue
                    </button>
                </div>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>
