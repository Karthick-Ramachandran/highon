<x-app-layout>

    <div class="flex justify-center">
        <div class="max-w-sm mt-5 rounded overflow-hidden shadow-lg">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">
                    Welcome {{ Auth::user()->name }}
                </div>
                <p class="text-gray-700 text-base">
                    You can view all the users who are all applied for Job
                </p>
            </div>
            <div class="px-6 pt-4 pb-2">
                <a href="" class="inline-block bg-black rounded-full px-3 py-1 text-ls font-semibold text-white mr-2 mb-2">View List of Employees Applied</a>
            </div>
        </div>
    </div>
</x-app-layout>
