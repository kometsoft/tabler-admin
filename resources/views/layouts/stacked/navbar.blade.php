<div class="navbar-expand-md">
    <div class="collapse navbar-collapse" id="navbar-menu">
        <div class="navbar navbar-light">
            <div class="container-xl">
                <ul class="navbar-nav">
                    <li @class(['active'=> (strpos(Route::currentRouteName(), 'home') === 0), 'nav-item'])>
                        <a class="nav-link" href="{{ route('home') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <i class="ti ti-home icon"></i>
                            </span>
                            <span class="nav-link-title">
                                @lang('Dashboard')
                            </span>
                        </a>
                    </li>
                    <li @class(['active'=> (strpos(Route::currentRouteName(), 'tabler.admin') === 0), 'nav-item dropdown'])>
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <i class="ti ti-adjustments icon"></i>
                            </span>
                            <span class="nav-link-title">
                                @lang('Administration')
                            </span>
                        </a>
                        <div class="dropdown-menu">
                            <div class="dropdown-menu-columns">
                                <div class="dropdown-menu-column">
                                    <a class="dropdown-item" href="{{ route('tabler.admin.user.index') }}">
                                        <div class="nav-link-icon d-md-none d-lg-inline-block">
                                            <i class="ti ti-users icon"></i>
                                        </div>
                                        @lang('Users')
                                    </a>
                                    <a class="dropdown-item" href="{{ route('tabler.admin.role.index') }}">
                                        <div class="nav-link-icon d-md-none d-lg-inline-block">
                                            <i class="ti ti-lock icon"></i>
                                        </div>
                                        @lang('Access Control')
                                    </a>
                                </div>
                                <div class="dropdown-menu-column">
                                    <a class="dropdown-item" href="{{ route('tabler.admin.activity.index') }}">
                                        <div class="nav-link-icon d-md-none d-lg-inline-block">
                                            <i class="ti ti-plug-connected icon"></i>
                                        </div>
                                        @lang('API Manager')
                                    </a>
                                    <a class="dropdown-item" href="{{ route('tabler.admin.activity.index') }}">
                                        <div class="nav-link-icon d-md-none d-lg-inline-block">
                                            <i class="ti ti-sock icon"></i>
                                        </div>
                                        @lang('Activity Logs')
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
                {{-- <div class="my-2 my-md-0 flex-grow-1 flex-md-grow-0 order-first order-md-last">
                    <form action="." method="get">
                        <div class="input-icon">
                            <span class="input-icon-addon">
                                <i class="ti ti-search icon"></i>
                            </span>
                            <input type="text" value="" class="form-control" placeholder="Search…"
                                aria-label="Search in website">
                        </div>
                    </form>
                </div> --}}
            </div>
        </div>
    </div>
</div>