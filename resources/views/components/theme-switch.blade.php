@props(['hasOverride' => false])

<x-button.icon color="light" :style_override="$hasOverride ? 'hover:bg-white dark:hover:bg-slate-800' : null"  @click="themeDataToggleIsDark">
    <div :title="isDark ? 'Switch to light theme' : 'Switch to dark theme'">
        <template x-if="!isDark">
            <x-heroicon-s-sun />
        </template>
        <template x-if="isDark">
            <x-heroicon-s-moon class="w-5" />
        </template>
    </div>
</x-button.icon>
