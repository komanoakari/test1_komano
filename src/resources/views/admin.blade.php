<header class="header">
    <div class="header__inner">
    <p>FashionablyLate</p>
        <nav>
          <ul class="header-nav">
            @if (Auth::check())
            <li class="header-nav__item">
              <form action="/logout" method="post">
                @csrf
                <button class="header-nav__button">logout</button>
              </form>
            </li>
            @endif
          </ul>
        </nav>
      </div>
  </header>