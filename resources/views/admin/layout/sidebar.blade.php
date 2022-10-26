
<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.content') }}</li>


            @if (Auth::user()->rol_app->rol_name['id'] == 2)


            <li class="nav-item"><a class="nav-link" href="{{ url('admin/meetings') }}"><i class="nav-icon icon-list"></i> {{ trans('admin.meeting.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/meetings/inicio') }}"><i class="nav-icon icon-drop"></i> {{ trans('Reporte Audiencias') }}</a></li>


            @elseif (Auth::user()->rol_app->rol_name['id'] == 3)

            <li class="nav-item"><a class="nav-link" href="{{ url('admin/visits') }}"><i class="nav-icon icon-home"></i> {{ trans('admin.visit.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/visits/inicio') }}"><i class="nav-icon icon-pencil"></i> {{ trans('Reporte Visitas') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/meetings') }}"><i class="nav-icon icon-list"></i> {{ trans('admin.meeting.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/meetings/inicio') }}"><i class="nav-icon icon-drop"></i> {{ trans('Reporte Audiencias') }}</a></li>

            @else

            <li class="nav-item"><a class="nav-link" href="{{ url('admin/visits') }}"><i class="nav-icon icon-home"></i> {{ trans('admin.visit.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/visits/inicio') }}"><i class="nav-icon icon-pencil"></i> {{ trans('Reporte Visitas') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/meetings') }}"><i class="nav-icon icon-list"></i> {{ trans('admin.meeting.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/meetings/inicio') }}"><i class="nav-icon icon-drop"></i> {{ trans('Reporte Audiencias') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/roles') }}"><i class="nav-icon icon-star"></i> {{ trans('admin.role.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/role-admin-users') }}"><i class="nav-icon icon-magnet"></i> {{ trans('admin.role-admin-user.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/states') }}"><i class="nav-icon icon-drop"></i> {{ trans('admin.state.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/dependencies') }}"><i class="nav-icon icon-ghost"></i> {{ trans('admin.dependency.title') }}</a></li>






           {{-- Do not delete me :) I'm used for auto-generation menu items --}}

            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.settings') }}</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/admin-users') }}"><i class="nav-icon icon-user"></i> {{ __('Manage access') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/translations') }}"><i class="nav-icon icon-location-pin"></i> {{ __('Translations') }}</a></li>
            {{-- Do not delete me :) I'm also used for auto-generation menu items --}}
            {{--<li class="nav-item"><a class="nav-link" href="{{ url('admin/configuration') }}"><i class="nav-icon icon-settings"></i> {{ __('Configuration') }}</a></li>--}}


            @endif



        </ul>


    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
