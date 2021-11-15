<header class="default-header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container px-3">
          <a class="navbar-brand" href="{{ route('site.post') }}">
            <h3>Chew's</h3>
          </a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="lnr lnr-menu"></span>
              </button>

              <div class="collapse navbar-collapse justify-content-end align-items-center" id="navbarSupportedContent">
                <ul class="navbar-nav scrollable-menu">
                    <li><a href="{{ route('site.post') }}">Home</a></li>
                    
                      <div class="dropdown">
                        <li><a href="#">My Page</a></li>                       
                        <ul class="dropdown-menu">
                          <li><a href="{{ route('site.user_liked') }}">Like</a></li>
                          <li><a href="{{ route('site.user_posted') }}">Post</a></li>
                          <li><a href="{{ route('site.user_profile') }}">Profile</a></li>
                        </ul>
                      </div>
                    
                    <li><a href="{{ route('site.logout') }}">Log Out</a></li>
                  
                        <!-- Dropdown -->
                    
                    
                </ul>
              </div>
        </div>
    </nav>
</header>
