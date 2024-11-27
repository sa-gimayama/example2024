<head>

</head>
<body>
<h1>おやつを食べる</h1>
<form action="{{route('example.ateOyatsu.blade.update')}}" method="post">
    @csrf
    <select name="oyatsu_id">
        @foreach($oyatsus as $oyatsu)
            <option value="{{ $oyatsu->id }}">{{ $oyatsu->name }}({{ $oyatsu->calory }}kcal)</option>
        @endforeach
    </select>
    <input type="date" name="ate_at">
    <button type="submit">送信</button>
</form>
<hr>
<h2>食べたおやつ</h2>
<table>
    <tr>
        <th>名前</th>
        <th>カロリー</th>
        <th>食べた日</th>
    </tr>
    @foreach($ateOyatsus as $ateOyatsu)
        <tr>
            <td>{{ $ateOyatsu->oyatsu->name }}</td>
            <td>{{ $ateOyatsu->oyatsu->calory }}</td>
            <td>{{ $ateOyatsu->ate_at }}</td>
        </tr>
    @endforeach
</table>
<h2>総カロリー</h2>
<p>{{ $totalCalory }}</p>
</body>
