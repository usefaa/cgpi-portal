<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>IICG Portal</title>

    <!-- FONT AWESOME -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    @vite([
        'resources/css/app.css',
        'resources/css/iicg.css',
        'resources/js/app.js'
    ])

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    @stack('css')

</head>

<body>

    @include('components.sidebar')

    <div class="main-wrapper" id="mainWrapper">

        @include('components.topbar',[
            'title' => $title ?? 'IICG Portal'
        ])

        <main class="content">

            @yield('content')

        </main>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @stack('js')

    <script>

        function toggleCGPI(){

            const menu = document.getElementById('cgpiMenu');
            const arrow = document.getElementById('cgpiArrow');

            if(!menu) return;

            if(menu.style.display === 'none'){

                menu.style.display = 'block';

                if(arrow){
                    arrow.innerHTML = '−';
                }

            }else{

                menu.style.display = 'none';

                if(arrow){
                    arrow.innerHTML = '+';
                }

            }

        }

    </script>

    <script>

        document.addEventListener('DOMContentLoaded', function(){

            const sidebar = document.getElementById('sidebar');
            const mainWrapper = document.getElementById('mainWrapper');
            const toggleBtn = document.getElementById('toggleSidebar');

            if(window.innerWidth < 992){

                sidebar.classList.add('collapsed');

            }

            if(toggleBtn){

                toggleBtn.addEventListener('click', function(){

                    if(window.innerWidth < 992){

                        sidebar.classList.toggle('collapsed');

                    }else{

                        sidebar.classList.toggle('collapsed');
                        mainWrapper.classList.toggle('expanded');

                    }

                });

            }

            document.addEventListener('click', function(e){

                if(window.innerWidth >= 992){
                    return;
                }

                if(
                    !sidebar.contains(e.target)
                    &&
                    !toggleBtn.contains(e.target)
                ){

                    sidebar.classList.add('collapsed');

                }

            });

        });

    </script>

</body>

</html>