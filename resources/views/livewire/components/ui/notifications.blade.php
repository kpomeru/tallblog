<div x-data="{
        intv: null,
        message: @entangle('message'),
        mouseOver: false,
        timer: 5,
        type: @entangle('type'),

        clear() {
            this.message = ''
        },

        setTimer() {
            this.timer = 5
            this.intv = setInterval(() => {
                if (this.timer > 0 && !this.mouseOver) {
                    this.timer--;
                }
            }, 1000)
        },

        toggleMouseOver(v) {
            this.mouseOver = v
        },
    }"
    x-init="
        $watch('message', () => {
            if (message) {
                if (intv) {
                    clearInterval(intv)
                }
                setTimer();
            }
        })

        $watch('timer', () => {
            if (!timer) {
                clear();
            }
        })
    "
    x-show="message"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 -translate-y-8"
    x-transition:enter-end="opacity-100 translate-y-0"
    x-transition:leave="transition ease-in duration-300"
    x-transition:leave-start="opacity-100 translate-y-0"
    x-transition:leave-end="opacity-0 -translate-y-8"
    class="
        z-40 absolute top-0 inset-x-0 h-16 flex items-center justify-between text-sm font-medium space-x-4 px-4 md:px-6 group
    "
    :class="{
        'bg-rose-500': type === 'error',
        'bg-emerald-500': type === 'success',
        'bg-blue-500': type === 'info',
    }"
    @mouseover="toggleMouseOver(true)"
    @mouseover.away="toggleMouseOver(false)"
>
    <div class="grow flex items-center justify-center w-full text-white">
        {!! $message !!}
    </div>
    <div class="shrink-0">
        <span class="text-white w-6 h-6 flex items-center justify-center rounded-full border cursor-pointer"
            :class="{
            'bg-rose-600 hover:bg-rose-700 border-rose-700': type === 'error',
            'bg-emerald-600 hover:bg-emerald-700 border-emerald-700': type === 'success',
            'bg-blue-600 hover:bg-blue-700 border-blue-700': type === 'info',
        }" @click="clear">
            <span x-text="timer" class="text-xs font-medium group-hover:hidden"></span>
            <i class="fas fa-times hidden group-hover:inline"></i>
        </span>
    </div>
    {{-- <span class="h-1 absolute bg-white/25 bottom-0 left-0 w-[80%]"></span> --}}
</div>
