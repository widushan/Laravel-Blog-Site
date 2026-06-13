<style>
    .users-horizontal-bar {
        background: #fff;
        border: 0.5px solid #e5e7eb;
        border-radius: 12px;
        padding: 16px 24px;
        display: flex;
        align-items: center;
        justify-content: flex-start;
        gap: 24px;
        overflow-x: auto;
        overflow-y: hidden;
        -webkit-overflow-scrolling: touch;
        margin-top: 24px;
        width: 100%;
        min-height: 120px;
    }

    /* Custom scrollbar styling */
    .users-horizontal-bar::-webkit-scrollbar {
        height: 8px;
    }

    .users-horizontal-bar::-webkit-scrollbar-track {
        background: #f3f4f6;
        border-radius: 10px;
    }

    .users-horizontal-bar::-webkit-scrollbar-thumb {
        background: #d1d5db;
        border-radius: 10px;
    }

    .users-horizontal-bar::-webkit-scrollbar-thumb:hover {
        background: #9ca3af;
    }

    /* Firefox scrollbar */
    .users-horizontal-bar {
        scrollbar-color: #d1d5db #f3f4f6;
        scrollbar-width: thin;
    }

    .users-horizontal-bar-inner {
        display: flex;
        gap: 24px;
        align-items: flex-start;
        flex-wrap: nowrap;
    }

    .user-card {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-decoration: none;
        transition: transform 0.15s, opacity 0.15s;
        flex: 0 0 auto;
        white-space: nowrap;
    }

    .user-card:hover {
        transform: translateY(-4px);
        opacity: 0.8;
    }

    .user-avatar {
        width: 64px;
        height: 64px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid #e5e7eb;
        margin-bottom: 8px;
        background: #f3f4f6;
    }

    .user-card:hover .user-avatar {
        border-color: #2563eb;
    }

    .user-username {
        font-size: 13px;
        font-weight: 500;
        color: #374151;
        text-align: center;
        max-width: 80px;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    /* Small screens */
    @media (max-width: 640px) {
        .users-horizontal-bar {
            padding: 12px 12px;
            gap: 16px;
            min-height: 110px;
        }
        .users-horizontal-bar-inner {
            gap: 16px;
        }
        .user-avatar {
            width: 56px;
            height: 56px;
        }
        .user-username {
            font-size: 12px;
        }
    }
</style>

<div class="users-horizontal-bar" aria-label="App Users">
    <div class="users-horizontal-bar-inner">
        @forelse ($users as $user)
            <a href="{{ route('profile.show', $user->username) }}" class="user-card" title="{{ $user->name }}">
                @if ($user->imageUrl())
                    <img src="{{ $user->imageUrl() }}" alt="{{ $user->name }}" class="user-avatar" />
                @else
                    <div class="user-avatar" style="display: flex; align-items: center; justify-content: center; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; font-weight: bold;">
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    </div>
                @endif
                <span class="user-username">{{ $user->username }}</span>
            </a>
        @empty
            <p class="text-gray-500 text-center">{{ $slot }}</p>
        @endforelse
    </div>
</div>
