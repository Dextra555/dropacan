<div class="sidebar" data-color="black" data-active-color="danger">
    <div class="logo">
        <a href="" class="simple-text logo-mini">
            <div class="logo-image-small">
                <img src="{{ asset('paper') }}/img/logo.png">
            </div>
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="{{ $elementActive == 'dashboard' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'dashboard') }}">
                    <i class="nc-icon nc-bank"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            

            <li class="{{ $elementActive == 'orders' ? 'active' : '' }}">
                <a href="{{ route('Orders') }}">
                <i class="nc-icon nc-app"></i>
                    <p>{{ __('Orders') }}</p>
                </a>
            </li>

            <li class="{{ $elementActive == 'locations' ? 'active' : '' }}">
                <a href="{{ route('location') }}">
                <i class="nc-icon nc-pin-3"></i>
                    <p>{{ __('Location') }}</p>
                </a>
            </li>

            <li class="{{ $elementActive == 'apartment' ? 'active' : '' }}">
                <a href="{{ route('apartment') }}">
                <i class="nc-icon nc-tile-56"></i>
                    <p>{{ __('Appartments') }}</p>
                </a>
            </li>


            <li class="{{ $elementActive == 'products-manage' ? 'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="false" href="#productsMenu">
                <i class="nc-icon nc-badge"></i>
                    <p>
                            {{ __('Products') }}
                             <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="productsMenu">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'products-list' ? 'active' : '' }}">
                            <a href="{{ route('index') }}">
                                <span class="sidebar-mini-icon">{{ __('PL') }}</span>
                                <span class="sidebar-normal">{{ __('Products List') }}</span>
                            </a>
                        </li>
                        
                        
                    </ul>
                </div>
            </li>

            <li class="{{ $elementActive == 'vendors-manage' ? 'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="false" href="#vendorsMenu">
                <i class="nc-icon nc-badge"></i>
                    <p>
                            {{ __('Vendors') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="vendorsMenu">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'vendors-add' ? 'active' : '' }}">
                            <a href="">
                                <span class="sidebar-mini-icon">{{ __('AV') }}</span>
                                <span class="sidebar-normal">{{ __('Add Vendor') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'vendors-list' ? 'active' : '' }}">
                            <a href="">
                                <span class="sidebar-mini-icon">{{ __('LV') }}</span>
                                <span class="sidebar-normal">{{ __('List Vendors') }}</span>
                            </a>
                        </li>
                        
                    </ul>
                </div>
            </li>
            <li class="{{ $elementActive == 'cus-manage' ? 'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="false" href="#cusMenu">
                <i class="nc-icon nc-single-02"></i>
                    <p>
                            {{ __('Customers') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="cusMenu">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'cus-add' ? 'active' : '' }}">
                            <a href="">
                                <span class="sidebar-mini-icon">{{ __('AC') }}</span>
                                <span class="sidebar-normal">{{ __('Add Customer') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'cus-list' ? 'active' : '' }}">
                            <a href="">
                                <span class="sidebar-mini-icon">{{ __('LC') }}</span>
                                <span class="sidebar-normal">{{ __('List Customers') }}</span>
                            </a>
                        </li>
                        
                    </ul>
                </div>
            </li>
            <li class="{{ $elementActive == 'icons' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'icons') }}">
                    <i class="nc-icon nc-diamond"></i>
                    <p>{{ __('Icons') }}</p>
                </a>
            </li>
             <li class="{{ $elementActive == 'user' || $elementActive == 'profile' ? 'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="true" href="#laravelExamples">
                    <i class="nc-icon"><img src="{{ asset('paper/img/laravel.svg') }}"></i>
                    <p>
                            {{ __('Laravel examples') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse show" id="laravelExamples">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'profile' ? 'active' : '' }}">
                            <a href="{{ route('profile.edit') }}">
                                <span class="sidebar-mini-icon">{{ __('UP') }}</span>
                                <span class="sidebar-normal">{{ __(' User Profile ') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'user' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'user') }}">
                                <span class="sidebar-mini-icon">{{ __('U') }}</span>
                                <span class="sidebar-normal">{{ __(' User Management ') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            
            <li class="{{ $elementActive == 'notifications' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'notifications') }}">
                    <i class="nc-icon nc-bell-55"></i>
                    <p>{{ __('Notifications') }}</p>
                </a>
            </li>
            {{--
                <li class="{{ $elementActive == 'map' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'map') }}">
                    <i class="nc-icon nc-pin-3"></i>
                    <p>{{ __('Maps') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'tables' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'tables') }}">
                    <i class="nc-icon nc-tile-56"></i>
                    <p>{{ __('Table List') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'typography' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'typography') }}">
                    <i class="nc-icon nc-caps-small"></i>
                    <p>{{ __('Typography') }}</p>
                </a>
            </li>
            --}}
        </ul>
    </div>
</div>
