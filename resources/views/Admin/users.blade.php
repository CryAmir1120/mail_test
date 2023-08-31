@extends('Layout/AdminLayout/layout')
@section('content')
    <div class="user_list">
        <h1>User Management</h1>
        <table>
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Email</th>
                    <th>Send</th>
                    <th>delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user_list as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <form action="{{ route('admin.user.sendemail') }}" method="post">
                            @csrf
                            <input type="hidden" name="email" value="{{ $user->email }}">
                            <button>Send Mail</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('admin.user.delete') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $user->client_id }}">
                            <button>Remove by userId</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('admin.user.create') }}" class="new_user_link">
            Add User
        </a>
    </div>
@stop
<style>
    .user_list {
        max-width: 600px;
        margin: auto;
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th,td {
        text-align: center;
        padding: 10px;
        border: 1px solid #304050
    }
    .new_user_link {
        margin-top: 20px;
        text-align: right;
        float: right;
    }
</style>
