<header
    class="sticky top-0 z-30 flex h-16 items-center justify-between border-b border-slate-200 bg-white px-4 sm:h-20 sm:px-5 md:px-6 lg:px-7"
>

    {{-- Left --}}
    <div class="flex min-w-0 items-center gap-3">

        {{-- Sidebar Toggle --}}
        <button
            id="sidebar-toggle"
            type="button"
            class="shrink-0 rounded-lg p-2 text-slate-500 transition hover:bg-slate-100 hover:text-slate-900"
            aria-label="Toggle sidebar"
        >

            <svg
                class="h-6 w-6"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16"
                />
            </svg>

        </button>


        <div class="min-w-0">

            <h2 class="truncate text-base font-semibold text-slate-900 sm:text-lg">
                @yield('page-title', 'Dashboard')
            </h2>

            <p class="hidden text-xs text-slate-500 sm:block">
                Smart Construction Management System
            </p>

        </div>

    </div>


    {{-- Right --}}
    <div class="flex shrink-0 items-center gap-1 sm:gap-3">

        {{-- Notifications --}}
        <button
            type="button"
            class="relative rounded-lg p-2 text-slate-500 transition hover:bg-slate-100 hover:text-slate-800"
        >

            <svg
                class="h-5 w-5"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1.8"
                    d="M15 17h5l-1.4-1.4A2 2 0 0118 14.2V11a6 6 0 10-12 0v3.2a2 2 0 01-.6 1.4L4 17h5m6 0a3 3 0 01-6 0"
                />
            </svg>

        </button>


        <div class="hidden h-8 w-px bg-slate-200 sm:block"></div>


        {{-- User --}}
        <div class="flex items-center gap-2 sm:gap-3">

            <div class="hidden text-right md:block">

                <p class="max-w-40 truncate text-sm font-medium text-slate-800">
                    {{ auth()->user()->employee?->name ?? auth()->user()->email }}
                </p>

                <p class="text-xs capitalize text-slate-500">
                    {{ auth()->user()->role }}
                </p>

            </div>


            <div
                class="flex h-9 w-9 items-center justify-center rounded-full bg-slate-900 text-sm font-semibold text-white"
            >
                {{ strtoupper(substr(auth()->user()->email, 0, 1)) }}
            </div>

        </div>

    </div>

</header>