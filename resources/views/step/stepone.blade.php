<x-app-layout>
    <div class="mt-5 text-center">
        <h1 class="text-red-500">
            Please be careful when you submit. This cannot be changed later.
        </h1>
    </div>

    <div class="mt-4">
        <h1 class="font-bold text-center">
            Choose Country, Permit and Role
        </h1>
        <div class="grid grid-cols-1 mt-3 justify-items-center sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1">
            <form class="w-full max-w-sm" method="POST" action="/stepone">
                @csrf
                <div class="mb-6 md:flex md:items-center">
                    <div class="md:w-1/2">
                        <label class="block pr-4 mb-1 font-bold text-gray-500 md:text-right md:mb-0" for="inline-full-name">
                            Choose Country
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <div class="relative">

                            <select onchange="getPermit(event.target.value)" class="block w-full px-4 py-3 pr-8 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500" name="country" required>
                                <option value="Singapore">Singapore</option>
                                <option value="Malaysia">Malaysia</option>
                                <option value="Dubai">Dubai</option>
                                <option value="Qatar">Qatar</option>
                                {{-- forelse with coutries --}}
                                @foreach ($countries as $country )
                                <option value={{ $country->name }}>{{ $country->name }}</option>
                                @endforeach
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">
                                <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="mb-6 md:flex md:items-center" id="permit">
                    <div class="md:w-1/2">
                        <label class="block pr-4 mb-1 font-bold text-gray-500 md:text-right md:mb-0" for="inline-full-name">
                            Permit type
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <div class="relative">

                            <select class="block w-full px-4 py-3 pr-8 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500" name="permit" required>
                                <option value="low">Low levy work permit</option>
                                <option value="High">High levy work permit</option>
                                <option value="epass">Epass / Spass</option>
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
                        <label class="block pr-4 mb-1 font-bold text-gray-500 md:text-right md:mb-0" for="inline-full-name">
                            Choose Job Category
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <div class="relative">

                            <select class="block w-full px-4 py-3 pr-8 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500" name="position" required>
                                @foreach($users as $user)
                                <option value="{{ $user->subs }}">{{ $user->subs }}</option>

                                @endforeach
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
                            Designation
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <input class="w-full px-4 py-2 leading-tight text-gray-700 bg-gray-200 border-2 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-purple-500" placeholder="Role" name="sub">
                    </div>
                </div>

                <div class="md:flex md:items-center">
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

    <script>
        function getPermit(e) {

            if (e === "Singapore") {
                document.getElementById('permit').classList.remove('disp');
            } else {
                document.getElementById('permit').classList.add('disp');
            }

        }
    </script>
</x-app-layout>
