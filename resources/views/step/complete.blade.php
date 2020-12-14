<x-app-layout>
    <div class="mt-4">
        <h1 class="text-center font-bold">
            Your Personal Details
        </h1>
        <div class="mt-3 grid justify-items-center grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1">
            <form action="/steptwo/comp" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/2">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                            Skills
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <input value="{{ Auth::user()->complete->skills }}" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" placeholder="Driving, Civil engineer" name="skills" required>
                    </div>
                </div>
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/2">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                            Notice period
                        </label>
                    </div>
                    <div class="md:w-2/2">
                        <input type="number" value="{{ Auth::user()->complete->notice }}" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" placeholder="In days" name="notice" required>
                    </div>
                </div>
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/2">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                            Height
                        </label>
                    </div>
                    <div class="md:w-2/2">
                        <input value="{{ Auth::user()->complete->height }}" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" placeholder="Height" name="height">
                    </div>
                </div>
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/2">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                            Weight
                        </label>
                    </div>
                    <div class="md:w-2/2">
                        <input value="{{ Auth::user()->complete->weight }}" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" placeholder="Weight" name="weight">
                    </div>
                </div>
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/2">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                            Waist
                        </label>
                    </div>
                    <div class="md:w-2/2">
                        <input value="{{ Auth::user()->complete->waist }}" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" placeholder="waist" name="waist">
                    </div>
                </div>
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/2">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                            Shoe size
                        </label>
                    </div>
                    <div class="md:w-2/2">
                        <input value="{{ Auth::user()->complete->shoe }}" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" placeholder="Shoe size" name="shoe">
                    </div>
                </div>
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/2">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                            Permanent Address
                        </label>
                    </div>
                    <div class="md:w-2/2">
                        <input value="{{ Auth::user()->complete->address }}" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" placeholder="address" name="address">
                    </div>
                </div>

                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/2">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                            Mailing Address
                        </label>
                    </div>
                    <div class="md:w-2/2">
                        <input value="{{ Auth::user()->complete->mailing_add }}" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" placeholder="Mailing address" name="mailing_add" required>
                    </div>
                </div>
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/2">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                            Email
                        </label>
                    </div>
                    <div class="md:w-2/2">
                        <input type="email" value="{{ Auth::user()->complete->email }}" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" placeholder="Mailing address" name="email" required>
                    </div>
                </div>
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/2">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                            Phone number
                        </label>
                    </div>
                    <div class="md:w-2/2">
                        <input type="number" value="{{ Auth::user()->complete->phone }}" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" placeholder="Phone" name="phone" required>
                    </div>
                </div>
                @if(Auth::user()->complete->passport == "" || Auth::user()->complete->passport == null)
                @else
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/2">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                            Passport number
                        </label>
                    </div>
                    <div class="md:w-2/2">
                        <input value="{{ Auth::user()->complete->passport }}" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" placeholder="Passport" name="passport" required>
                    </div>
                </div>
                @endif
                @if(Auth::user()->complete->copy == "" || Auth::user()->complete->copy == null)
                @else
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/2">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                            Passport Copy (PDF)
                        </label>
                    </div>
                    <div class="md:w-2/2">
                        <input type="file" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4= text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" placeholder="Passport copy" name="copy" accept="application/pdf">
                    </div>
                </div>
                @endif
                <div class=" md:flex md:items-center mb-6">
                    <div class="md:w-1/2">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                            Upload your Photo
                        </label>
                    </div>
                    <div class="md:w-2/2">
                        <input type="file" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4= text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" placeholder="Your Photo" name="photo" accept="image/*" required>
                    </div>
                </div>
                <div class="md:flex md:items-center mb-5">
                    <div class="md:w-1/3"></div>
                    <div class="md:w-2/3">
                        <button type="submit" class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">
                            Save
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</x-app-layout>
