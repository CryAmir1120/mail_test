@extends('Layout.AdminLayout.layout')
@section('content')
<div class="add_users">
    <h2>New Customer</h2>
    <form action="{{ route('admin.user.store') }}" method="post" class="add_user_form">
        @csrf
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Pwd</th>
                    <th>PwdConfirm</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <input type="text" name="name">           
                    </td>
                    <td>
                        <input type="email" name="email">           
                    </td>
                    <td>
                        <input type="password" name="password">           
                    </td>
                    <td>
                        <input type="password" name="password_confirm">           
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="btn-group">
            <button type="submit">Save</button>
        </div>
        <a href="{{ route('admin.user.manage') }}">User List</a>
    </form>
</div>
@stop
<style>
    .add_user_form {
        width: 100%;
        max-width: 800px;
        margin: auto;
    }
    table th {
        text-align: left;
        color: red;
    }
    .add_user_form input {
        padding: 10px;
        border-radius: 5px;
    }
    .btn-group {
        padding: 10px;
    }
</style>