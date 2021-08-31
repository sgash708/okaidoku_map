<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>okaidokumap</title>
</head>

<body>
    {{-- JS起動テスト --}}
    <div id="app"></div>
    <script src="js/app.js"></script>

    <h1>ユーザ一覧</h1>
    <a href="{{ route('user.create') }}">ユーザ作成</a>
    <form action="{{ route('user.delete.confirm') }}" method="post">
        @csrf
        <input type='input' name='id'>
        <input type='submit' value='ユーザ退会'>
    </form>
    <table>
        <tr>
            <th>ユーザ名</th>
            <th>メールアドレス</th>
            <th>苗字</th>
            <th>苗字カナ</th>
            <th>名前</th>
            <th>名前カナ</th>
            <th>電話番号</th>
            <th>性別</th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->handle_name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->last_name }}</td>
                <td>{{ $user->last_name_kana }}</td>
                <td>{{ $user->first_name }}</td>
                <td>{{ $user->first_name_kana }}</td>
                <td>{{ $user->phone_number }}</td>
                <td>{{ $user->sex }}</td>
            </tr>
        @endforeach
    </table>
    @if (session('success_message'))
        <div class="success_message">
            {{ session('success_message') }}
        </div>
    @elseif (session('error_message'))
        <div class="error_message">
            {{ session('error_message') }}
        </div>
    @endif
</body>

</html>
