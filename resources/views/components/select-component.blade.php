<div class="relative my-6 md:w-60">
    <x-input-label>{{ $label }}</x-input-label>
    <select required wire:model="{{ $model }}"
        class="relative w-full h-10 px-4 text-sm transition-all bg-white border border-gray-300 rounded-md shadow-sm outline-none appearance-none focus-visible:outline-none peer text-slate-500 autofill:bg-whitefocus:border-emerald-500 focus:focus-visible:outline-none disabled:cursor-not-allowed disabled:bg-slate-50 disabled:text-slate-400 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600">
        <option value="" disabled selected></option>
        @foreach ($options as $opt)
            <option value="{{ $opt }}">{{ $opt }}</option>
        @endforeach
    </select>
</div>
