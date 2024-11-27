@routes

<head>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body>
<div x-data="Oyatsu()">
    <h1>おやつを食べる</h1>
    <form>
        @csrf
        <select name="oyatsu_id" x-model="selectedOyatsu">
            @foreach($oyatsus as $oyatsu)
                <option value="{{ $oyatsu->id }}">{{ $oyatsu->name }}({{ $oyatsu->calory }}kcal)</option>
            @endforeach
        </select>
        <input type="date" name="ate_at" x-model="ateAt">
        <button type="button" @click="submitOyatsu">送信</button>
    </form>
    <hr>
    <h2>食べたおやつ</h2>
    <table>
        <tr>
            <th>名前</th>
            <th>カロリー</th>
            <th>食べた日</th>
        </tr>
        <template x-for="ateOyatsu in ateOyatsus">
            <tr>
                <td x-text="ateOyatsu.oyatsu.name"></td>
                <td x-text="ateOyatsu.oyatsu.calory"></td>
                <td x-text="ateOyatsu.ate_at"></td>
            </tr>
        </template>
    </table>
    <h2>総カロリー</h2>
    <p x-text="totalCalory"></p>
</div>
<script defer>
    function Oyatsu() {
        return {
            oyatsu: @json($oyatsus),
            ateOyatsus: @json($ateOyatsus),
            selectedOyatsu: null,
            ateAt: null,
            totalCalory() {
                return this.ateOyatsus.reduce((acc, ateOyatsu) => acc + ateOyatsu.oyatsu.calory, 0);
            },
            submitOyatsu() {
                axios.post(route('example.ateOyatsu.bladeAjax.update'), {
                    oyatsu_id: this.selectedOyatsu,
                    ate_at: this.ateAt
                }).then(response => {
                    if (response.data.status === 'success') {
                        this.ateOyatsus.push(response.data.ateOyatsu);
                    }
                });
            }
        }
    }
</script>
</body>
