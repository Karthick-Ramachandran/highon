<x-app-layout>
    <x-slot name="header">

    </x-slot>
    <h1 class="text-center subpixel-antialiased mt-8 font-black">
        Welcome to Jobs on High
    </h1>
    @if(Auth::user()->request_admin)
    <div class="mt-3 grid justify-items-center grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1">
        <form class="w-full max-w-sm" method="POST" action="/admin/data">
            @csrf
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/2">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                        First Name
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" placeholder="John" value="{{Auth::user()->adminData->firstname}}" name="firstname" required>
                </div>
            </div>
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/2">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                        Last Name
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" placeholder="John" value="{{Auth::user()->adminData->lastname}}" name="lastname" required>
                </div>
            </div>
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/2">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                        Choose Country
                    </label>
                </div>
                <div class="md:w-2/3">
                    <div class="relative">

                        <select sele class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="country" required>
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
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
                        </div>
                    </div>
                </div>

            </div>

            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/2">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                        Registration number
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input value="{{Auth::user()->adminData->reg}}" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="text" placeholder="number" name="reg" required>
                </div>
            </div>

            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/2">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                        Business Name
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input value="{{Auth::user()->adminData->business}}" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="text" placeholder="" name="business" required>
                </div>
            </div>
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/2">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                        Industry
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input value="{{Auth::user()->adminData->industry}}" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="text" placeholder="" name="industry" required>
                </div>
            </div>
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/2">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                        Business Address
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input value="{{Auth::user()->adminData->bus_add}}" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="text" placeholder="" name="bus_add" required>
                </div>
            </div>
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/2">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                        Contact number
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input value="{{Auth::user()->adminData->contact}}" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="text" placeholder="" name="contact" required>
                </div>
            </div>
            <div class="md:flex md:items-center mb-4">
                <div class="md:w-1/3"></div>
                <div class="md:w-2/3">
                    <button type="submit" class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">
                        Save
                    </button>
                </div>
            </div>
        </form>
    </div>
    @endif
    @if(Auth::user()->is_admin)
    <div class="mt-3 grid justify-items-center grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1">
        <form class="w-full max-w-sm" method="POST" action="/admin/data">
            @csrf
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/2">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                        First Name
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" placeholder="John" value="{{Auth::user()->adminData->firstname}}" name="firstname" required>
                </div>
            </div>
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/2">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                        Last Name
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" placeholder="John" value="{{Auth::user()->adminData->lastname}}" name="lastname" required>
                </div>
            </div>
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/2">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                        Choose Country
                    </label>
                </div>
                <div class="md:w-2/3">
                    <div class="relative">

                        <select sele class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="country" required>
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
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
                        </div>
                    </div>
                </div>

            </div>

            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/2">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                        Registration number
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input value="{{Auth::user()->adminData->reg}}" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="text" placeholder="number" name="reg" required>
                </div>
            </div>

            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/2">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                        Business Name
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input value="{{Auth::user()->adminData->business}}" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="text" placeholder="" name="business" required>
                </div>
            </div>
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/2">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                        Industry
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input value="{{Auth::user()->adminData->industry}}" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="text" placeholder="" name="industry" required>
                </div>
            </div>
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/2">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                        Business Address
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input value="{{Auth::user()->adminData->bus_add}}" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="text" placeholder="" name="bus_add" required>
                </div>
            </div>
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/2">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                        Contact number
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input value="{{Auth::user()->adminData->contact}}" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="text" placeholder="" name="contact" required>
                </div>
            </div>
            <div class="md:flex md:items-center mb-4">
                <div class="md:w-1/3"></div>
                <div class="md:w-2/3">
                    <button type="submit" class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">
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
        <button class="inline-block bg-red-400 rounded-full px-3 py-1 text-xl font-semibold text-white-700 mr-2 mb-2">
            <a href="{{ url('/apply/new') }}">Apply new</a>
        </button>
    </div>
    @endif
    @endif
    @if(!Auth::user()->request_admin)
    <div class="mt-4">
        @if(Auth::user()->confirmed)
        <div class="grid justify-items-center grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3">
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
                    @if(Auth::user()->second->exp)
                    <button class="inline-block mt-2 bg-gray-200 rounded-full px-3 py-1 text-xl font-semibold text-gray-700 mr-2 mb-2">
                        <a href="{{ url('/add/exp') }}">Add Work Experience</a>
                    </button>
                    @endif
                </div>
                @else
                <div class="px-6 pt-4 pb-2">

                    <button class="inline-block bg-gray-200 rounded-full px-3 py-1 text-xl font-semibold text-gray-700 mr-2 mb-2">
                        <a href="{{ url('/step/two') }}">Continue to Step 2</a>
                    </button>


                </div>
                @endif
                @else
                <div class="px-6 pt-4 pb-2">
                    <button class="inline-block bg-gray-200 rounded-full px-3 py-1 text-xl font-semibold text-gray-700 mr-2 mb-2">
                        <a href="{{ url('/step/two') }}">Continue to Step 2</a>
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

        @else
        <div id="admin" class="grid justify-items-center grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1">
            <h1 class="text-center">Who you're ?</h1>
            <div class="mt-4">
                <form action="/confirm/candidate" method="POST" onsubmit="myFunction()">
                    @csrf
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                        Candidate looking for a job
                    </button>
                </form>
            </div>
            <div class="mt-4">
                <form action="/confirm" method="POST" onsubmit="myFunction()">
                    @csrf
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                        Company looking to hire candidates
                    </button>
                </form>
            </div>
        </div>
        @endif
        <h1 class="text-center mt-3" style="display:none" id="load">
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
