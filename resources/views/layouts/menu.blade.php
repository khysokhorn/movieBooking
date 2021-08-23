<li class="nav-item">
    <a href="{{ route('movieApps.index') }}" class="nav-link {{ Request::is('movieApps*') ? 'active' : '' }}">
        <p>Movie Apps</p>
    </a>
</li>



<li class="nav-item">
    <a href="{{ route('cities.index') }}" class="nav-link {{ Request::is('cities*') ? 'active' : '' }}">
        <p>Cities</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('cinemas.index') }}" class="nav-link {{ Request::is('cinemas*') ? 'active' : '' }}">
        <p>Cinemas</p>
    </a>
</li><li class="nav-item">
    <a href="{{ route('cinemaHalls.index') }}"
       class="nav-link {{ Request::is('cinemaHalls*') ? 'active' : '' }}">
        <p>Cinema Halls</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('cinemaSeats.index') }}"
       class="nav-link {{ Request::is('cinemaSeats*') ? 'active' : '' }}">
        <p>Cinema  Seats</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('shows.index') }}"
       class="nav-link {{ Request::is('shows*') ? 'active' : '' }}">
        <p>Shows</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('bookings.index') }}"
       class="nav-link {{ Request::is('bookings*') ? 'active' : '' }}">
        <p>Bookings</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('payments.index') }}"
       class="nav-link {{ Request::is('payments*') ? 'active' : '' }}">
        <p>Payments</p>
    </a>
</li>


