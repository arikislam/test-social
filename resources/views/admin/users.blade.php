@extends('layout')

@section('title', 'Users')

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
        @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->phone }}</td>
                <td>{{ $user->subscription }}</td>
                <td>{{ $user->last_login }}</td>
                <td>{{ $user->last_ip }}</td>
            </tr>
        @endforeach
    </table>
@endsection