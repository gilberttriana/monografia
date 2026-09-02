<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Crear cuenta | PROTOCOLO</title>
        @vite(['resources/css/app.css'])
    </head>
    <body class="min-h-screen bg-gradient-to-b from-[#f7faff] via-[#edf4ff] to-[#e9f1ff] font-sans text-[#0f1f43] antialiased">
        <div class="flex min-h-screen w-full flex-col">
            <header class="mx-auto flex w-full max-w-[1320px] items-center justify-between px-5 py-6 sm:px-8 lg:px-10">
                <a href="{{ route('home') }}" class="flex items-center gap-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-full bg-[#e9f1ff]">
                        <svg class="h-6 w-6 text-[#2563eb]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M12 3 4 7v6c0 5 3.4 8.8 8 10 4.6-1.2 8-5 8-10V7l-8-4Z" />
                        </svg>
                    </div>
                    <span class="text-3xl font-extrabold tracking-tight">PROTOCOLO</span>
                </a>

                <a href="{{ route('home') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-[#2563eb] hover:text-[#1d4ed8]">
                    <span aria-hidden="true">←</span>
                    Volver al inicio
                </a>
            </header>

            <main class="flex flex-1 items-center px-5 pb-12 pt-4 sm:px-8 lg:px-10">
                <div class="mx-auto grid w-full max-w-[1320px] gap-8 lg:grid-cols-[minmax(620px,760px)_minmax(260px,430px)] lg:items-center xl:gap-14">
                    <div class="relative z-10 w-full rounded-3xl border border-white/70 bg-white p-7 shadow-[0_35px_60px_-45px_rgba(15,31,67,0.95)] sm:p-10 lg:p-12">
                        <div class="mb-6 text-center">
                            <div class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-full bg-[#e9f1ff]">
                                <svg class="h-8 w-8 text-[#2563eb]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M12 3 4 7v6c0 5 3.4 8.8 8 10 4.6-1.2 8-5 8-10V7l-8-4Z" />
                                </svg>
                            </div>
                            <h1 class="text-4xl font-extrabold leading-tight text-[#0f1f43]">Crear una cuenta</h1>
                            <p class="mt-2 text-[#4f6389]">Únete a la plataforma PROTOCOLO y comienza a disfrutar de sus beneficios.</p>
                        </div>

                        @if ($teamInvitation)
                            <div class="mb-5 rounded-xl border border-[#bfdbfe] bg-[#eff6ff] px-4 py-3 text-sm text-[#1e3a8a]">
                                Has sido invitado al equipo <strong>{{ $teamInvitation['teamName'] }}</strong>.
                            </div>
                        @endif

                        <form method="POST" action="{{ route('register.store') }}" class="space-y-4">
                            @csrf

                            <div class="space-y-2">
                                <label for="name" class="text-sm font-semibold text-[#1e3a64]">Nombre completo</label>
                                <input
                                    id="name"
                                    name="name"
                                    type="text"
                                    value="{{ old('name') }}"
                                    required
                                    autofocus
                                    autocomplete="name"
                                    placeholder="Tu nombre completo"
                                    class="w-full rounded-xl border border-[#d8e2f4] px-4 py-3 text-[#0f1f43] outline-none ring-0 placeholder:text-[#9bb0d1] focus:border-[#2563eb] focus:ring-2 focus:ring-[#dbeafe]"
                                >
                                @error('name')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="space-y-2">
                                <label for="email" class="text-sm font-semibold text-[#1e3a64]">Correo electrónico</label>
                                <input
                                    id="email"
                                    name="email"
                                    type="email"
                                    value="{{ old('email') }}"
                                    required
                                    autocomplete="email"
                                    placeholder="ejemplo@correo.com"
                                    class="w-full rounded-xl border border-[#d8e2f4] px-4 py-3 text-[#0f1f43] outline-none ring-0 placeholder:text-[#9bb0d1] focus:border-[#2563eb] focus:ring-2 focus:ring-[#dbeafe]"
                                >
                                @error('email')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="space-y-2">
                                <label for="phone" class="text-sm font-semibold text-[#1e3a64]">Teléfono</label>
                                <input
                                    id="phone"
                                    name="phone"
                                    type="tel"
                                    value="{{ old('phone') }}"
                                    autocomplete="tel"
                                    placeholder="+505 8888-8888"
                                    class="w-full rounded-xl border border-[#d8e2f4] px-4 py-3 text-[#0f1f43] outline-none ring-0 placeholder:text-[#9bb0d1] focus:border-[#2563eb] focus:ring-2 focus:ring-[#dbeafe]"
                                >
                            </div>

                            <div class="space-y-2">
                                <label for="password" class="text-sm font-semibold text-[#1e3a64]">Contraseña</label>
                                <input
                                    id="password"
                                    name="password"
                                    type="password"
                                    required
                                    autocomplete="new-password"
                                    placeholder="••••••••••"
                                    class="w-full rounded-xl border border-[#d8e2f4] px-4 py-3 text-[#0f1f43] outline-none ring-0 placeholder:text-[#9bb0d1] focus:border-[#2563eb] focus:ring-2 focus:ring-[#dbeafe]"
                                >
                                @error('password')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="space-y-2">
                                <label for="password_confirmation" class="text-sm font-semibold text-[#1e3a64]">Confirmar contraseña</label>
                                <input
                                    id="password_confirmation"
                                    name="password_confirmation"
                                    type="password"
                                    required
                                    autocomplete="new-password"
                                    placeholder="••••••••••"
                                    class="w-full rounded-xl border border-[#d8e2f4] px-4 py-3 text-[#0f1f43] outline-none ring-0 placeholder:text-[#9bb0d1] focus:border-[#2563eb] focus:ring-2 focus:ring-[#dbeafe]"
                                >
                                @error('password_confirmation')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <label class="flex items-start gap-3 pt-1 text-sm text-[#4f6389]">
                                <input
                                    type="checkbox"
                                    name="accepted_terms"
                                    value="1"
                                    class="mt-0.5 h-4 w-4 rounded border-[#bfd0ee] text-[#2563eb] focus:ring-[#93c5fd]"
                                >
                                <span>Acepto los <a href="#" class="font-semibold text-[#2563eb] hover:text-[#1d4ed8]">términos y condiciones</a></span>
                            </label>

                            <button
                                type="submit"
                                class="w-full rounded-xl bg-[#2563eb] px-4 py-3 text-base font-semibold text-white shadow-[0_18px_28px_-22px_rgba(37,99,235,1)] transition hover:bg-[#1d4ed8]"
                            >
                                Crear cuenta
                            </button>
                        </form>

                        <p class="mt-6 text-center text-sm text-[#4f6389]">
                            ¿Ya tienes una cuenta?
                            <a
                                href="{{ route('login', $teamInvitation ? ['invitation' => $teamInvitation['code']] : []) }}"
                                class="font-bold text-[#2563eb] hover:text-[#1d4ed8]"
                            >
                                Iniciar sesión
                            </a>
                        </p>
                    </div>

                    <div class="relative hidden h-[640px] overflow-hidden rounded-[2.8rem] lg:block">
                        <div class="absolute -left-24 top-10 h-[580px] w-[580px] rounded-full bg-[#dbeafe]/85"></div>
                        <img
                            src="https://images.pexels.com/photos/8961309/pexels-photo-8961309.jpeg?auto=compress&cs=tinysrgb&w=1000"
                            alt="Técnico"
                            class="relative h-full w-full object-cover object-top"
                        >
                        <div class="absolute inset-0 bg-gradient-to-r from-[#dbeafe]/50 via-[#dbeafe]/15 to-transparent"></div>
                    </div>
                </div>
            </main>

            <section class="mx-auto w-full max-w-[1320px] px-5 pb-10 sm:px-8 lg:px-10">
                <div class="grid grid-cols-1 gap-4 rounded-2xl border border-[#dfe8f8] bg-white/70 p-4 sm:grid-cols-2 xl:grid-cols-4">
                    <article class="flex items-start gap-3 rounded-xl p-2">
                        <div class="flex h-10 w-10 items-center justify-center rounded-full bg-[#e7f0ff] text-[#2563eb]">✓</div>
                        <div>
                            <h3 class="font-bold text-[#0f1f43]">Seguridad garantizada</h3>
                            <p class="text-sm text-[#4f6389]">Protegemos tu información y tus datos personales.</p>
                        </div>
                    </article>
                    <article class="flex items-start gap-3 rounded-xl p-2">
                        <div class="flex h-10 w-10 items-center justify-center rounded-full bg-[#e7f0ff] text-[#2563eb]">⚡</div>
                        <div>
                            <h3 class="font-bold text-[#0f1f43]">Rápido y fácil</h3>
                            <p class="text-sm text-[#4f6389]">Regístrate en pocos minutos y comienza ahora.</p>
                        </div>
                    </article>
                    <article class="flex items-start gap-3 rounded-xl p-2">
                        <div class="flex h-10 w-10 items-center justify-center rounded-full bg-[#e7f0ff] text-[#2563eb]">👥</div>
                        <div>
                            <h3 class="font-bold text-[#0f1f43]">Comunidad confiable</h3>
                            <p class="text-sm text-[#4f6389]">Miles de usuarios y técnicos en Corinto.</p>
                        </div>
                    </article>
                    <article class="flex items-start gap-3 rounded-xl p-2">
                        <div class="flex h-10 w-10 items-center justify-center rounded-full bg-[#e7f0ff] text-[#2563eb]">★</div>
                        <div>
                            <h3 class="font-bold text-[#0f1f43]">Soporte dedicado</h3>
                            <p class="text-sm text-[#4f6389]">Estamos para ayudarte siempre que lo necesites.</p>
                        </div>
                    </article>
                </div>
            </section>

            <footer class="bg-[#0f1f43] py-5 text-center text-sm text-[#c9d8f2]">
                © 2024 PROTOCOLO. Todos los derechos reservados.
            </footer>
        </div>
    </body>
</html>
