<x-app-layout>
    <div class="text-center mt-5">
        <h1 class="text-red-500">
            Please be careful when you submit. This cannot be changed later.
        </h1>
    </div>

    <div class="mt-4">
        <h1 class="text-center font-bold">
            Choose Country, Permit and Role
        </h1>
        <div class="mt-3 grid justify-items-center grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1">
            <form class="w-full max-w-sm" method="POST" action="/stepone">
                @csrf
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/2">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                            Choose Country
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <div class="relative">

                            <select onchange="getPermit(event.target.value)" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="country" required>
                                <option value="Singapore">Singapore</option>
                                <option value="Malaysia">Malaysia</option>
                                <option value="Dubai">Dubai</option>
                                <option value="Quatar">Quatar</option>
                                <option value="not">Not listed here</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="md:flex md:items-center mb-6" id="permit">
                    <div class="md:w-1/2">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                            Permit type
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <div class="relative">

                            <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="permit" required>
                                <option value="low">Low level work permit</option>
                                <option value="High">High level work permit</option>
                                <option value="epass">Epass / Spass</option>
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
                            Designation
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" placeholder="Role" name="position" required>
                    </div>
                </div>

                <div class="md:flex md:items-center">
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
