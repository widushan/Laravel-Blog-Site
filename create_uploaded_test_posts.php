<?php
require __DIR__ . '/vendor/autoload.php';
$app = require __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();
use App\Models\Post;
use App\Models\Category;

// Create posts that reference the existing uploaded images
$posts = [
    [
        'image' => 'posts/DXNvE1bu1N09XVk3HoOy1Vl682lGVstSvlODWvle.png',
        'title' => 'Uploaded Image Test 1',
        'content' => 'This post references an actually uploaded image file.'
    ],
    [
        'image' => 'posts/NUOnIyhJXgy4QJTSsVOWmI5pHAoRYFH6rG9OmaVK.png',
        'title' => 'Uploaded Image Test 2',
        'content' => 'This post also references an actually uploaded image file.'
    ]
];

foreach ($posts as $postData) {
    Post::create([
        'image' => $postData['image'],
        'title' => $postData['title'],
        'slug' => \Illuminate\Support\Str::slug($postData['title']),
        'content' => $postData['content'],
        'category_id' => Category::inRandomOrder()->value('id'),
        'user_id' => 1,
        'published_at' => now(),
    ]);
}
echo "Created 2 test posts with local uploaded images\n";
