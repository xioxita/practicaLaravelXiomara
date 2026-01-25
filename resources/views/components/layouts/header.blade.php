<header class="bg-base-100 shadow-md border-b justify-between items-center border-base-200">
            <div class="dropdown dropdown-end">
                <div tabindex="0" role="button" class="btn btn-ghost bg-[#1b1b18] btn-sm rounded-btn">
                    🌐 {{ strtoupper(app()->getLocale()) }}
                </div>
                <ul tabindex="0" class="menu dropdown-content bg-[#1b1b18] text-white z-[1] p-2 shadow bg-base-100 rounded-box w-32 mt-4">
                    <li><a href="{{ route('lang.switch', 'es') }}">ES</a></li>
                    <li><a href="{{ route('lang.switch', 'en') }}">EN</a></li>
                    <li><a href="{{ route('lang.switch', 'fr') }}">FR</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>
