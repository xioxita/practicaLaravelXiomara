<x-layouts.layout>
    <x-slot:title>{{ __('Mis Notas de Lectura') }}</x-slot>

    <div class="container mx-auto py-12 px-6">
        <div class="flex flex-col md:flex-row justify-between items-center mb-10 gap-4 text-center md:text-left">
            <div>
                <h1 class="text-5xl font-bold font-serif italic text-primary">{{ __('Tablón Comunitario') }}</h1>
                <p class="text-stone-500 text-lg mt-2">{{ __('Notas compartidas por los alumnos de la biblioteca.') }}</p>
            </div>
            <label for="modal-crear" class="btn btn-primary btn-lg shadow-xl px-10">
                {{ __('+ Escribir Nota') }}
            </label>
        </div>

        @if(session('success'))
            <div class="alert alert-success shadow-lg mb-8 text-white font-bold bg-green-600 border-none">
                <span>✅ {{ session('success') }}</span>
            </div>
        @endif

        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden border border-stone-200">
            <table class="table w-full text-lg">
                <thead class="bg-stone-100">
                <tr class="text-stone-600 uppercase text-sm tracking-widest">
                    <th class="p-6">{{ __('Libro / Tema') }}</th>
                    <th class="p-6">{{ __('Comentario') }}</th>
                    <th class="p-6 text-center">{{ __('Escrito por') }}</th>
                    <th class="p-6 text-center">{{ __('Gestión') }}</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-stone-100">
                @foreach($books as $book)
                    <tr class="hover:bg-stone-50 transition-colors">
                        <td class="p-6 font-bold text-primary">{{ $book->title }}</td>
                        <td class="p-6 text-stone-600 italic leading-relaxed">
                            "{{ $book->image }}"
                        </td>
                        <td class="p-6 text-center">
                            <span class="badge badge-outline p-4 font-medium text-stone-700">{{ $book->author }}</span>
                        </td>
                        <td class="p-6">
                            <div class="flex justify-center gap-4">
                                <label for="modal-editar"
                                       onclick="prepararEdicion('{{ $book->id }}', '{{ $book->title }}', '{{ $book->author }}', '{{ $book->image }}')"
                                       class="btn btn-circle btn-outline btn-info hover:scale-110 transition-transform cursor-pointer"
                                       title="{{ __('Editar') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" /></svg>
                                </label>

                                <button onclick="confirmarEliminar({{ $book->id }})"
                                        class="btn btn-circle btn-outline btn-error hover:scale-110 transition-transform"
                                        title="{{ __('Eliminar') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                </button>

                                <form id="delete-form-{{ $book->id }}" action="{{ route('projects.destroy', $book->id) }}" method="POST" class="hidden">
                                    @csrf @method('DELETE')
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-8 flex justify-center">{{ $books->links() }}</div>
    </div>

    <input type="checkbox" id="modal-crear" class="modal-toggle" />
    <div class="modal">
        <div class="modal-box bg-[#fdfaf3] border-2 border-[#5d4037] rounded-3xl p-8">
            <h3 class="text-2xl font-bold text-[#5d4037] mb-4 italic">{{ __('Nueva Nota de Lectura') }}</h3>
            <form action="{{ route('projects.store') }}" method="POST">
                @csrf
                <div class="form-control mb-4">
                    <label class="label font-bold text-stone-700">{{ __('¿Sobre qué libro es la nota?') }}</label>
                    <input type="text" name="title" class="input input-bordered w-full" placeholder="{{ __('Ej: El Quijote') }}" required />
                </div>
                <div class="form-control mb-4">
                    <label class="label font-bold text-stone-700">{{ __('Tu Nombre / Alumno') }}</label>
                    <input type="text" name="author" class="input input-bordered w-full" placeholder="{{ __('¿Quién escribe?') }}" required />
                </div>
                <div class="form-control mb-6">
                    <label class="label font-bold text-stone-700">{{ __('Tu comentario') }}</label>
                    <textarea name="image" class="textarea textarea-bordered h-24 w-full" placeholder="{{ __('Escribe aquí lo que piensas...') }}" required></textarea>
                </div>
                <div class="modal-action">
                    <label for="modal-crear" class="btn btn-ghost">{{ __('Cancelar') }}</label>
                    <button type="submit" class="btn btn-primary bg-[#5d4037] text-white border-none">{{ __('Publicar Nota') }}</button>
                </div>
            </form>
        </div>
    </div>

    <input type="checkbox" id="modal-editar" class="modal-toggle" />
    <div class="modal">
        <div class="modal-box bg-[#fdfaf3] border-2 border-[#5d4037] rounded-3xl p-8">
            <h3 class="text-2xl font-bold text-[#5d4037] mb-4 italic">{{ __('Editar mi Nota') }}</h3>
            <form id="form-editar" method="POST">
                @csrf @method('PUT')
                <div class="form-control mb-4">
                    <label class="label font-bold text-stone-700">{{ __('Libro') }}</label>
                    <input type="text" name="title" id="input-titulo" class="input input-bordered w-full" required />
                </div>
                <div class="form-control mb-4">
                    <label class="label font-bold text-stone-700">{{ __('Alumno') }}</label>
                    <input type="text" name="author" id="input-autor" class="input input-bordered w-full" required />
                </div>
                <div class="form-control mb-6">
                    <label class="label font-bold text-stone-700">{{ __('Comentario') }}</label>
                    <textarea name="image" id="input-comentario" class="textarea textarea-bordered h-24 w-full" required></textarea>
                </div>
                <div class="modal-action">
                    <label for="modal-editar" class="btn btn-ghost">{{ __('Cancelar') }}</label>
                    <button type="submit" class="btn btn-primary bg-[#5d4037] text-white border-none">{{ __('Guardar Cambios') }}</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmarEliminar(id) {
            Swal.fire({
                title: '{{ __("¿Borrar nota?") }}',
                text: '{{ __("No podrás recuperar este comentario.") }}',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#5d4037',
                confirmButtonText: '{{ __("Sí, borrar") }}',
                cancelButtonText: '{{ __("No, dejarla") }}',
                background: '#fdfaf3'
            }).then((result) => {
                if (result.isConfirmed) { document.getElementById('delete-form-' + id).submit(); }
            })
        }

        function prepararEdicion(id, titulo, autor, comentario) {
            document.getElementById('form-editar').action = '/projects/' + id;
            document.getElementById('input-titulo').value = titulo;
            document.getElementById('input-autor').value = autor;
            document.getElementById('input-comentario').value = comentario;
        }
    </script>
</x-layouts.layout>
