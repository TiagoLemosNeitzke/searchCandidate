<div class="relative my-6 md:w-60">
    <x-input-label>{{$label}}</x-input-label>
    <select wire:model="language" required
            class="relative w-full h-10 px-4 text-sm transition-all bg-white border rounded outline-none appearance-none focus-visible:outline-none peer border-slate-200 text-slate-500 autofill:bg-white focus:border-emerald-500 focus:focus-visible:outline-none disabled:cursor-not-allowed disabled:bg-slate-50 disabled:text-slate-400">
        <option value="" disabled selected></option>
        @foreach($options as $opt)
            <option value="{{$opt}}">{{$opt}}</option>
        @endforeach
    </select>
</div>
