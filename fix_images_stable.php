<?php
require __DIR__ . '/vendor/autoload.php';
$app = require __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();
use App\Models\Post;

// Update all posts to use stable placeholder images
Post::all()->each(function ($post) {
    $post->update(['image' => 'https://picsum.photos/400/300?random=' . $post->id]);
});
echo "Updated " . Post::count() . " posts with stable image URLs\n";
