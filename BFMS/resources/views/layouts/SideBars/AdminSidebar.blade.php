<aside
    id="sidebar"
    class="
        fixed inset-y-0 left-0 z-50
        flex w-64 -translate-x-full flex-col
        bg-slate-950 text-slate-300
        transition-transform duration-300 ease-in-out
        lg:translate-x-0
    ">
    <div class="flex h-20 shrink-0 items-center justify-between border-b border-slate-800 px-5">
        <a
            href="{{ route(auth()->user()->role . '.dashboard') }}"
            class="flex min-w-0 items-center"
        >
            <div
                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-amber-500 font-bold text-slate-950"
            >
                SC
            </div>

            <div class="ml-3 min-w-0">
                <h1 class="text-sm font-bold tracking-wide text-white">
                    SCMS
                </h1>

                <p class="truncate text-xs text-slate-500">
                    Construction Management
                </p>
            </div>

        </a>


        {{-- Mobile Close Button --}}
        <button
            id="sidebar-close"
            type="button"
            class="rounded-lg p-2 text-slate-400 transition hover:bg-slate-800 hover:text-white lg:hidden"
            aria-label="Close sidebar"
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
                    stroke-width="2"
                    d="M6 18L18 6M6 6l12 12"
                />
            </svg>

        </button>

    </div>


    {{-- User Information --}}
    <div class="shrink-0 border-b border-slate-800 px-5 py-5">

        <div class="flex items-center gap-3">

            <div
                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-slate-800 text-sm font-semibold text-amber-400"
            >
                {{ strtoupper(substr(auth()->user()->email, 0, 1)) }}
            </div>

            <div class="min-w-0">

                <p class="truncate text-sm font-medium text-white">
                    {{ auth()->user()->employee?->name ?? auth()->user()->email }}
                </p>

                <p class="mt-0.5 truncate text-xs capitalize text-slate-500">
                    {{ auth()->user()->role }}
                </p>

            </div>

        </div>

    </div>


    {{-- Navigation --}}
    <nav class="flex-1 overflow-y-auto px-3 py-5">

        <p
            class="mb-2 px-3 text-[11px] font-semibold uppercase tracking-wider text-slate-600"
        >
            Main
        </p>


        <a
            href="{{ route(auth()->user()->role . '.dashboard') }}"
            class="
                mb-1 flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm transition
                {{ request()->routeIs('*.dashboard')
                    ? 'bg-slate-800 text-white'
                    : 'text-slate-400 hover:bg-slate-900 hover:text-white' }}
            "
        >

            <svg
                class="h-5 w-5 shrink-0"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1.8"
                    d="M3 12l9-9 9 9M5 10v10h14V10M9 20v-6h6v6"
                />
            </svg>

            <span>Dashboard</span>

        </a>


        @if(auth()->user()->role === 'admin')

            <p
                class="mb-2 mt-6 px-3 text-[11px] font-semibold uppercase tracking-wider text-slate-600"
            >
                Management
            </p>


            <a
                href="{{ route('employees.index') }}"
                class="
                    mb-1 flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm transition
                    {{ request()->routeIs('employees.*')
                        ? 'bg-slate-800 text-white'
                        : 'text-slate-400 hover:bg-slate-900 hover:text-white' }}
                "
            >

                <svg
                    class="h-5 w-5 shrink-0"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="1.8"
                        d="M17 20h5v-2a4 4 0 00-4-4h-1M9 20H2v-2a4 4 0 014-4h3m4-4a4 4 0 100-8 4 4 0 000 8zm6 2a3 3 0 10-2.8-4"
                    />
                </svg>

                <span>Manage Employees</span>

            </a>


            <a
                href="#"
                class="mb-1 flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm text-slate-400 transition hover:bg-slate-900 hover:text-white"
            >

                <svg
                    class="h-5 w-5 shrink-0"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="1.8"
                        d="M3 21h18M5 21V7l7-4 7 4v14M9 21v-6h6v6"
                    />
                </svg>

                <span>Projects</span>

            </a>


            <a
                href="#"
                class="mb-1 flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm text-slate-400 transition hover:bg-slate-900 hover:text-white"
            >

                <svg
                    class="h-5 w-5 shrink-0"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="1.8"
                        d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2M9 11a4 4 0 100-8 4 4 0 000 8zm11 10v-2a4 4 0 00-3-3.87"
                    />
                </svg>

                <span>Manage Customers</span>

            </a>


            <a
                href="#"
                class="mb-1 flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm text-slate-400 transition hover:bg-slate-900 hover:text-white"
            >

                <svg
                    class="h-5 w-5 shrink-0"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="1.8"
                        d="M12 12a4 4 0 100-8 4 4 0 000 8zm-7 9a7 7 0 0114 0"
                    />
                </svg>

                <span>ProjectManagers</span>

            </a>

        @endif



    </nav>

    <div class="shrink-0 border-t border-slate-800 p-3">

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button
                type="submit"
                class="flex w-full items-center gap-3 rounded-lg px-3 py-2.5 text-sm text-slate-400 transition hover:bg-red-500/10 hover:text-red-400"
            >

                <svg
                    class="h-5 w-5 shrink-0"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="1.8"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H5a3 3 0 01-3-3V7a3 3 0 013-3h5a3 3 0 013 3v1"
                    />
                </svg>

                <span>Logout</span>

            </button>

        </form>

    </div>

</aside>