<x-app-layout>
    <div class="mt-4">
        <h1 class="text-center font-bold">
            Add your professional experience
        </h1>
        <div class="mt-3 grid justify-items-center grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1">
            <form class="w-full max-w-sm" method="POST" action="/add/exp">
                @csrf
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/2">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                            Company
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" placeholder="Company" name="company" required>
                    </div>
                </div>
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/2">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                            Country
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" placeholder="Country" name="country" required>
                    </div>
                </div>
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/2">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                            Role (Designation)
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" placeholder="Role" name="position" required>
                    </div>
                </div>
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/2">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                            Permit
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" placeholder="Permit" name="permit">
                    </div>
                </div>
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/2">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                            Duration
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <input type="number" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" placeholder="Duration in years" name="duration" required>
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

        <div class="mt-4 mb-5">
            <div class="grid justify-items-center grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3">

                @forelse ($app as $user)
                <div class="max-w-sm rounded overflow-hidden shadow-lg mb-4">
                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mb-2">{{ $user->company }}</div>
                        <p class="text-gray-700 text-base">
                            {{ $user->country }}
                        </p>
                    </div>
                    <div class="px-6 pt-4 pb-2">
                        <a href="/delete/{{$user->id}}" class="inline-block bg-black rounded-full px-3 py-1 text-ls font-semibold text-white mr-2 mb-2">Delete</a href="/delete/{{$user->id}}">
                    </div>
                </div>
                @empty
                <h1 class="text-center">No experience added</h1>
                @endforelse
            </div>
        </div>

        <div class="flex justify-center">
            {{ $app->links() }}
        </div>
    </div>

</x-app-layout>
