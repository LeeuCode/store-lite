@include('admin.components.header')

<div class="main-content">
    <div class="{{ ('1' == '0') ? 'main-content-inner' : 'main-container ace-save-state' }}">
        @include('admin.components.top-menu1')
        @if(1 == 0)
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="{{ url('index/') }}">الرئيسية</a>
                </li>
                @yield('breadcrumb')
            </ul><!-- /.breadcrumb -->
        </div>
        @endif
        
        <div class="page-content">
            @yield('container')
        </div>
    </div>
</div>

@include('admin.components.footer')