@extends('layouts.client')

@section('title', 'Buscar contratistas')

@section('content')
    <div class="flex min-h-screen flex-col lg:flex-row">
        <aside class="flex w-full shrink-0 flex-col border-b border-slate-200 bg-white p-5 lg:min-h-screen lg:w-64 lg:border-r lg:border-b-0">
            <a href="{{ route('client.dashboard') }}" class="mb-10 flex items-center gap-2 text-xl font-bold tracking-tight text-blue-900">
                <span class="rounded-lg bg-blue-600 p-2 text-white">P</span>
                PROTOCOLO
            </a>
            <nav class="flex flex-wrap gap-2 lg:flex-col">
                @foreach ([
                    ['Inicio', 'client.dashboard'],
                    ['Mis contrataciones', null],
                    ['Mensajes', null],
                    ['Opiniones', null],
                    ['Favoritos', null],
                    ['Mi perfil', 'profile.edit'],
                    ['Configuración', null],
                ] as [$label, $route])
                    @if ($route)
                        <a href="{{ route($route) }}" class="rounded-lg bg-blue-50 px-3 py-2.5 text-sm font-semibold text-blue-700">{{ $label }}</a>
                    @else
                        <span class="rounded-lg px-3 py-2.5 text-sm text-slate-600">{{ $label }}</span>
                    @endif
                @endforeach
            </nav>
            <form method="POST" action="{{ route('logout') }}" class="mt-auto hidden pt-8 lg:block">
                @csrf
                <button class="w-full rounded-lg px-3 py-2.5 text-left text-sm text-slate-600 hover:bg-slate-50">Cerrar sesión</button>
            </form>
        </aside>

        <main class="min-w-0 flex-1">
            <header class="flex items-center justify-end gap-4 border-b border-slate-200 bg-white px-5 py-4 lg:px-10">
                <button type="button" aria-label="Notificaciones" class="text-xl text-slate-600">♧</button>
                <details class="relative">
                    <summary class="flex cursor-pointer list-none items-center gap-3">
                        @if (auth()->user()->avatar_path)
                            <img src="{{ Storage::url(auth()->user()->avatar_path) }}" alt="{{ auth()->user()->name }}" class="size-10 rounded-full object-cover">
                        @endif
                        <span class="hidden text-left sm:block">
                            <strong class="block text-sm">{{ auth()->user()->name }}</strong>
                            <small class="text-xs text-slate-500">Cliente</small>
                        </span>
                        <span class="text-slate-500">⌄</span>
                    </summary>
                    <div class="absolute right-0 z-10 mt-3 w-48 rounded-xl border border-slate-200 bg-white p-2 shadow-lg">
                        <a href="{{ route('profile.edit') }}" class="block rounded-lg px-3 py-2 text-sm hover:bg-slate-50">Ver mi perfil</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="w-full rounded-lg px-3 py-2 text-left text-sm text-red-600 hover:bg-red-50">Cerrar sesión</button>
                        </form>
                    </div>
                </details>
            </header>

            <div class="mx-auto max-w-6xl space-y-6 p-5 lg:p-10">
                <div>
                    <h1 class="text-2xl font-bold text-slate-900">Buscar contratistas</h1>
                    <p class="mt-1 text-sm text-slate-500">Encuentra el profesional ideal para tu proyecto.</p>
                </div>

                <form method="GET" class="space-y-5 rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
                    <div class="flex flex-col gap-3 lg:flex-row">
                        <input name="search" value="{{ request('search') }}" placeholder="Buscar por nombre, oficio o palabra clave..." class="min-w-0 flex-1 rounded-lg border border-slate-200 px-4 py-3 text-sm outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
                        <button class="rounded-lg bg-blue-600 px-8 py-3 text-sm font-semibold text-white hover:bg-blue-700">Buscar</button>
                    </div>
                    <div class="grid gap-4 md:grid-cols-3">
                        <label class="text-xs font-semibold text-slate-600">Especialidad
                            <select name="specialty" class="mt-2 w-full rounded-lg border border-slate-200 px-3 py-2.5 text-sm font-normal">
                                <option value="">Todas</option>
                                @foreach ($specialties as $specialty)<option value="{{ $specialty }}" @selected(request('specialty') === $specialty)>{{ $specialty }}</option>@endforeach
                            </select>
                        </label>
                        <label class="text-xs font-semibold text-slate-600">Ubicación
                            <select name="location" class="mt-2 w-full rounded-lg border border-slate-200 px-3 py-2.5 text-sm font-normal">
                                <option value="">Todas las zonas</option>
                                @foreach ($locations as $location)<option value="{{ $location }}" @selected(request('location') === $location)>{{ $location }}</option>@endforeach
                            </select>
                        </label>
                        <label class="flex items-end gap-2 pb-2 text-sm text-slate-600">
                            <input type="checkbox" name="available" value="1" @checked(request()->boolean('available')) class="rounded border-slate-300 text-blue-600">
                            Disponible ahora
                        </label>
                    </div>
                </form>

                <div class="flex items-center justify-between">
                    <p class="text-sm text-slate-600"><strong class="text-slate-900">{{ $technicians->total() }}</strong> contratistas encontrados</p>
                    <span class="text-sm text-slate-500">Mejor calificados</span>
                </div>

                <section class="divide-y divide-slate-100 overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
                    @forelse ($technicians as $technician)
                        <article class="flex flex-col gap-5 p-5 md:flex-row md:items-center">
                            <div class="flex size-28 shrink-0 items-center justify-center overflow-hidden rounded-lg bg-slate-100 text-3xl font-bold text-blue-700">
                                @if ($technician->image_path)
                                    <img src="{{ Storage::url($technician->image_path) }}" alt="{{ $technician->name }}" class="size-full object-cover">
                                @else
                                    {{ str($technician->name)->substr(0, 1)->upper() }}
                                @endif
                            </div>
                            <div class="min-w-0 flex-1">
                                <h2 class="text-lg font-bold">{{ $technician->name }}</h2>
                                <p class="mt-1 text-sm text-slate-600">{{ $technician->specialty }}</p>
                                <p class="mt-1 text-xs text-slate-500">{{ $technician->location ?: 'Ubicación no especificada' }} · {{ $technician->years_experience }} años de experiencia</p>
                                <div class="mt-3 flex flex-wrap gap-2">
                                    @foreach ($technician->services ?? [] as $service)<span class="rounded bg-slate-100 px-2 py-1 text-xs text-slate-600">{{ $service }}</span>@endforeach
                                </div>
                            </div>
                            <div class="flex flex-col gap-2 text-sm md:w-44">
                                @if ($technician->ratings_count > 0)
                                    <strong class="text-lg">{{ number_format((float) $technician->ratings_avg_rating, 1) }} <span class="text-amber-500">★</span></strong>
                                    <span class="text-xs text-slate-500">({{ $technician->ratings_count }} {{ $technician->ratings_count === 1 ? 'opinión' : 'opiniones' }})</span>
                                @else
                                    <span class="text-sm text-slate-500">Sin opiniones todavía</span>
                                @endif
                                @if ($technician->is_verified)<span class="w-fit rounded bg-emerald-50 px-2 py-1 text-xs text-emerald-700">Verificado</span>@endif
                                @if ($technician->is_available)<span class="w-fit rounded bg-emerald-50 px-2 py-1 text-xs text-emerald-700">Disponible</span>@endif
                            </div>
                            <div class="flex gap-2 md:w-28 md:flex-col">
                                <button class="flex-1 rounded-lg border border-blue-200 px-3 py-2 text-xs font-semibold text-blue-700">Ver perfil</button>
                                <button class="flex-1 rounded-lg bg-blue-600 px-3 py-2 text-xs font-semibold text-white">Contactar</button>
                            </div>
                        </article>
                    @empty
                        <div class="p-12 text-center text-sm text-slate-500">No hay contratistas disponibles con esos filtros.</div>
                    @endforelse
                </section>

                {{ $technicians->links() }}
            </div>
        </main>
    </div>
@endsection
