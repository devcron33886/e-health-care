<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">{{ trans('panel.site_title') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is("/patient") || request()->is("/patient") ? "active" : "" }}" href="{{ route("patient.home.index") }}">
                        <i class="fas fa-fw fa-tachometer-alt nav-icon">
                        </i>
                        <p>
                            {{ trans('global.dashboard') }}
                        </p>
                    </a>
                </li>

                    <li class="nav-item">
                        <a href="{{ route("patient.appointments.index") }}" class="nav-link {{ request()->is("patient/appointments") || request()->is("patient/appointments/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon far fa-file-alt">

                            </i>
                            <p>
                                {{ trans('cruds.appointment.title') }}
                            </p>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="{{ route("patient.prescriptions.index") }}" class="nav-link {{ request()->is("patient/prescriptions") || request()->is("patient/prescriptions/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.prescription.title') }}
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route("patient.payments.index") }}" class="nav-link {{ request()->is("patient/payments") || request()->is("patient/payments/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-money-bill-alt">

                            </i>
                            <p>
                                {{ trans('cruds.payment.title') }}
                            </p>
                        </a>
                    </li>

                @php($unread = \App\Models\QaTopic::unreadCount())
                <li class="nav-item">
                    <a href="{{ route("patient.messenger.index") }}" class="{{ request()->is("/messenger") || request()->is("/messenger/*") ? "active" : "" }} nav-link">
                        <i class="fa-fw fa fa-envelope nav-icon">

                        </i>
                        <p>{{ trans('global.messages') }}</p>
                        @if($unread > 0)
                            <strong>( {{ $unread }} )</strong>
                        @endif

                    </a>
                </li>
                @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                    @can('profile_password_edit')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}" href="{{ route('profile.password.edit') }}">
                                <i class="fa-fw fas fa-key nav-icon">
                                </i>
                                <p>
                                    {{ trans('global.change_password') }}
                                </p>
                            </a>
                        </li>
                    @endcan
                @endif
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <p>
                            <i class="fas fa-fw fa-sign-out-alt nav-icon">

                            </i>
                        <p>{{ trans('global.logout') }}</p>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
