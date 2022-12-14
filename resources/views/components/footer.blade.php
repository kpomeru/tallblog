<template x-teleport="body">
    <div class="bg-white/50 dark:bg-slate-800/50 min-h-[64px] md:min-h-[80px] flex items-center py-6 md:py-8 lg:py-10 xl:py-16 border-t border-black/5 dark:border-slate-700">
        <div
            class="custom__container flex flex-col md:flex-row items-center text-center justify-between space-y-6 md:space-y-0 space-x-6 text-sm">
            <div class="md:text-left flex flex-col md:flex-row md:items-center space-x-1">
                <div>
                    <span>
                        &copy; {{ date('Y') }}
                    </span>
                    <span class="text-brand-400 dark:text-brand-300 font-semibold">{{ config('app.name') }}.</span>
                </div>
                <div class="flex items-center space-x-1.5">
                    <span>
                        Built with TALL Stack by
                    </span>
                    <a href="https://kpomeru.com" target="_blank" class="shrink-0 group">
                        <x-kp-logo></x-kp-logo>
                    </a>
                </div>
            </div>

            <div class="flex items-center justify-center md:justify-end space-x-4">
                <a href="https://github.com/kpomeru/tallblog" class="shrink-0 group" title="Open TallBlog github repo">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_21_2)">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M12 0C5.37 0 0 5.37 0 12C0 17.31 3.435 21.795 8.205 23.385C8.805 23.49 9.03 23.13 9.03 22.815C9.03 22.53 9.015 21.585 9.015 20.58C6 21.135 5.22 19.845 4.98 19.17C4.845 18.825 4.26 17.76 3.75 17.475C3.33 17.25 2.73 16.695 3.735 16.68C4.68 16.665 5.355 17.55 5.58 17.91C6.66 19.725 8.385 19.215 9.075 18.9C9.18 18.12 9.495 17.595 9.84 17.295C7.17 16.995 4.38 15.96 4.38 11.37C4.38 10.065 4.845 8.985 5.61 8.145C5.49 7.845 5.07 6.615 5.73 4.965C5.73 4.965 6.735 4.65 9.03 6.195C9.99 5.925 11.01 5.79 12.03 5.79C13.05 5.79 14.07 5.925 15.03 6.195C17.325 4.635 18.33 4.965 18.33 4.965C18.99 6.615 18.57 7.845 18.45 8.145C19.215 8.985 19.68 10.05 19.68 11.37C19.68 15.975 16.875 16.995 14.205 17.295C14.64 17.67 15.015 18.39 15.015 19.515C15.015 21.12 15 22.41 15 22.815C15 23.13 15.225 23.505 15.825 23.385C18.2072 22.5807 20.2772 21.0497 21.7437 19.0074C23.2101 16.965 23.9993 14.5143 24 12C24 5.37 18.63 0 12 0Z"
                                class="fill-current group-hover:fill-brand-300" />
                        </g>
                        <defs>
                            <clipPath id="clip0_21_2">
                                <rect width="24" height="24" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</template>
