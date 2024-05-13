<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary" style="height: 100vh; overflow-y: auto;">
    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="sidebarMenuLabel">E-Office</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
        </div>
        
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto" style="height: 100%;">
            <ul class="nav flex-column" style="height: 100%; overflow-y: auto;">
                <li class="nav-item {{ Request::is('/pelayanan/infosuratdisposisimanajerpelayanan') ? 'active' : '' }}">
                    <a class="nav-link mb-3 mt-2" href="/infosuratdisposisimanajerpelayanan">
                    <i class="bi bi-envelope-arrow-up-fill"></i>
                         Cek Surat Disposisi
                    </a>
                </li>
                <li class="nav-item {{ Request::is('/manajerit/infosuratnotadinasmanajerpelayanan') ? 'active' : '' }}">
                    <a class="nav-link mb-3" href="/infosuratnotadinasmanajerpelayanan">
                    <i class="bi bi-envelope-arrow-down-fill"></i>
                         Cek Surat Notadinas
                    </a>
                </li>
            </ul>
        </div>

    </div>
</div>