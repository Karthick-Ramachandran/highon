<x-app-layout>
    <div class="mt-4">
        <h1 class="font-bold text-center">
            Your Personal Details
        </h1>
        <div class="grid grid-cols-1 mt-3 justify-items-center sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1">
            <form action="/steptwo/comp" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-6 md:flex md:items-center">
                    <div class="md:w-1/2">
                        <label class="block pr-4 mb-1 font-bold text-gray-500 md:text-right md:mb-0">
                            Skills
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <input value="{{ Auth::user()->complete->skills }}" class="w-full px-4 py-2 leading-tight text-gray-700 bg-gray-200 border-2 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-purple-500" placeholder="Driving, Civil engineer" name="skills" required>
                    </div>
                </div>
                <div class="mb-6 md:flex md:items-center">
                    <div class="md:w-1/2">
                        <label class="block pr-4 mb-1 font-bold text-gray-500 md:text-right md:mb-0">
                            Notice period
                        </label>
                    </div>
                    <div class="md:w-2/2">
                        <input type="number" value="{{ Auth::user()->complete->notice }}" class="w-full px-4 py-2 leading-tight text-gray-700 bg-gray-200 border-2 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-purple-500" placeholder="In days" name="notice" required>
                    </div>
                </div>
                <div class="mb-6 md:flex md:items-center">
                    <div class="md:w-1/2">
                        <label class="block pr-4 mb-1 font-bold text-gray-500 md:text-right md:mb-0">
                            Height
                        </label>
                    </div>
                    <div class="md:w-2/2">
                        <input value="{{ Auth::user()->complete->height }}" class="w-full px-4 py-2 leading-tight text-gray-700 bg-gray-200 border-2 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-purple-500" placeholder="Height" name="height">
                    </div>
                </div>
                <div class="mb-6 md:flex md:items-center">
                    <div class="md:w-1/2">
                        <label class="block pr-4 mb-1 font-bold text-gray-500 md:text-right md:mb-0">
                            Weight
                        </label>
                    </div>
                    <div class="md:w-2/2">
                        <input value="{{ Auth::user()->complete->weight }}" class="w-full px-4 py-2 leading-tight text-gray-700 bg-gray-200 border-2 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-purple-500" placeholder="Weight" name="weight">
                    </div>
                </div>
                <div class="mb-6 md:flex md:items-center">
                    <div class="md:w-1/2">
                        <label class="block pr-4 mb-1 font-bold text-gray-500 md:text-right md:mb-0">
                            Waist
                        </label>
                    </div>
                    <div class="md:w-2/2">
                        <input value="{{ Auth::user()->complete->waist }}" class="w-full px-4 py-2 leading-tight text-gray-700 bg-gray-200 border-2 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-purple-500" placeholder="waist" name="waist">
                    </div>
                </div>
                <div class="mb-6 md:flex md:items-center">
                    <div class="md:w-1/2">
                        <label class="block pr-4 mb-1 font-bold text-gray-500 md:text-right md:mb-0">
                            Shoe size
                        </label>
                    </div>
                    <div class="md:w-2/2">
                        <input value="{{ Auth::user()->complete->shoe }}" class="w-full px-4 py-2 leading-tight text-gray-700 bg-gray-200 border-2 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-purple-500" placeholder="Shoe size" name="shoe">
                    </div>
                </div>
                <div class="mb-6 md:flex md:items-center">
                    <div class="md:w-1/2">
                        <label class="block pr-4 mb-1 font-bold text-gray-500 md:text-right md:mb-0">
                            Permanent Address
                        </label>
                    </div>
                    <div class="md:w-2/2">
                        <input value="{{ Auth::user()->complete->address }}" class="w-full px-4 py-2 leading-tight text-gray-700 bg-gray-200 border-2 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-purple-500" placeholder="address" name="address">
                    </div>
                </div>

                <div class="mb-6 md:flex md:items-center">
                    <div class="md:w-1/2">
                        <label class="block pr-4 mb-1 font-bold text-gray-500 md:text-right md:mb-0">
                            Mailing Address
                        </label>
                    </div>
                    <div class="md:w-2/2">
                        <input value="{{ Auth::user()->complete->mailing_add }}" class="w-full px-4 py-2 leading-tight text-gray-700 bg-gray-200 border-2 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-purple-500" placeholder="Mailing address" name="mailing_add" required>
                    </div>
                </div>
                <div class="mb-6 md:flex md:items-center">
                    <div class="md:w-1/2">
                        <label class="block pr-4 mb-1 font-bold text-gray-500 md:text-right md:mb-0">
                            Email
                        </label>
                    </div>
                    <div class="md:w-2/2">
                        <input type="email" value="{{ Auth::user()->complete->email }}" class="w-full px-4 py-2 leading-tight text-gray-700 bg-gray-200 border-2 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-purple-500" placeholder="Mailing address" name="email" required>
                    </div>
                </div>
                <div class="mb-6 md:flex md:items-center">
                    <div class="md:w-1/2">
                        <label class="block pr-4 mb-1 font-bold text-gray-500 md:text-right md:mb-0">
                            Phone number
                        </label>
                    </div>
                    <div class="md:w-2/2">
                        <input type="number" value="{{ Auth::user()->complete->phone }}" class="w-full px-4 py-2 leading-tight text-gray-700 bg-gray-200 border-2 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-purple-500" placeholder="Phone" name="phone" required>
                    </div>
                </div>
                <div class="mb-6 md:flex md:items-center">
                    <div class="md:w-1/2">
                        <label class="block pr-4 mb-1 font-bold text-gray-500 md:text-right md:mb-0">
                           Your Country code +
                        </label>
                    </div>
                    <div class="md:w-2/2">
                        <input type="number" value="{{ Auth::user()->complete->country_code }}" class="w-full px-4 py-2 leading-tight text-gray-700 bg-gray-200 border-2 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-purple-500" placeholder="91" name="country_code" required>
                    </div>
                </div>
                <div class="mb-6 md:flex md:items-center">
                    <div class="md:w-1/2">
                        <label class="block pr-4 mb-1 font-bold text-gray-500 md:text-right md:mb-0">
                            Passport number / IC Number
                        </label>
                    </div>
                    <div class="md:w-2/2">
                        <input value="{{ Auth::user()->complete->passport }}" class="w-full px-4 py-2 leading-tight text-gray-700 bg-gray-200 border-2 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-purple-500" placeholder="Passport" name="passport" required>
                    </div>
                </div>



                <div class="mb-6 md:flex md:items-center">
                    <div class="md:w-1/2">
                        <label class="block pr-4 mb-1 font-bold text-gray-500 md:text-right md:mb-0">
                            CV (PDF) (optional)
                        </label>
                    </div>
                    <div class="md:w-2/2">
                        <input type="file" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4= text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" placeholder="CV copy" name="cv" accept="application/pdf">
                    </div>
                </div>

                <div class="mb-6 md:flex md:items-center">
                    <div class="md:w-1/2">
                        <label class="block pr-4 mb-1 font-bold text-gray-500 md:text-right md:mb-0">
                            Passport Copy (PDF)
                        </label>
                    </div>
                    <div class="md:w-2/2">
                        <input type="file" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4= text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" placeholder="Passport copy" name="copy" accept="application/pdf">
                    </div>
                </div>

                <div class="mb-6 md:flex md:items-center">
                    <div class="md:w-1/2">
                        <label class="block pr-4 mb-1 font-bold text-gray-500 md:text-right md:mb-0">
                            Upload your Photo
                        </label>
                    </div>
                    <div class="md:w-2/2">
                        <input type="file" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4= text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" placeholder="Your Photo" name="photo" accept="image/*" required>
                    </div>
                </div>
                <div class="mb-5 md:flex md:items-center">
                    <div class="md:w-1/3"></div>
                    <div class="md:w-2/3">
                        <button type="submit" class="px-4 py-2 font-bold text-white bg-purple-500 rounded shadow hover:bg-purple-400 focus:shadow-outline focus:outline-none">
                            Save
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</x-app-layout>
