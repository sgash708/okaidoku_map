<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>okaidokumap</title>
</head>

<body>
    <form action="{{ route('user.store') }}" method="post">
        @csrf
        <div>
            <label for="handle_name">ユーザ名: </label>
            <input type="text" name="handle_name" required>
            @if ($errors->has('handle_name'))
                {{ $errors->first('handle_name') }}
            @endif
        </div>
        <div>
            <label for="email">メールアドレス: </label>
            <input type="email" name="email" required>
            @if ($errors->has('email'))
                {{ $errors->first('email') }}
            @endif
        </div>
        <div>
            <label for="password">パスワード: </label>
            <input type="password" name="password" required>

            @if ($errors->has('password'))
                {{ $errors->first('password') }}
            @endif
        </div>
        <div>
            <label for="last_name">苗字: </label>
            <input type="last_name" name="last_name" required>
            @if ($errors->has('last_name'))
                {{ $errors->first('last_name') }}
            @endif
        </div>
        <div>
            <label for="last_name_kana">苗字カナ: </label>
            <input type="last_name_kana" name="last_name_kana" required>
            @if ($errors->has('last_name_kana'))
                {{ $errors->first('last_name_kana') }}
            @endif
        </div>
        <div>
            <label for="first_name">名前: </label>
            <input type="first_name" name="first_name" required>
            @if ($errors->has('first_name'))
                {{ $errors->first('first_name') }}
            @endif
        </div>
        <div>
            <label for="first_name_kana">名前カナ: </label>
            <input type="first_name_kana" name="first_name_kana" required>
            @if ($errors->has('first_name_kana'))
                {{ $errors->first('first_name_kana') }}
            @endif
        </div>
        <div>
            <label for="phone_number">電話番号: </label>
            <input type="phone_number" name="phone_number" required>

            @if ($errors->has('phone_number'))
                {{ $errors->first('phone_number') }}
            @endif
        </div>
        <div>
            <input type="radio" id="sexChoice1" name="contact" value=0>
            <label for="sexChoice1">男性</label>

            <input type="radio" id="sexChoice2" name="contact" value=1>
            <label for="sexChoice2">女性</label>

            <input type="radio" id="sexChoice3" name="contact" value=2>
            <label for="sexChoice3">その他</label>

            @if ($errors->has('sex'))
                {{ $errors->first('sex') }}
            @endif
        </div>

        <div>
            <input type="submit" value="登録">
        </div>
    </form>
</body>

</html>
