<nav class="sidebar">
    <div class="sidebar-inner">
        <!-- ### $Sidebar Header ### -->
        <div class="sidebar-logo">
            <div class="peers ai-c fxw-nw">
                <div class="peer peer-greed">
                    <a class="sidebar-link td-n" href="index.html">
                        <div class="peers ai-c fxw-nw">
                            <div class="peer">
                                <div class="logo">
                                    <img src="assets/static/images/logo.png" alt="">
                                </div>
                            </div>
                            <div class="peer peer-greed">
                                <h5 class="lh-1 mB-0 logo-text">ABIS</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="peer">
                    <div class="mobile-toggle sidebar-toggle">
                        <a href="" class="td-n">
                            <i class="ti-arrow-circle-left"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- ### $Sidebar Menu ### -->
        <ul class="sidebar-menu scrollable pos-r">
            <li class="nav-item">
                <a class='sidebar-link' href="{{ route('dataset.index') }}">
                <span class="icon-holder">
                  <i class="c-brown-500 ti-server"></i>
                </span>
                    <span class="title">Dataset</span>
                </a>
            </li>
            <li class="nav-item">
                <a class='sidebar-link' href="{{ route('species.index') }}">
                <span class="icon-holder">
                  <i class="c-blue-500 ti-list"></i>
                </span>
                    <span class="title">Species</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
