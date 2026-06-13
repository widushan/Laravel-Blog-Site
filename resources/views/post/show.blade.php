<x-app-layout>
    
    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="py-6 px-6 bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">

                <h1 class="text-2xl font-bold mb-4">
                    {{ $post->title }}
                </h1>
                <div class="flex gap-4">
                    <x-user-avatar :user="$post->user" />

                    <!-- Author Info -->
                    <div>
                        <x-follow-ctr :user="$post->user" class="flex gap-2">
                            <a href="{{ route('profile.show', $post->user) }}" class="font-semibold hover:underline">{{ $post->user->name }}</a>
                            &middot;
                            <button @click.prevent="follow()" x-text="following ? 'Unfollow' : 'Follow'" x-test="following ? 'Unfollow' : 'Follow'" 
                            :class="following ? 'text-red-600' : 'text-emerald-600'"
                            >
                                {{ auth()->check() && $post->user->isFollowedBy(auth()->user()) ? 'Unfollow' : 'Follow' }}
                            </button>
                        </x-follow-ctr>
                        <div class="flex gap-2 text-sm text-gray-500">
                            {{ $post->readTime() }} min read
                            &middot;
                            {{ $post->created_at->format('M d, Y') }}
                        </div>
                        </div>
                    </div>


                    @if ($post->user_id === Auth::id())
                        <div class="py-4 mt-4 ">
                            <x-primary-button href="{{ route('post.edit', $post) }}">
                                Edit Post
                            </x-primary-button>
                            <form class="inline-block" action="{{route('post.destroy', $post)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <x-danger-button class="ml-2">
                                    Delete Post
                                </x-danger-button>
                            </form>
                            
                        </div>
                    @endif


                    <!-- Clap Section -->
                    <x-clap-button :post="$post" />

                    <!-- Content Section -->
                    <div class="mt-8">
                        <img src="{{$post->imageUrl()}}" alt="{{$post->title}}" class="w-full">
                        <div>
                            <p class="mt-4">
                                {{ $post->content }}
                            </p>
                        </div>
                    </div>

                    <!-- Category Section -->
                    <div class="mt-8">
                        <span class="px-4 py-2 bg-gray-200 rounded-xl">
                            {{ $post->category->name }}
                        </span>
                    </div>

                    

                    

                </div>

                
            
                
            </div>



            

        </div>

        

    </div>

</x-app-layout>
