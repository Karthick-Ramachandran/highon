<x-app-layout>
    <x-slot name="header">

    </x-slot>
    <h1 class="mt-8 subpixel-antialiased font-black text-center">
        Welcome to Jobs on High
    </h1>
    @if(Auth::user()->request_admin)
    <div class="grid grid-cols-1 mt-3 justify-items-center sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1">
        <form class="w-full max-w-sm" method="POST" action="/admin/data">
            @csrf
            <div class="mb-6 md:flex md:items-center">
                <div class="md:w-1/2">
                    <label class="block pr-4 mb-1 font-bold text-gray-500 md:text-right md:mb-0">
                        First Name
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input class="w-full px-4 py-2 leading-tight text-gray-700 bg-gray-200 border-2 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-purple-500" placeholder="John" value="{{Auth::user()->adminData->firstname}}" name="firstname" required>
                </div>
            </div>
            <div class="mb-6 md:flex md:items-center">
                <div class="md:w-1/2">
                    <label class="block pr-4 mb-1 font-bold text-gray-500 md:text-right md:mb-0">
                        Last Name
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input class="w-full px-4 py-2 leading-tight text-gray-700 bg-gray-200 border-2 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-purple-500" placeholder="John" value="{{Auth::user()->adminData->lastname}}" name="lastname" required>
                </div>
            </div>
            <div class="mb-6 md:flex md:items-center">
                <div class="md:w-1/2">
                    <label class="block pr-4 mb-1 font-bold text-gray-500 md:text-right md:mb-0" for="inline-full-name">
                        Choose Country
                    </label>
                </div>
                <div class="md:w-2/3">
                    <div class="relative">

                        <select sele class="block w-full px-4 py-3 pr-8 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500" name="country" required>
                            <option value="Singapore" @if(Auth::user()->adminData->country == "Singapore")
                                selected
                                @endif
                                >Singapore</option>
                            <option value="Malaysia" @if(Auth::user()->adminData->country == "Malaysia")
                                selected
                                @endif
                                >Malaysia</option>
                            <option value="Dubai" @if(Auth::user()->adminData->country == "Dubai")
                                selected
                                @endif
                                >Dubai</option>
                            <option value="Qatar" @if(Auth::user()->adminData->country == "Qatar")
                                selected
                                @endif
                                >Qatar</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">
                            <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
                        </div>
                    </div>
                </div>

            </div>

            <div class="mb-6 md:flex md:items-center">
                <div class="md:w-1/2">
                    <label class="block pr-4 mb-1 font-bold text-gray-500 md:text-right md:mb-0">
                        Registration number
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input value="{{Auth::user()->adminData->reg}}" class="w-full px-4 py-2 leading-tight text-gray-700 bg-gray-200 border-2 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-purple-500" type="text" placeholder="number" name="reg" required>
                </div>
            </div>

            <div class="mb-6 md:flex md:items-center">
                <div class="md:w-1/2">
                    <label class="block pr-4 mb-1 font-bold text-gray-500 md:text-right md:mb-0">
                        Business Name
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input value="{{Auth::user()->adminData->business}}" class="w-full px-4 py-2 leading-tight text-gray-700 bg-gray-200 border-2 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-purple-500" type="text" placeholder="" name="business" required>
                </div>
            </div>
            <div class="mb-6 md:flex md:items-center">
                <div class="md:w-1/2">
                    <label class="block pr-4 mb-1 font-bold text-gray-500 md:text-right md:mb-0">
                        Industry
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input value="{{Auth::user()->adminData->industry}}" class="w-full px-4 py-2 leading-tight text-gray-700 bg-gray-200 border-2 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-purple-500" type="text" placeholder="" name="industry" required>
                </div>
            </div>
            <div class="mb-6 md:flex md:items-center">
                <div class="md:w-1/2">
                    <label class="block pr-4 mb-1 font-bold text-gray-500 md:text-right md:mb-0">
                        Business Address
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input value="{{Auth::user()->adminData->bus_add}}" class="w-full px-4 py-2 leading-tight text-gray-700 bg-gray-200 border-2 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-purple-500" type="text" placeholder="" name="bus_add" required>
                </div>
            </div>
            <div class="mb-6 md:flex md:items-center">
                <div class="md:w-1/2">
                    <label class="block pr-4 mb-1 font-bold text-gray-500 md:text-right md:mb-0">
                        Contact number
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input value="{{Auth::user()->adminData->contact}}" class="w-full px-4 py-2 leading-tight text-gray-700 bg-gray-200 border-2 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-purple-500" type="text" placeholder="" name="contact" required>
                </div>
            </div>
            <div class="mb-4 md:flex md:items-center">
                <div class="md:w-1/3"></div>
                <div class="md:w-2/3">
                    <button type="submit" class="px-4 py-2 font-bold text-white bg-purple-500 rounded shadow hover:bg-purple-400 focus:shadow-outline focus:outline-none">
                        Save
                    </button>
                </div>
            </div>
        </form>
    </div>
    @endif
    @if(Auth::user()->is_admin)
    <div class="grid grid-cols-1 mt-3 justify-items-center sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1">
        <form class="w-full max-w-sm" method="POST" action="/admin/data">
            @csrf
            <div class="mb-6 md:flex md:items-center">
                <div class="md:w-1/2">
                    <label class="block pr-4 mb-1 font-bold text-gray-500 md:text-right md:mb-0">
                        First Name
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input class="w-full px-4 py-2 leading-tight text-gray-700 bg-gray-200 border-2 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-purple-500" placeholder="John" value="{{Auth::user()->adminData->firstname}}" name="firstname" required>
                </div>
            </div>
            <div class="mb-6 md:flex md:items-center">
                <div class="md:w-1/2">
                    <label class="block pr-4 mb-1 font-bold text-gray-500 md:text-right md:mb-0">
                        Last Name
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input class="w-full px-4 py-2 leading-tight text-gray-700 bg-gray-200 border-2 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-purple-500" placeholder="John" value="{{Auth::user()->adminData->lastname}}" name="lastname" required>
                </div>
            </div>
            <div class="mb-6 md:flex md:items-center">
                <div class="md:w-1/2">
                    <label class="block pr-4 mb-1 font-bold text-gray-500 md:text-right md:mb-0" for="inline-full-name">
                        Choose Country
                    </label>
                </div>
                <div class="md:w-2/3">
                    <div class="relative">

                        <select sele class="block w-full px-4 py-3 pr-8 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500" name="country" required>
                            <option value="Singapore" @if(Auth::user()->adminData->country == "Singapore")
                                selected
                                @endif
                                >Singapore</option>
                            <option value="Malaysia" @if(Auth::user()->adminData->country == "Malaysia")
                                selected
                                @endif
                                >Malaysia</option>
                            <option value="Dubai" @if(Auth::user()->adminData->country == "Dubai")
                                selected
                                @endif
                                >Dubai</option>
                            <option value="Qatar" @if(Auth::user()->adminData->country == "Qatar")
                                selected
                                @endif
                                >Qatar</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">
                            <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
                        </div>
                    </div>
                </div>

            </div>

            <div class="mb-6 md:flex md:items-center">
                <div class="md:w-1/2">
                    <label class="block pr-4 mb-1 font-bold text-gray-500 md:text-right md:mb-0">
                        Registration number
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input value="{{Auth::user()->adminData->reg}}" class="w-full px-4 py-2 leading-tight text-gray-700 bg-gray-200 border-2 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-purple-500" type="text" placeholder="number" name="reg" required>
                </div>
            </div>

            <div class="mb-6 md:flex md:items-center">
                <div class="md:w-1/2">
                    <label class="block pr-4 mb-1 font-bold text-gray-500 md:text-right md:mb-0">
                        Business Name
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input value="{{Auth::user()->adminData->business}}" class="w-full px-4 py-2 leading-tight text-gray-700 bg-gray-200 border-2 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-purple-500" type="text" placeholder="" name="business" required>
                </div>
            </div>
            <div class="mb-6 md:flex md:items-center">
                <div class="md:w-1/2">
                    <label class="block pr-4 mb-1 font-bold text-gray-500 md:text-right md:mb-0">
                        Industry
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input value="{{Auth::user()->adminData->industry}}" class="w-full px-4 py-2 leading-tight text-gray-700 bg-gray-200 border-2 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-purple-500" type="text" placeholder="" name="industry" required>
                </div>
            </div>
            <div class="mb-6 md:flex md:items-center">
                <div class="md:w-1/2">
                    <label class="block pr-4 mb-1 font-bold text-gray-500 md:text-right md:mb-0">
                        Business Address
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input value="{{Auth::user()->adminData->bus_add}}" class="w-full px-4 py-2 leading-tight text-gray-700 bg-gray-200 border-2 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-purple-500" type="text" placeholder="" name="bus_add" required>
                </div>
            </div>
            <div class="mb-6 md:flex md:items-center">
                <div class="md:w-1/2">
                    <label class="block pr-4 mb-1 font-bold text-gray-500 md:text-right md:mb-0">
                        Contact number
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input value="{{Auth::user()->adminData->contact}}" class="w-full px-4 py-2 leading-tight text-gray-700 bg-gray-200 border-2 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-purple-500" type="text" placeholder="" name="contact" required>
                </div>
            </div>
            <div class="mb-4 md:flex md:items-center">
                <div class="md:w-1/3"></div>
                <div class="md:w-2/3">
                    <button type="submit" class="px-4 py-2 font-bold text-white bg-purple-500 rounded shadow hover:bg-purple-400 focus:shadow-outline focus:outline-none">
                        Save
                    </button>
                </div>
            </div>
        </form>
    </div>

    @else
    @if(Auth::user()->third)
    @if(Auth::user()->third->is_completed)
    <div class="px-6 pt-4 pb-2 mt-3 mb-3">
        <button class="inline-block px-3 py-1 mb-2 mr-2 text-xl font-semibold bg-red-400 rounded-full text-white-700">
            <a href="{{ url('/apply/new') }}">Apply new</a>
        </button>
    </div>
    @endif
    @endif
    @if(!Auth::user()->request_admin)
    <div class="mt-4">
        @if(Auth::user()->confirmed)
        @if(!Auth::user()->is_super_admin)
        <div class="grid grid-cols-1 justify-items-center sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3">
            <div class="max-w-sm mb-4 overflow-hidden rounded shadow-lg">
                <img class="w-full" src="{{ asset('step1.png') }}" alt="Sunset in the mountains">
                <div class="px-6 py-4">
                    <div class="mb-2 text-xl font-bold">Step 1</div>
                    <p class="text-base text-gray-700">
                        Choose a country
                    </p>
                </div>
                @if(Auth::user()->first)
                @if(Auth::user()->first->is_completed)
                <div class="px-6 pt-4 pb-2">
                    <form action="/cancel/app" method="POST">
                        @csrf
                    <button type="submit" class="inline-block px-3 py-1 mb-2 mr-2 text-xl font-semibold bg-red-400 rounded-full text-white-700">
                        Discard
                    </button>
                    <form>
                </div>

                @else
                <div class="px-6 pt-4 pb-2">
                    <button class="inline-block px-3 py-1 mb-2 mr-2 text-xl font-semibold text-gray-700 bg-gray-200 rounded-full">
                        <a href="{{ url('/step/one') }}">Start Step 1</a>
                    </button>
                </div>
                @endif
                @else
                <div class="px-6 pt-4 pb-2">
                    <button class="inline-block px-3 py-1 mb-2 mr-2 text-xl font-semibold text-gray-700 bg-gray-200 rounded-full">
                        <a href="{{ url('/step/one') }}">Start Step 1</a>
                    </button>
                </div>
                @endif
            </div>
            <div class="max-w-sm mb-4 overflow-hidden rounded shadow-lg">
                <img class="w-full" src="{{ asset('step2.png') }}" alt="Sunset in the mountains">
                <div class="px-6 py-4">
                    <div class="mb-2 text-xl font-bold">Step 2</div>
                    <p class="text-base text-gray-700">
                        Personal Details
                    </p>
                </div>
                @if(Auth::user()->first)
                @if(Auth::user()->first->is_completed)
                @if(Auth::user()->second)
                @if(Auth::user()->second->is_completed)
                <div class="px-6 pt-4 pb-2">
                    <button class="inline-block px-3 py-1 mb-2 mr-2 text-xl font-semibold bg-red-400 rounded-full text-white-700">
                        <a href="{{ url('/edit/step/two') }}">Edit Step 2</a>

                    </button>
                    @if(Auth::user()->second->exp)
                    <button class="inline-block px-3 py-1 mt-2 mb-2 mr-2 text-xl font-semibold text-gray-700 bg-gray-200 rounded-full">
                        <a href="{{ url('/add/exp') }}">Add Work Experience</a>
                    </button>
                    @endif
                </div>
                @else
                <div class="px-6 pt-4 pb-2">

                    <button class="inline-block px-3 py-1 mb-2 mr-2 text-xl font-semibold text-gray-700 bg-gray-200 rounded-full">
                        <a href="{{ url('/step/two') }}">Continue to Step 2</a>
                    </button>


                </div>
                @endif
                @else
                <div class="px-6 pt-4 pb-2">
                    <button class="inline-block px-3 py-1 mb-2 mr-2 text-xl font-semibold text-gray-700 bg-gray-200 rounded-full">
                        <a href="{{ url('/step/two') }}">Continue to Step 2</a>
                    </button>
                </div>
                @endif
                @else
                <div class="px-6 pt-4 pb-2">
                    <button class="inline-block px-3 py-1 mb-2 mr-2 text-xl font-semibold text-gray-700 bg-gray-200 rounded-full">
                        Complete first Step to continue
                    </button>
                </div>
                @endif
                @else
                <div class="px-6 pt-4 pb-2">
                    <button class="inline-block px-3 py-1 mb-2 mr-2 text-xl font-semibold text-gray-700 bg-gray-200 rounded-full">
                        Complete first Step to continue
                    </button>
                </div>
                @endif
            </div>
            <div class="max-w-sm mb-4 overflow-hidden rounded shadow-lg">
                <img class="w-full" src="{{ asset('step3.png') }}" alt="Sunset in the mountains">
                <div class="px-6 py-4">
                    <div class="mb-2 text-xl font-bold">Step 3</div>
                    <p class="text-base text-gray-700">
                        Payment
                    </p>
                </div>
                @if(Auth::user()->second)
                @if(Auth::user()->second->is_completed)
                @if(Auth::user()->third)
                @if(Auth::user()->third->is_completed)
                <div class="px-6 pt-4 pb-2">
                    <div class="inline-block px-3 py-1 mb-2 mr-2 text-xl font-semibold bg-red-400 rounded-full text-white-700">
                        Completed
                    </div>
                </div>
                @else
                <div class="px-6 pt-4 pb-2">
                    <button class="inline-block px-3 py-1 mb-2 mr-2 text-xl font-semibold text-gray-700 bg-gray-200 rounded-full">
                        <a href="/payment">Start Step 3</a>
                    </button>
                </div>
                @endif
                @else
                <div class="px-6 pt-4 pb-2">
                    <button class="inline-block px-3 py-1 mb-2 mr-2 text-xl font-semibold text-gray-700 bg-gray-200 rounded-full">
                        <a href="/payment">Start Step 3</a>
                    </button>
                </div>
                @endif
                @else
                <div class="px-6 pt-4 pb-2">
                    <div class="inline-block px-3 py-1 mb-2 mr-2 text-xl font-semibold text-center text-gray-700 bg-gray-200 rounded-full">
                        Complete Step 2 to continue Step 3
                    </div>
                </div>
                @endif
                @else
                <div class="px-6 pt-4 pb-2">
                    <div class="inline-block px-3 py-1 mb-2 mr-2 text-xl font-semibold text-center text-gray-700 bg-gray-200 rounded-full">
                        Complete Step 2 to continue
                    </div>
                </div>
                @endif
            </div>

        </div>
        @endif
        @else
        <div id="admin" class="grid grid-cols-1 justify-items-center sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1">
            <h1 class="text-center">Who you're ?</h1>
            <div class="mt-4">
                <form action="/confirm/candidate" method="POST" onsubmit="myFunction()">
                    @csrf
                    <button type="submit" class="px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700">
                        Candidate Registration
                    </button>
                </form>
            </div>
            <div class="mt-4">
                <form action="/confirm" method="POST" onsubmit="myFunction()">
                    @csrf
                    <button type="submit" class="px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700">
                        Company Registration
                    </button>
                </form>
            </div>
        </div>
        @endif
        <h1 class="mt-3 text-center" style="display:none" id="load">
            Loading.....</h1>
    </div>
    @endif
    @endif
    <script>
        function myFunction() {
            document.getElementById('admin').style.display = "none";
            document.getElementById('load').style.display = "block";
        }
    </script>
</x-app-layout>
