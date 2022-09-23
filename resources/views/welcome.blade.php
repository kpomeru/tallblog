@extends('layouts.app')

@section('content')
    {{-- <div class="flex flex-col justify-center min-h-screen py-12 bg-gray-50 sm:px-6 lg:px-8">
        <div class="absolute top-0 right-0 mt-4 mr-4">
            @if (Route::has('login'))
                <div class="space-x-4">
                    @auth
                        <a
                            href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150"
                        >
                            Log out
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>

    </div> --}}

    <div>
        Knowing others is intelligence; knowing yourself is true wisdom.

        <x-button.icon color="dark">D</x-button.icon>
        <x-button.icon>D</x-button.icon>
        <a href="">
            <x-button class="group">
                <span>A normal button</span>
                <i class="fas fa-arrow-right group-hover:translate-x-1"></i>
            </x-button>
        </a>

        <div class="w-full mx-auto max-w-screen-sm">
            <div>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed quos assumenda ad, in quo inventore aliquid, ratione eum culpa laborum error, nostrum laboriosam autem vitae! Dolore perspiciatis, ipsa dolorem natus ratione in non iusto, explicabo placeat assumenda eius consequatur nihil illo ad. Cupiditate nihil alias ea. Eveniet rem necessitatibus fugit laudantium doloribus, eos natus cumque aliquid deleniti sit nam recusandae! Vitae nostrum eos repudiandae voluptatibus odio assumenda sit reiciendis temporibus delectus atque maxime optio beatae quam quasi nisi doloremque repellat vel quod, totam magni reprehenderit alias harum sequi? Ut veritatis nesciunt iure cupiditate. Quo beatae natus libero harum ad assumenda!
            </div>
            <div>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed quos assumenda ad, in quo inventore aliquid, ratione eum culpa laborum error, nostrum laboriosam autem vitae! Dolore perspiciatis, ipsa dolorem natus ratione in non iusto, explicabo placeat assumenda eius consequatur nihil illo ad. Cupiditate nihil alias ea. Eveniet rem necessitatibus fugit laudantium doloribus, eos natus cumque aliquid deleniti sit nam recusandae! Vitae nostrum eos repudiandae voluptatibus odio assumenda sit reiciendis temporibus delectus atque maxime optio beatae quam quasi nisi doloremque repellat vel quod, totam magni reprehenderit alias harum sequi? Ut veritatis nesciunt iure cupiditate. Quo beatae natus libero harum ad assumenda!
            </div>
            <div>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed quos assumenda ad, in quo inventore aliquid, ratione eum culpa laborum error, nostrum laboriosam autem vitae! Dolore perspiciatis, ipsa dolorem natus ratione in non iusto, explicabo placeat assumenda eius consequatur nihil illo ad. Cupiditate nihil alias ea. Eveniet rem necessitatibus fugit laudantium doloribus, eos natus cumque aliquid deleniti sit nam recusandae! Vitae nostrum eos repudiandae voluptatibus odio assumenda sit reiciendis temporibus delectus atque maxime optio beatae quam quasi nisi doloremque repellat vel quod, totam magni reprehenderit alias harum sequi? Ut veritatis nesciunt iure cupiditate. Quo beatae natus libero harum ad assumenda!
            </div>
            <div>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed quos assumenda ad, in quo inventore aliquid, ratione eum culpa laborum error, nostrum laboriosam autem vitae! Dolore perspiciatis, ipsa dolorem natus ratione in non iusto, explicabo placeat assumenda eius consequatur nihil illo ad. Cupiditate nihil alias ea. Eveniet rem necessitatibus fugit laudantium doloribus, eos natus cumque aliquid deleniti sit nam recusandae! Vitae nostrum eos repudiandae voluptatibus odio assumenda sit reiciendis temporibus delectus atque maxime optio beatae quam quasi nisi doloremque repellat vel quod, totam magni reprehenderit alias harum sequi? Ut veritatis nesciunt iure cupiditate. Quo beatae natus libero harum ad assumenda!
            </div>
            <div>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed quos assumenda ad, in quo inventore aliquid, ratione eum culpa laborum error, nostrum laboriosam autem vitae! Dolore perspiciatis, ipsa dolorem natus ratione in non iusto, explicabo placeat assumenda eius consequatur nihil illo ad. Cupiditate nihil alias ea. Eveniet rem necessitatibus fugit laudantium doloribus, eos natus cumque aliquid deleniti sit nam recusandae! Vitae nostrum eos repudiandae voluptatibus odio assumenda sit reiciendis temporibus delectus atque maxime optio beatae quam quasi nisi doloremque repellat vel quod, totam magni reprehenderit alias harum sequi? Ut veritatis nesciunt iure cupiditate. Quo beatae natus libero harum ad assumenda!
            </div>
            <div>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed quos assumenda ad, in quo inventore aliquid, ratione eum culpa laborum error, nostrum laboriosam autem vitae! Dolore perspiciatis, ipsa dolorem natus ratione in non iusto, explicabo placeat assumenda eius consequatur nihil illo ad. Cupiditate nihil alias ea. Eveniet rem necessitatibus fugit laudantium doloribus, eos natus cumque aliquid deleniti sit nam recusandae! Vitae nostrum eos repudiandae voluptatibus odio assumenda sit reiciendis temporibus delectus atque maxime optio beatae quam quasi nisi doloremque repellat vel quod, totam magni reprehenderit alias harum sequi? Ut veritatis nesciunt iure cupiditate. Quo beatae natus libero harum ad assumenda!
            </div>
        </div>
    </div>
@endsection
