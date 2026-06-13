<style>
    .category-tabs {
        background: #fff;
        border: 0.5px solid #e5e7eb;
        border-radius: 12px;
        padding: 10px 24px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        flex-wrap: wrap;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }

    .category-tabs-inner {
        display: flex;
        gap: 6px;
        align-items: center;
        flex-wrap: wrap;
    }

    .tab {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 8px 18px;
        border-radius: 8px;
        font-size: 14px;
        color: #6b7280;
        text-decoration: none;
        transition: background 0.15s, color 0.15s;
        flex: 0 0 auto;
        white-space: nowrap;
    }

    .tab:hover { background: #f3f4f6; color: #111827; }
    .tab.active { background: #2563eb; color: #fff; font-weight: 500; }

    /* Small screens: reduce padding and allow horizontal scroll */
    @media (max-width: 640px) {
        .category-tabs {
            padding: 8px 12px;
            justify-content: flex-start;
        }
        .category-tabs-inner { gap: 8px; }
        .tab { padding: 6px 10px; font-size: 13px; }
    }
</style>

<nav class="category-tabs" aria-label="Categories">
    <div class="category-tabs-inner">
        <a href="/" class="{{ request()->routeIs('dashboard') ? 'tab active' : 'tab' }}">All</a>
        @forelse ($categories as $category)
            <a href="{{ route('post.byCategory', $category) }}" class="{{ request()->routeIs('post.byCategory') && request()->route('category')->id === $category->id ? 'tab active' : 'tab' }}">{{ $category->name }}</a>
        @empty
            <p class="text-gray-500 text-center mt-4">{{ $slot }}</p>
        @endforelse
    </div>
</nav>