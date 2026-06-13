@props(['user', 'size' => 'w-12 h-12'])

@if ($user->image)
                        <img src="{{ $user->imageUrl() }}" alt="{{ $user->name }}" class="{{ $size }} rounded-full">
                    @else
                        <img src="https://img.magnific.com/free-vector/blue-circle-with-white-user_78370-4707.jpg?semt=ais_hybrid&w=740&q=80" class="{{ $size }} rounded-full" alt="">
                    @endif