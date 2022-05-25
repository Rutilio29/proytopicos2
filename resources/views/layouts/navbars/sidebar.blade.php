<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="https://creative-tim.com/" class="simple-text logo-normal">
      {{ __('Topicos 22A') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Inicio') }}</p>
        </a>
      </li>

      <li class="nav-item{{ $activePage == 'user' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('user') }}">
          <i class="material-icons">content_paste</i>
            <p>{{ __('Usuario') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'Cliente' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('cliente') }}">
          <i class="material-icons">library_books</i>
            <p>{{ __('Clientes') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'Producto' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('producto') }}">
          <i class="material-icons">bubble_chart</i>
          <p>{{ __('Producto') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'Provedores' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('provedores') }}">
          <i class="material-icons">location_ons</i>
            <p>{{ __('Provedores') }}</p>
        </a>
      </li>
    </ul>
  </div>
</div>
