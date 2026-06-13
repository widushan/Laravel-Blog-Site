<?php
require __DIR__ . '/vendor/autoload.php';
$app = require __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();
use App\Models\Post;
Post::each(function ($post) {
    $post->update(['image' => 'https://picsum.photos/400/300?random=' . rand(1000, 9999)]);
});
echo "Updated " . Post::count() . " posts with image URLs\n";
