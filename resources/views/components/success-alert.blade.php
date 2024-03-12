<!-- Component: Simple success Alert -->
@if (session()->has('success'))
    <div x-data="{ showMessage: true }" x-show="showMessage" x-init="setTimeout(() => showMessage = false, 3000)"
        class="flex w-full px-4 py-3 my-12 space-x-8 text-xl text-green-500 border border-green-100 rounded bg-green-50"
        role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-8 h-8 text-green-500">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
        </svg>

        <p>{{ session()->get('success') }}</p>
    </div>
@endif
<!-- End Simple success Alert -->
