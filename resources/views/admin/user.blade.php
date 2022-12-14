@extends('layout')

@section('title', 'User')

@section('content')
    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Subscription</th>
            <th>Last Login</th>
            <th>Last IP</th>
        </tr>
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->phone }}</td>
            <td>{{ $user->subscription }}</td>
            <td>{{ $user->last_login }}</td>
            <td>{{ $user->last_ip }}</td>
        </tr>
    </table>
    <form action="{{ route('subscription.cancel') }}" method="POST">
        @csrf
        <button type="submit">Cancel Subscription</button>
    </form>
@endsection