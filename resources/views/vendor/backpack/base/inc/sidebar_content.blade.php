{{-- This file is used to store sidebar items, inside the Backpack admin panel --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i>
        {{ trans('backpack::base.dashboard') }}</a></li>

@if (backpack_user()->hasRole('Admin'))
    <li class="nav-item"><a class="nav-link" href="{{ backpack_url('patient') }}"><i class="la la-users nav-icon"></i>
            Patient</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ backpack_url('doctor') }}"><i class="nav-icon las la-stethoscope"></i>
            Doctors</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ backpack_url('nurse') }}"><i class="nav-icon las la-user-nurse"></i>
            Nurses</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ backpack_url('role') }}"><i class="nav-icon la la-user-tag"></i>
            Roles</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ backpack_url('dept') }}"><i class="nav-icon la la-hospital"></i>
            Departments</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ backpack_url('doctor-time') }}"><i class="nav-icon la la-clock"></i> Doctor times</a></li>
@endif

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('appointment') }}"><i class="nav-icon la la-calendar"></i> Appointments</a></li>
            
@if (backpack_user()->hasRole('Nurse'))
    <li class="nav-item"><a class="nav-link" href="{{ backpack_url('queue') }}"><i class="nav-icon la la-question"></i> Queues</a></li>
@endif
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('report') }}"><i class="nav-icon la la-file"></i>
        Reports</a></li>
