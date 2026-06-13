<?php
require __DIR__ . '/vendor/autoload.php';
$app = require __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
$post = Post::first();
if (! $post) {
    echo "NO POST\n";
    exit(0);
}
echo "IMAGE=" . $post->image . "\n";
echo "URL=" . Storage::disk('public')->url($post->image) . "\n";
echo "FILE=" . __DIR__ . "/public/storage/" . $post->image . "\n";
echo "FILEEXISTS=" . (file_exists(__DIR__ . "/public/storage/" . $post->image) ? 'yes' : 'no') . "\n";
