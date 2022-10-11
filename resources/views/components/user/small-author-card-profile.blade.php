@props(['author'])

<div
    {{ $attributes->merge(['class' => 'h-32 rounded-md bg-slate-800 dark:bg-slate-700 flex items-center justify-between overflow-hidden relative cursor-pointer']) }}
    :class="selected.includes('{{ $author->id }}') ? 'bg-indigo-700 text-white shadow-lg' : 'text-slate-400'"
    @click="addOrRemove('{{ $author->id }}')"
>
    <div class="p-4 space-y-4 w-2/3 grow-0 shrink-0">
        <h5 class="text-white text-sm">
            {{ $author->username }}
        </h5>
        <div class="text-xs max-h-12 overflow-hidden">
            <span>
                {{ $author->bio }}
            </span>
        </div>
    </div>
    <img src="{{ $author->avatar ?? 'https://i.pravatar.cc/160?' . $author->email }}" class="w-36 rounded-full border-[8px] translate-y-4" :class="selected.includes('{{ $author->id }}') ? 'border-indigo-600' : 'border-white/10'" alt="Author image">
</div>
