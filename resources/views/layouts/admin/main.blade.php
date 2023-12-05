<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
 
  @if(Auth::user()->user_group_id==1)
  <title>Super Admin | Abcari</title>
  @elseif(Auth::user()->user_group_id==2)
  <title>Country Admin | Abcari</title>
  @elseif(Auth::user()->user_group_id==3)
  <title>Bar Admin | Abcari</title>
  @endif
  @livewire('theme-css')
  @livewireStyles
    </head>
    <body>
        
        @include('layouts.admin.loader')
        @if(Auth::user()->user_group_id==1)
        @include('layouts.admin.navbar.superAdmin')
        @elseif(Auth::user()->user_group_id==2)
        @include('layouts.admin.navbar.countryAdmin')
        @elseif(Auth::user()->user_group_id==3)
        @include('layouts.admin.navbar.barAdmin')
        @endif


        <div class="main-container" id="container">
            <div class="overlay"></div>
            <div class="search-overlay"></div>
           
            @if(Auth::user()->user_group_id==1)
            @include('layouts.admin.sidebar.superAdmin')
            @elseif(Auth::user()->user_group_id==2)
            @include('layouts.admin.sidebar.countryAdmin')
            @elseif(Auth::user()->user_group_id==3)
            @include('layouts.admin.sidebar.barAdmin')
            @endif
            
            <div id="content" class="main-content">
        <main>
            {{ $slot }}
        </main>

 
    </div>
        </div>
        {{-- <script src="plugins/table/datatable/datatables.js"></script> --}}
  @livewire('theme-script')
        @livewireScripts
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

        <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top',
           showConfirmButton: false,
            showCloseButton: true,
            timer: 5000,
            padding: '1em',
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });
        window.addEventListener('alert', ({ detail: { type,message } }) => {
            Toast.fire({
                icon: type,
                title: message
            })
        })


       
    </script> 

  
@stack('js')

     

  
    </body>
   
  
</html>
