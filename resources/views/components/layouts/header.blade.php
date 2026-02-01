<header class="bg-base-200 shadow-md border-b border-base-200 p-2 flex items-center">

    <div class="ml-auto flex items-center">
        <div class="dropdown dropdown-end">
            <div tabindex="0" role="button" class="btn btn-ghost btn-sm rounded-btn border border-base-300 flex items-center gap-2">
                <span>🌐</span>
                <span class="font-bold">{{ strtoupper(app()->getLocale()) }}</span>
            </div>

            <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[100] p-2 shadow-xl bg-base-100 rounded-box w-32 border border-base-200">
                <a href="{{ route('lang.switch', 'es') }}" class="btn btn-ghost btn-sm">ES</a>
                <a href="{{ route('lang.switch', 'en') }}" class="btn btn-ghost btn-sm">EN</a>
                <a href="{{ route('lang.switch', 'fr') }}" class="btn btn-ghost btn-sm">FR</a>
            </ul>
        </div>
    </div>
</header>
