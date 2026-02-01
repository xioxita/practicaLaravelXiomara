<nav class="h-nav bg-nav flex flex-row w-full justify-between px-5 items-center space-x-4">
    <div class="navbar container mx-auto flex-1">
        <div class="flex-1">
            <a href="/" class="btn btn-ghost text-2xl font-serif italic gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
                <span>{{__("Biblio")}} </span><span class="text-primary">{{__("Los Enlaces")}}</span>
            </a>
        </div>
    </div>

    <div class="flex-none gap-2">
        <div class="flex items-center gap-2">
            @auth
                <a href="{{ route('main') }}" class="btn btn-ghost btn-circle hover:bg-stone-200 transition-all duration-300 group" title="Volver al Inicio">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-primary group-hover:scale-110">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                    </svg>
                </a>
            @endauth

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-ghost btn-sm text-stone-500 italic">
                    {{ __('Log Out') }}
                </button>
            </form>
        </div>
    </div>
</nav>
