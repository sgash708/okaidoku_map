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
            {{-- REF: https://qiita.com/yukibe/items/8bddeba1150437389eb0 --}}
            <input type="text" name="handle_name" value="{{ old('handle_name') }}" required>
            @if ($errors->has('handle_name'))
                {{ $errors->first('handle_name') }}
            @endif
        </div>
        <div>
            <label for="email">メールアドレス: </label>
            <input type="email" name="email" value="{{ old('email') }}" required>
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
            <input type="last_name" name="last_name" value="{{ old('last_name') }}" required>
            @if ($errors->has('last_name'))
                {{ $errors->first('last_name') }}
            @endif
        </div>
        <div>
            <label for="last_name_kana">苗字カナ: </label>
            <input type="last_name_kana" name="last_name_kana" value="{{ old('last_name_kana') }}" required>
            @if ($errors->has('last_name_kana'))
                {{ $errors->first('last_name_kana') }}
            @endif
        </div>
        <div>
            <label for="first_name">名前: </label>
            <input type="first_name" name="first_name" value="{{ old('first_name') }}" required>
            @if ($errors->has('first_name'))
                {{ $errors->first('first_name') }}
            @endif
        </div>
        <div>
            <label for="first_name_kana">名前カナ: </label>
            <input type="first_name_kana" name="first_name_kana" value="{{ old('first_name_kana') }}" required>
            @if ($errors->has('first_name_kana'))
                {{ $errors->first('first_name_kana') }}
            @endif
        </div>
        <div>
            <label for="phone_number">電話番号: </label>
            <input type="phone_number" name="phone_number" value="{{ old('phone_number') }}" required>

            @if ($errors->has('phone_number'))
                {{ $errors->first('phone_number') }}
            @endif
        </div>
        <div>
            <label class="sexChoice1">
                <input type="radio" name="sex" value="0" checked>男性
            </label>
            <label class="sexChoice2">
                <input type="radio" name="sex" value="1">女性
            </label>
            <label class="sexChoice3">
                <input type="radio" name="sex" value="2">その他
            </label>

            @if ($errors->has('sex'))
                {{ $errors->first('sex') }}
            @endif
        </div>

        <button type="submit">登録</button>
    </form>
</body>

</html>
