@extends('layouts.app')
@section('content')
<div class="container">
    <div class="h1">connections</div>
    <div class="row">
        <div class="col-12">
            @can('update', $user->profile)
            @forelse ($connections as $connection)
            <div>
                @if($connection->id == auth()->user()->id)
                @continue
                @else
                <div class="row">
                    <a href="connect/{{$connection->id}}">{{$connection->name}}</a>
                    {{-- <img src="$connection" alt=""> --}}

                </div>
                @endif
            </div>
            @empty
            <div class="alert alert-success">
                there are no alumni from your college

            </div>
            @endforelse
            @endcan
        </div>
    </div>
</div>
@endsection