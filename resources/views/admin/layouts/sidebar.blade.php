<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    <div class="form-inline mr-auto"></div>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown"><a href="#" data-toggle="dropdown"
                                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">Hi, Ujang Maman</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title">Logged in 5 min ago</div>
                <a href="{{ route('profile.edit') }}" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Profile
                </a>
                <a href="features-settings.html" class="dropdown-item has-icon">
                    <i class="fas fa-cog"></i> Settings
                </a>
                <div class="dropdown-divider"></div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="#" onclick="event.preventDefault();
                                                this.closest('form').submit();"
                       class="dropdown-item has-icon text-danger">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </form>

            </div>
        </li>
    </ul>
</nav>

<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link"><i
                        class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>

            <li class="menu-header">Section</li>

            <li class="nav-item dropdown {{ set_sidebar_active(['admin.typer-title.*', 'admin.hero.*']) }}">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                <span>Hero</span></a>
            <ul class="dropdown-menu" style="display: none;">
                <li class="{{ set_sidebar_active(['admin.typer-title.*']) }}"><a class="nav-link"
                                                                                 href="{{ route('admin.typer-title.index') }}">Typer
                        Title</a></li>
                <li class="{{ set_sidebar_active(['admin.hero.*']) }}"><a class="nav-link"
                                                                          href="{{ route('admin.hero.index') }}">Hero
                        Section</a></li>

            </ul>
            </li>

            <li class="{{ set_sidebar_active(['admin.service.*']) }}"><a class="nav-link" href="{{ route('admin.service.index') }}"><i class="far fa-square"></i> <span>Services</span></a>
            </li>
            <li class="{{ set_sidebar_active(['admin.about.*']) }}"><a class="nav-link" href="{{ route('admin.about.index') }}"><i class="far fa-square"></i>
                    <span>About</span></a></li>

            <li class="nav-item dropdown {{ set_sidebar_active(['admin.category.*', 'admin.portfolio-item.*', 'admin.portfolio-section-setting.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Portfolio</span></a>
                <ul class="dropdown-menu" style="display: none;">
                    <li class="{{ set_sidebar_active(['admin.category.*']) }}"><a class="nav-link" href="{{ route('admin.category.index') }}">Category</a></li>
                    <li class="{{ set_sidebar_active(['admin.portfolio-item.*']) }}"><a class="nav-link" href="{{ route('admin.portfolio-item.index') }}">Portfolio Item</a></li>
                    <li class="{{ set_sidebar_active(['admin.portfolio-section-setting.*']) }}"><a class="nav-link" href="{{ route('admin.portfolio-section-setting.index') }}">Section
                            Setting</a></li>

                </ul>
            </li>

            <li class="nav-item dropdown {{ set_sidebar_active(['admin.skill-item.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Skill</span></a>
                <ul class="dropdown-menu" style="display: none;">
                    <li class="{{ set_sidebar_active(['admin.skill-item.*']) }}"><a class="nav-link" href="{{ route('admin.skill-item.index') }}">Skill Items</a></li>
                    {{--<li><a class="nav-link" href="{{ route('admin.skill-section-setting.index ') }}">Section Setting</a></li>--}}

                </ul>
            </li>

            <li class="{{ set_sidebar_active(['admin.experience.*']) }}"><a class="nav-link" href="{{ route('admin.experience.index') }}"><i class="far fa-square"></i> <span>Experience</span></a>
            </li>

            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Feedback</span></a>
                <ul class="dropdown-menu" style="display: none;">
                    <li><a class="nav-link" href="{{ route('admin.feedback.index') }}">Feedbacks</a></li>
                    <li><a class="nav-link" href="{{ route('admin.feedback-section-setting.index') }}">Section
                            Setting</a></li>

                </ul>
            </li>

            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Blog</span></a>
                <ul class="dropdown-menu" style="display: none;">
                    <li><a class="nav-link" href="{{ route('admin.blog-category.index') }}">Category</a></li>
                    <li><a class="nav-link" href="{{ route('admin.blog.index') }}">Blog List</a></li>
                    <li><a class="nav-link" href="{{ route('admin.blog-section-setting.index') }}">Section Setting</a>
                    </li>

                </ul>
            </li>

            <li class="nav-item dropdown {{ set_sidebar_active([
                'admin.footer-social.*',
                'admin.footer-info.*',
                'admin.footer-contact-info.*',
                'admin.footer-useful-links.*',
                'admin.footer-help-links.*',
                ]) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Footer</span></a>
                <ul class="dropdown-menu" style="display: none;">
                    <li class="{{ set_sidebar_active(['admin.footer-social.*']) }}"><a class="nav-link"
                                                                                       href="{{ route('admin.footer-social.index') }}">Footer
                            Social Link</a></li>
                    <li class="{{ set_sidebar_active(['admin.footer-info.*']) }}"><a class="nav-link"
                                                                                     href="{{ route('admin.footer-info.index') }}">Footer
                            Information</a></li>
                    <li class="{{ set_sidebar_active(['admin.footer-contact-info.*']) }}"><a class="nav-link"
                                                                                             href="{{ route('admin.footer-contact-info.index') }}">Footer
                            Contact
                            Information</a></li>
                    <li class="{{ set_sidebar_active(['admin.footer-useful-links.*']) }}"><a class="nav-link"
                                                                                             href="{{ route('admin.footer-useful-links.index') }}">Footer
                            Useful
                            Links</a></li>
                    <li class="{{ set_sidebar_active(['admin.footer-help-links.*']) }}"><a class="nav-link"
                                                                                           href="{{ route('admin.footer-help-links.index') }}">Footer
                            Help Links</a>
                    </li>

                </ul>
            </li>

            <li class="menu-header">Settings</li>
            <li class="{{ set_sidebar_active(['admin.settings.*']) }}"><a class="nav-link"
                                                                          href="{{ route('admin.settings.index') }}"><i class="far fa-square"></i> <span>Settings</span></a>
            </li>

            {{-- <li><a class="nav-link" href="blank.html"><i class="far fa-square"></i> <span>Blank Page</span></a></li> --}}

        </ul>
    </aside>
</div>
