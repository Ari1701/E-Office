<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary" style="height: 100vh; overflow-y: auto;">
      <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="sidebarMenuLabel">E-Office</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto" style="height: 100%;">
            <ul class="nav flex-column" style="height: 100%; overflow-y: auto;">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 active mt-4 mb-2" aria-current="page" href="/director">
                    <i class="bi bi-house-fill"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item {{ Request::is('/director/suratsekertaris') ? 'active' : '' }}">
                    <a class="nav-link mb-3" href="/suratmasuk">
                    <i class="bi bi-envelope-arrow-down-fill"></i>
                        Info Surat Masuk
                    </a>
                </li>
                <li class="nav-item {{ Request::is('/director/notadinas') ? 'active' : '' }}">
                    <a class="nav-link mb-3" href="/notadinasdirekturumum">
                    <i class="bi bi-envelope-arrow-down-fill"></i>
                        Info Surat NotaDinas
                    </a>
                </li>
            </ul>
        </div>

      </div>
    </div>