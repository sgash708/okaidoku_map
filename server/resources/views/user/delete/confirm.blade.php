confirm：削除確認
<form action="{{ route('user.delete.complete') }}" method="post">
    @csrf
    <label>ユーザID</label>
    <div>{{ $user['id'] }}</div>
    <input type="hidden" name="id" value={{ $user['id'] }}>

    <input name='back' type='submit' value='戻る'>
    <input type='submit' value='送信'>
</form>