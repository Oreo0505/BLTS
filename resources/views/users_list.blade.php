@extends('layout', [$title = 'Dashboard'])

@section('content')
{{-- Category Drawer --}}
     <x-drawer_admin :municipality="$municipality"/>
     
     {{-- Navigation Bar --}}
    <x-navbar_admin :municipality="$municipality"/>

   

