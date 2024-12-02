@php

    $footer_info = \App\Models\FooterInfo::first();
    $footer_icons = \App\Models\FooterSocialLink::all();
    $footer_useful_links = \App\Models\FooterUsefulLink::all();
    $footer_contact = \App\Models\FooterContactInfo::first();
    $footer_help_links = \App\Models\FooterHelpLink::all();

@endphp

    <!-- Footer-Area-Start -->
<footer class="footer-area">
    <div class="container">
        <div class="row footer-widgets">
            <div class="col-md-12 col-lg-3 widget">
                <div class="text-box">
                    <figure class="footer-logo">
                        <img src="{{ asset($general_setting->footer_logo) }}" alt="">
                    </figure>
                    <p>{{ $footer_info->info }}</p>
                    <ul class="d-flex flex-wrap">
                        @foreach($footer_icons as $icon)
                            <li><a href="{{ $icon->url }}" target="_blank"><i class="{{ $icon->icon }}"></i></a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-4 col-lg-2 offset-lg-1 widget">
                <h3 class="widget-title">Useful Link</h3>
                <ul class="nav-menu">
                    @foreach($footer_useful_links as $useful_link)
                        <li><a href="{{ $useful_link->url }}">{{ $useful_link->name }}</a></li>
                    @endforeach

                </ul>
            </div>
            <div class="col-md-4 col-lg-3 widget">
                <h3 class="widget-title">Contact Info</h3>
                <ul>
                    <li>{{ $footer_contact->address }}</li>
                    <li><a href="#">{{ $footer_contact->phone }}</a></li>
                    <li><a href="#">{{ $footer_contact->email }}</a></li>
                </ul>
            </div>
            <div class="col-md-4 col-lg-3 widget">
                <h3 class="widget-title">Help</h3>
                <ul class="nav-menu">
                    @foreach($footer_help_links as $help_link)
                        <li><a href="{{ $help_link->url }}">{{ $help_link->name }}</a></li>
                    @endforeach

                </ul>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="copyright">
                        <p>{{ $footer_info->copyright }}</p>
                        <p>{{ $footer_info->powered_by }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer-Area-End -->
