<x-app-layout>
    
    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <h1 class="text-2xl font-bold text-gray-800 mb-4">Edit Post: <strong>{{ $post->title }}</strong></h1>

            <div class="py-6 px-6 bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">

                <form action="{{ route('post.update', $post) }}" 
                enctype="multipart/form-data" method="post">

                    @csrf
                    @method('PATCH')
                    
                    @if ($post->imageUrl())
                        <div class="mb-8">
                            <img src="{{ $post->imageUrl() }}" alt="{{ $post->title }}" class="w-full">
                        </div>
                    @endif

                    <!-- Image -->
                    <div>
                        <x-input-label for="image" :value="__('Image')" />
                        <label class="block mb-2.5 text-sm font-medium text-heading" for="file_input">Upload file</label>
                        <input class="cursor-pointer bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full shadow-xs placeholder:text-body" id="file_input" type="file" name="image" autofocus  >
                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                    </div>

                    <!-- Title -->
                    <div class="mt-4">
                        <x-input-label for="title" :value="__('Title')" />
                        <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title', $post->title)" required />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>

                     <!-- Category -->
                    <div class="mt-4">
                        <x-input-label for="category_id" :value="__('Category')" />
                        <select id="category_id" name="category_id" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                            <option value="">Select a Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                @selected(old('category_id', $post->category_id) == $category->id)>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                    </div>

                    <!-- Content -->
                    <div class="mt-4">
                        <x-input-label for="content" :value="__('Content')" />
                        <x-input-textarea id="content" class="block mt-1 w-full" type="text" name="content" required>{{ old('content', $post->content) }}</x-input-textarea>
                        <x-input-error :messages="$errors->get('content')" class="mt-2" />
                    </div>

                    

                    <x-primary-button class="mt-4">Submit</x-primary-button>

                </form>
                
            </div>



            

        </div>

        

    </div>

</x-app-layout>
