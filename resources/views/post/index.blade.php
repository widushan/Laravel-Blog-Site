<x-app-layout>
    
    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div>

                <x-category-tabs>
                    No Categories Found.
                </x-category-tabs>

                <x-users-horizontal-bar :users="$users" class="mt-6">
                    No Users Found.
                </x-users-horizontal-bar>

            </div>



            <div class="overflow-hidden shadow-sm sm:rounded-lg mt-6">

                <div class="p-4 text-gray-900">

                    @forelse ($posts as $post)
                        
                        <x-post-item :post="$post"></x-post-item>

                    @empty
                        <p class="text-gray-500 text-center mt-8">No posts found.</p>
                    @endforelse

                </div>

                {{ $posts->onEachSide(1)->links() }}

        </div>


        </div>

        

    </div>

</x-app-layout>
