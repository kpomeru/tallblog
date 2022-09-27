@props(['height' => 'h-2', 'value' => 43])

<div class="flex items-center justify-between space-x-2">
    <img src="{{ asset('images/upload.gif') }}" class="w-6 h-auto shrink-0" alt="">
    <div class="h-2 w-full bg-slate-200 rounded-full relative progress__bar overflow-visible">
        <span class="value absolute inset-y-0 left-0 inline-block rounded-full shadow-xl shadow-indigo-500" style="width: {{ $value }}%"></span>
    </div>
    <span class="text-[10px] font-medium">{{ $value }}%</span>
</div>
