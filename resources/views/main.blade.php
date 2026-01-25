<x-layouts.layout>
    <x-slot:title>Inicio - Biblio</x-slot>

    @guest
        <div class="hero min-h-[60vh] bg-base-200 rounded-2xl shadow-inner mt-4">
            <div class="hero-content text-center">
                <div class="max-w-md">
                    <h1 class="text-5xl font-bold font-serif italic">Bienvenida a <span class="text-primary">Biblio</span></h1>
                    <p class="py-6 text-lg">Tu rincón favorito para descubrir nuevas historias. Regístrate para gestionar tus lecturas y proyectos educativos.</p>
                    <div class="flex justify-center gap-4">
                        <a href="{{ route('login') }}" class="btn btn-primary">Iniciar Sesión</a>
                        <a href="{{ route('register') }}" class="btn btn-outline btn-primary">Crear Cuenta</a>
                    </div>
                </div>
            </div>
        </div>
    @endguest

    @auth
        <div class="hero bg-base-100 py-10 rounded-2xl border border-base-200 mt-4">
            <div class="hero-content flex-col lg:flex-row">
                <img
                    src="https://images.unsplash.com/photo-1507842217343-583bb7270b66?q=80&w=1000&auto=format&fit=crop"
                    class="max-w-sm rounded-lg shadow-2xl"
                />
                <div class="ml-6">
                    <h1 class="text-5xl font-bold">¡Hola de nuevo, {{ Auth::user()->name }}!</h1>
                    <p class="py-6 text-lg">
                        Ya puedes gestionar todo el catálogo de la biblioteca. Revisa las novedades de hoy o gestiona los préstamos activos.
                    </p>
                    <div class="flex gap-2">
                        <button class="btn btn-primary">Mi Perfil</button>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-ghost text-error">Cerrar Sesión</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mx-auto py-10">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 justify-items-center">

                <div class="card bg-base-100 shadow-xl border border-base-200 w-full max-w-sm hover:scale-105 transition-transform">
                    <figure class="px-6 pt-6">
                        <img src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
                             alt="Portada Libro" class="rounded-xl object-cover h-48 w-full" />
                    </figure>
                    <div class="card-body items-center text-center">
                        <h2 class="card-title text-primary">El Quijote</h2>
                        <p class="text-sm italic">Miguel de Cervantes</p>
                        <div class="card-actions mt-4">
                            <button class="btn btn-primary btn-sm">Añadir al Carrito</button>
                        </div>
                    </div>
                </div>

                <div class="card bg-base-100 shadow-xl border border-base-200 w-full max-w-sm hover:scale-105 transition-transform">
                    <figure class="px-6 pt-6">
                        <img src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
                             alt="Portada Libro" class="rounded-xl object-cover h-48 w-full" />
                    </figure>
                    <div class="card-body items-center text-center">
                        <h2 class="card-title text-primary">Cien años de Soledad</h2>
                        <p class="text-sm italic">Gabriel García Márquez</p>
                        <div class="card-actions mt-4">
                            <button class="btn btn-primary btn-sm">Añadir al Carrito</button>
                        </div>
                    </div>
                </div>

                <div class="card bg-base-100 shadow-xl border border-base-200 w-full max-w-sm hover:scale-105 transition-transform">
                    <figure class="px-6 pt-6">
                        <img src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
                             alt="Portada Libro" class="rounded-xl object-cover h-48 w-full" />
                    </figure>
                    <div class="card-body items-center text-center">
                        <h2 class="card-title text-primary">1984</h2>
                        <p class="text-sm italic">George Orwell</p>
                        <div class="card-actions mt-4">
                            <button class="btn btn-primary btn-sm">Añadir al Carrito</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    @endauth
</x-layouts.layout>
