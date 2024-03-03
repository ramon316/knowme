<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Familia IMSS</title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">

    <!-- Tailwind -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');

        .font-family-karla {
            font-family: karla;
        }
    </style>

    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
</head>
<body class="bg-white font-family-karla">

    <!-- Top Bar Nav -->
    <nav class="w-full py-4 bg-blue-800 shadow">
        <div class="w-full container mx-auto flex flex-wrap items-center justify-between">

            <nav>
                <ul class="flex items-center justify-between font-bold text-sm text-white uppercase no-underline">
                    <li><a class="hover:text-gray-200 hover:underline px-4" href="{{ route('post.index') }}">Inicio</a>
                    </li>
                    <li><a class="hover:text-gray-200 hover:underline px-4" href="{{ route('login') }}">Ingresar</a>
                    </li>
                </ul>
            </nav>

            <div class="flex items-center text-lg no-underline text-white pr-6">
                <a class="" href="https://www.facebook.com/familiaimsschihuahua">
                    <i class="fab fa-facebook"></i>
                </a>
                {{-- <a class="pl-6" href="#">
                    <i class="fab fa-instagram"></i>
                </a>
                <a class="pl-6" href="#">
                    <svg class="w-4 h-4 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" d="M12.186 8.672 18.743.947h-2.927l-5.005 5.9-4.44-5.9H0l7.434 9.876-6.986 8.23h2.927l5.434-6.4 4.82 6.4H20L12.186 8.672Zm-2.267 2.671L8.544 9.515 3.2 2.42h2.2l4.312 5.719 1.375 1.828 5.731 7.613h-2.2l-4.699-6.237Z"/>
                    </svg>
                </a>
                <a class="pl-6" href="#">
                    <i class="fab fa-linkedin"></i>
                </a> --}}
            </div>
        </div>

    </nav>

    <!-- Text Header -->
    <header class="w-full container mx-auto">
        <div class="flex flex-col items-center py-12">
            <img class="w-32" src="{{ asset(Storage::url('image/familiaimss.ico')) }}" alt="">
            <a class="font-bold text-gray-800 uppercase hover:text-gray-700 text-5xl" href="#">
                {{config('app.name', 'Laravel')}}
            </a>
            <p class="text-lg text-gray-600">
                La mejor opción al cambio
            </p>
        </div>
    </header>

    <!-- Topic Nav -->
    {{-- <nav class="w-full py-4 border-t border-b bg-gray-100" x-data="{ open: false }">
        <div class="block sm:hidden">
            <a
                href="#"
                class="md:hidden text-base font-bold uppercase text-center flex justify-center items-center"
                @click="open = !open"
            >
                Topics <i :class="open ? 'fa-chevron-down': 'fa-chevron-up'" class="fas ml-2"></i>
            </a>
        </div>
        <div :class="open ? 'block': 'hidden'" class="w-full flex-grow sm:flex sm:items-center sm:w-auto">
            <div class="w-full container mx-auto flex flex-col sm:flex-row items-center justify-center text-sm font-bold uppercase mt-0 px-6 py-2">
                <a href="#" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">Technology</a>
                <a href="#" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">Automotive</a>
                <a href="#" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">Finance</a>
                <a href="#" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">Politics</a>
                <a href="#" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">Culture</a>
                <a href="#" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">Sports</a>
            </div>
        </div>
    </nav> --}}


    <div class="container mx-auto flex flex-wrap py-6">

        <!-- Posts Section -->
        <section class="w-full md:w-2/3 flex flex-col items-center px-3">
            <h1 class="mb-3 uppercase">¡Bienvenido a nuestra comunidad IMSS!</h1>
            <p class="mb-3">Somos un grupo de trabajadores del Instituto Mexicano del Seguro Social (IMSS) unidos por un propósito común: promover y celebrar las buenas acciones que se realizan dentro de nuestra institución.</p>
            <p class="mb-3">En nuestra página, encontrarás un espacio dedicado a resaltar las iniciativas positivas, los logros y los esfuerzos de nuestros compañeros de trabajo. Creemos firmemente en la importancia de reconocer y compartir las historias que inspiran, que demuestran el compromiso y la dedicación de quienes formamos parte de esta gran familia.</p>
            <p class="mb-3">Nos enorgullece ser parte de una comunidad que trabaja incansablemente para brindar atención médica de calidad y servicios de seguridad social a todos los mexicanos. Valoramos la dedicación de cada uno de nuestros colegas y queremos compartir esas historias que reflejan el impacto positivo que generamos en la vida de las personas a las que servimos.</p>
            <p class="mb-3">Queremos invitarte a que te unas a nosotros en este viaje de reconocimiento y celebración. Si tienes alguna historia que te gustaría compartir o conoces a alguien que merece ser destacado, no dudes en ponerte en contacto con nosotros. ¡Tu contribución es importante para nosotros!</p>
            <p class="mb-3">¡Gracias por visitarnos y ser parte de esta comunidad dedicada a destacar lo mejor del IMSS!</p>
        </section>

        <!-- Sidebar Section -->
        <aside class="w-full md:w-1/3 flex flex-col items-center px-3">

            <div class="w-full bg-white shadow flex flex-col my-4 p-6">
                <p class="text-xl font-semibold pb-5">Sobre nosotros</p>
                <p class="pb-2">¡Hola a todos! Somo un grupo de personas enamorados de lo que hacemos: compartir historias inspiradoras y positivas que suceden en la vibrante comunidad de la salud. Somos un equipo apasionado y comprometido que se esfuerza por destacar lo mejor de esta industria tan vital. Estamos aquí para celebrar cada logro y compartirlo con el mundo. ¡Únete a nosotros en este emocionante viaje de descubrimiento y inspiración!</p>
                <a href="{{ route('knowus')}}" class="w-full bg-blue-800 text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-4">
                    Conocenos
                </a>
            </div>
        </aside>

    </div>

    <footer class="w-full border-t bg-white pb-12">
        <div class="w-full container mx-auto flex flex-col items-center">
            <div class="flex flex-col md:flex-row text-center md:text-left md:justify-between py-6">
                <a href="{{ route('knowus')}}" class="uppercase px-3">Sobre nosotros</a>
                <a href=" {{ route('terminos')}}" class="uppercase px-3">Política de privacidad</a>
                <a href= "{{route('contact.create')}}" class="uppercase px-3">Contactanos</a>
            </div>
            <div class="uppercase pb-6">&copy; familiaimss.com 2024</div>
        </div>
    </footer>
</body>
</html>
