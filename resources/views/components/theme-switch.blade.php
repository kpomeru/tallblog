@props(['hasOverride' => false])

<x-button.icon color="light" :style_override="$hasOverride ? 'hover:bg-white dark:hover:bg-slate-800' : null" title="Toggle site theme" @click="themeDataToggleIsDark">
    <template x-if="isDark">
        <i class="fas fa-sun"></i>
    </template>
    <template x-if="!isDark">
        <i class="fas fa-moon"></i>
    </template>
</x-button.icon>
