<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>PROTOCOLO</title>
        @vite(['resources/css/app.css'])
    </head>
    <body class="bg-[#f8fbff] font-sans text-[#14213d] antialiased">
        <div class="min-h-screen">
            <header class="border-b border-[#e8eef8] bg-white/95">
                <div class="mx-auto flex w-full max-w-7xl items-center justify-between px-4 py-4 sm:px-6 lg:px-8">
                    <a href="{{ route('home') }}" class="flex items-center gap-3">
                        <div class="flex h-10 w-10 items-center justify-center rounded-full bg-[#e9f1ff]">
                            <svg class="h-6 w-6 text-[#2563eb]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M12 3 4 7v6c0 5 3.4 8.8 8 10 4.6-1.2 8-5 8-10V7l-8-4Z" />
                            </svg>
                        </div>
                        <span class="text-2xl font-extrabold tracking-tight text-[#0f2a52]">PROTOCOLO</span>
                    </a>

                    <nav class="hidden items-center gap-8 text-sm font-medium text-[#1e3a64] lg:flex">
                        <a href="#inicio" class="text-[#2563eb]">Inicio</a>
                        <a href="#servicios" class="hover:text-[#2563eb]">Servicios</a>
                        <a href="#nosotros" class="hover:text-[#2563eb]">Sobre nosotros</a>
                        <a href="#contacto" class="hover:text-[#2563eb]">Contacto</a>
                    </nav>

                    <div class="hidden items-center gap-3 sm:flex">
                        <a href="{{ route('login.access') }}" class="rounded-xl border border-[#2563eb] px-5 py-2 text-sm font-semibold text-[#2563eb] hover:bg-[#f0f6ff]">Iniciar sesión</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register.access') }}" class="rounded-xl bg-[#2563eb] px-5 py-2 text-sm font-semibold text-white shadow-[0_12px_24px_-16px_rgba(37,99,235,0.9)] hover:bg-[#1d4ed8]">Registrarse</a>
                        @endif
                    </div>
                </div>
            </header>

            <main id="inicio">
                @if (session('auth_status'))
                    <div class="mx-auto mt-4 w-full max-w-7xl px-4 sm:px-6 lg:px-8">
                        <div class="rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm font-medium text-green-700">
                            {{ session('auth_status') }}
                        </div>
                    </div>
                @endif

                <section class="relative overflow-hidden border-b border-[#e8eef8] bg-gradient-to-r from-[#f6f9ff] via-[#edf4ff] to-[#e6f0ff]">
                    <div class="mx-auto grid w-full max-w-7xl gap-10 px-4 py-14 sm:px-6 lg:grid-cols-2 lg:items-center lg:px-8 lg:py-16">
                        <div class="space-y-6">
                            <h1 class="text-4xl font-extrabold leading-tight text-[#0f1f43] sm:text-5xl">
                                Encuentra técnicos
                                <br>
                                confiables en <span class="text-[#2563eb]">Corinto</span>
                            </h1>
                            <p class="max-w-xl text-lg text-[#445a80]">
                                Encuentra profesionales de electricidad, albañilería, fontanería y soldadura en un solo lugar.
                            </p>
                            <div class="flex flex-wrap gap-4">
                                @if (Route::has('register'))
                                    <a href="{{ route('register.access') }}" class="inline-flex items-center gap-2 rounded-xl bg-[#2563eb] px-7 py-3 text-base font-semibold text-white shadow-[0_20px_30px_-24px_rgba(37,99,235,1)] hover:bg-[#1d4ed8]">
                                        Registrarse
                                    </a>
                                @endif
                                <a href="{{ route('login.access') }}" class="inline-flex items-center gap-2 rounded-xl border border-[#2563eb] px-7 py-3 text-base font-semibold text-[#2563eb] hover:bg-[#f0f6ff]">
                                    Iniciar sesión
                                </a>
                            </div>
                            <p class="flex items-center gap-2 text-sm text-[#4f6389]">
                                <svg class="h-5 w-5 text-[#2563eb]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M12 3 4 7v6c0 5 3.4 8.8 8 10 4.6-1.2 8-5 8-10V7l-8-4Z" />
                                    <path d="m9.5 12 2 2 3-3" />
                                </svg>
                                Únete y contrata al técnico ideal para tu proyecto
                            </p>
                        </div>

                        <div class="relative flex justify-center lg:justify-end">
                            <div class="absolute -left-4 top-6 h-80 w-80 rounded-full bg-[#d7e7ff]/80 blur-xl"></div>
                            <div class="relative w-full max-w-md overflow-hidden rounded-[2rem] border border-white/70 bg-white/50 p-2 shadow-[0_28px_60px_-38px_rgba(17,52,115,0.85)]">
                                <img
                                    src="https://images.pexels.com/photos/8961309/pexels-photo-8961309.jpeg?auto=compress&cs=tinysrgb&w=900"
                                    alt="Técnico profesional"
                                    class="h-[460px] w-full rounded-[1.5rem] object-cover object-top"
                                >
                            </div>
                        </div>
                    </div>
                </section>

                <section id="servicios" class="mx-auto w-full max-w-7xl px-4 py-14 sm:px-6 lg:px-8">
                    <div class="text-center">
                        <h2 class="text-4xl font-extrabold text-[#0f1f43]">Busca por especialidad</h2>
                        <p class="mt-3 text-[#4f6389]">Selecciona el tipo de servicio que necesitas</p>
                    </div>

                    <div class="mt-10 grid grid-cols-1 gap-6 sm:grid-cols-2 xl:grid-cols-4">
                        <article class="rounded-2xl border border-[#e8eef8] bg-white p-8 text-center shadow-[0_20px_45px_-40px_rgba(15,31,67,1)]">
                            <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-[#fef3c7] text-4xl">⚡</div>
                            <h3 class="mt-5 text-2xl font-bold text-[#0f1f43]">Electricidad</h3>
                            <p class="mt-2 text-[#4f6389]">Instalaciones, reparaciones y mantenimiento eléctrico.</p>
                            <a href="#" class="mt-5 inline-flex items-center gap-2 font-semibold text-[#2563eb]">Ver técnicos <span aria-hidden="true">→</span></a>
                        </article>

                        <article class="rounded-2xl border border-[#e8eef8] bg-white p-8 text-center shadow-[0_20px_45px_-40px_rgba(15,31,67,1)]">
                            <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-[#ffedd5] text-4xl">🧱</div>
                            <h3 class="mt-5 text-2xl font-bold text-[#0f1f43]">Albañilería</h3>
                            <p class="mt-2 text-[#4f6389]">Construcciones, remodelaciones y trabajos en general.</p>
                            <a href="#" class="mt-5 inline-flex items-center gap-2 font-semibold text-[#2563eb]">Ver técnicos <span aria-hidden="true">→</span></a>
                        </article>

                        <article class="rounded-2xl border border-[#e8eef8] bg-white p-8 text-center shadow-[0_20px_45px_-40px_rgba(15,31,67,1)]">
                            <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-[#e0f2fe] text-4xl">🚰</div>
                            <h3 class="mt-5 text-2xl font-bold text-[#0f1f43]">Fontanería</h3>
                            <p class="mt-2 text-[#4f6389]">Instalaciones, reparaciones y mantenimiento de agua.</p>
                            <a href="#" class="mt-5 inline-flex items-center gap-2 font-semibold text-[#2563eb]">Ver técnicos <span aria-hidden="true">→</span></a>
                        </article>

                        <article class="rounded-2xl border border-[#e8eef8] bg-white p-8 text-center shadow-[0_20px_45px_-40px_rgba(15,31,67,1)]">
                            <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-[#e5e7eb] text-4xl">🥽</div>
                            <h3 class="mt-5 text-2xl font-bold text-[#0f1f43]">Soldadura</h3>
                            <p class="mt-2 text-[#4f6389]">Trabajos de soldadura, estructuras y metalurgia.</p>
                            <a href="#" class="mt-5 inline-flex items-center gap-2 font-semibold text-[#2563eb]">Ver técnicos <span aria-hidden="true">→</span></a>
                        </article>
                    </div>
                </section>

                <section class="bg-gradient-to-b from-[#f2f7ff] to-[#edf4ff] py-14">
                    <div class="mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8">
                        <div class="text-center">
                            <h2 class="text-4xl font-extrabold text-[#0f1f43]">¿Cómo funciona?</h2>
                            <p class="mt-3 text-[#4f6389]">Así de fácil es encontrar al técnico que necesitas</p>
                        </div>

                        <div class="mt-10 grid grid-cols-1 gap-8 md:grid-cols-2 xl:grid-cols-4">
                            <article class="text-center">
                                <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-[#dbeafe] text-2xl">01</div>
                                <h3 class="mt-4 text-2xl font-bold text-[#0f1f43]">Regístrate</h3>
                                <p class="mt-2 text-[#4f6389]">Crea tu cuenta en pocos pasos.</p>
                            </article>
                            <article class="text-center">
                                <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-[#dbeafe] text-2xl">02</div>
                                <h3 class="mt-4 text-2xl font-bold text-[#0f1f43]">Busca un técnico</h3>
                                <p class="mt-2 text-[#4f6389]">Selecciona el servicio que necesitas.</p>
                            </article>
                            <article class="text-center">
                                <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-[#dbeafe] text-2xl">03</div>
                                <h3 class="mt-4 text-2xl font-bold text-[#0f1f43]">Revisa sus datos</h3>
                                <p class="mt-2 text-[#4f6389]">Conoce su experiencia, calificaciones y opiniones.</p>
                            </article>
                            <article class="text-center">
                                <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-[#dbeafe] text-2xl">04</div>
                                <h3 class="mt-4 text-2xl font-bold text-[#0f1f43]">Contrata</h3>
                                <p class="mt-2 text-[#4f6389]">Contacta al técnico y acuerda el trabajo.</p>
                            </article>
                        </div>
                    </div>
                </section>

                <section id="nosotros" class="mx-auto w-full max-w-7xl px-4 py-14 sm:px-6 lg:px-8">
                    <h2 class="text-center text-4xl font-extrabold text-[#0f1f43]">¿Por qué elegir PROTOCOLO?</h2>

                    <div class="mt-10 grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-3">
                        <article class="flex items-start gap-4 rounded-2xl border border-[#e8eef8] bg-white p-6 shadow-[0_20px_45px_-40px_rgba(15,31,67,1)]">
                            <div class="flex h-14 w-14 items-center justify-center rounded-full bg-[#dcfce7] text-2xl">🛡️</div>
                            <div>
                                <h3 class="text-2xl font-bold text-[#0f1f43]">Técnicos registrados</h3>
                                <p class="mt-1 text-[#4f6389]">Todos nuestros técnicos están registrados en la plataforma.</p>
                            </div>
                        </article>
                        <article class="flex items-start gap-4 rounded-2xl border border-[#e8eef8] bg-white p-6 shadow-[0_20px_45px_-40px_rgba(15,31,67,1)]">
                            <div class="flex h-14 w-14 items-center justify-center rounded-full bg-[#fef3c7] text-2xl">⚡</div>
                            <div>
                                <h3 class="text-2xl font-bold text-[#0f1f43]">Contratación rápida y sencilla</h3>
                                <p class="mt-1 text-[#4f6389]">Encuentra y contacta al técnico ideal en pocos minutos.</p>
                            </div>
                        </article>
                        <article class="flex items-start gap-4 rounded-2xl border border-[#e8eef8] bg-white p-6 shadow-[0_20px_45px_-40px_rgba(15,31,67,1)]">
                            <div class="flex h-14 w-14 items-center justify-center rounded-full bg-[#dbeafe] text-2xl">💬</div>
                            <div>
                                <h3 class="text-2xl font-bold text-[#0f1f43]">Opiniones de clientes</h3>
                                <p class="mt-1 text-[#4f6389]">Revisa las opiniones y calificaciones de otros usuarios.</p>
                            </div>
                        </article>
                    </div>
                </section>
            </main>

            <footer id="contacto" class="bg-[#0f1f43] text-[#d8e4ff]">
                <div class="mx-auto grid w-full max-w-7xl gap-10 px-4 py-12 sm:px-6 md:grid-cols-2 lg:grid-cols-4 lg:px-8">
                    <div>
                        <h3 class="text-3xl font-extrabold text-white">PROTOCOLO</h3>
                        <p class="mt-4 text-sm text-[#b7caee]">Plataforma que conecta a las personas con técnicos confiables en Corinto.</p>
                    </div>
                    <div>
                        <h4 class="text-xl font-bold text-white">Enlaces</h4>
                        <ul class="mt-4 space-y-2 text-sm">
                            <li><a href="#inicio" class="hover:text-white">Inicio</a></li>
                            <li><a href="#servicios" class="hover:text-white">Servicios</a></li>
                            <li><a href="#nosotros" class="hover:text-white">Sobre nosotros</a></li>
                            <li><a href="#contacto" class="hover:text-white">Contacto</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="text-xl font-bold text-white">Contacto</h4>
                        <ul class="mt-4 space-y-2 text-sm">
                            <li>contacto@protocolo.com</li>
                            <li>+505 1234-5678</li>
                            <li>Corinto, Chinandega, Nicaragua</li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="text-xl font-bold text-white">Horarios de atención</h4>
                        <ul class="mt-4 space-y-2 text-sm">
                            <li>Lunes - Viernes</li>
                            <li>7:00 am - 6:00 pm</li>
                            <li class="pt-2">Sábados</li>
                            <li>8:00 am - 1:00 pm</li>
                        </ul>
                    </div>
                </div>
                <div class="border-t border-white/10 py-4 text-center text-sm text-[#aac0e7]">
                    © 2026 PROTOCOLO. Todos los derechos reservados.
                </div>
            </footer>
        </div>
    </body>
</html>
