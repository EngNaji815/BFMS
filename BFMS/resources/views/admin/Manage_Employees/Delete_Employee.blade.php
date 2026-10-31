
<div
    id="delete-employee-modal"
    class="fixed inset-0 z-[110] hidden items-center justify-center p-4"
    aria-hidden="true"
>
    <div
        id="delete-employee-overlay"
        class="fixed inset-0 bg-slate-950/60 backdrop-blur-sm"
    ></div>

    <div
        class="relative z-10 w-full max-w-md overflow-hidden rounded-2xl bg-white shadow-2xl"
        role="dialog"
        aria-modal="true"
        aria-labelledby="delete-employee-title"
    >
        <div class="p-6">

            <div class="flex h-12 w-12 items-center justify-center rounded-full bg-red-50 text-red-600">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M12 9v4m0 4h.01M10.29 3.86l-8.18 14A2 2 0 003.84 21h16.32a2 2 0 001.73-3.14l-8.18-14a2 2 0 00-3.42 0z"
                    />
                </svg>
            </div>

            <h2 id="delete-employee-title" class="mt-4 text-lg font-bold text-slate-900">
                Delete Employee
            </h2>

            <p class="mt-2 text-sm leading-6 text-slate-500">
                Are you sure you want to delete
                <span id="delete-employee-name" class="font-semibold text-slate-700"></span>?
                This action cannot be undone.
            </p>

            <form id="delete-employee-form" method="POST" class="mt-6">
                @csrf
                @method('DELETE')

                <div class="flex justify-end gap-3">
                    <button
                        type="button"
                        id="cancel-delete-employee"
                        class="rounded-lg border border-slate-300 bg-white px-4 py-2.5 text-sm font-semibold text-slate-700 transition hover:bg-slate-100"
                    >
                        Cancel
                    </button>

                    <button
                        type="submit"
                        class="rounded-lg bg-red-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500/30"
                    >
                        Delete Employee
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
