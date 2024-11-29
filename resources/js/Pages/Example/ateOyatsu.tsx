import {useForm} from "@inertiajs/react";

type Oyatsu = {
  id: number;
  name: string;
  calory: number;
};

type AteOyatsu = {
  id: number;
  oyatsu_id: number;
  ate_at: string;
  oyatsu: Oyatsu;
};

type Props = {
  oyatsus: Oyatsu[];
  ateOyatsus: AteOyatsu[];
}

export default function AteOyatsu({oyatsus, ateOyatsus}: Props) {
  const {data, setData, post, progress, processing} = useForm({
    oyatsu_id: '',
    ate_at: '',
  });

  const totalCalory = ateOyatsus.reduce((acc, ateOyatsu) => acc + ateOyatsu.oyatsu.calory, 0);

  const submitOyatsu = () => {
    if (!processing) {
      post(route('example.ateOyatsu.inertia.update'));
    }
  };

  return (
      <div>
        <h1>おやつを食べる</h1>
        <form>
          <select name="oyatsu_id" onChange={(e) => setData('oyatsu_id', e.target.value)}>
            <option value="">選択してください</option>
            {oyatsus.map((oyatsu, index) => (
                <option value={oyatsu.id} key={`option${index}`}>{oyatsu.name} ({oyatsu.calory}kcal)</option>
            ))}
          </select>
          <input type="date" name="ate_at" onChange={(e) => setData('ate_at', e.target.value)}/>
          <button type="button" onClick={submitOyatsu}>送信</button>
        </form>
        <hr/>
        <h2>食べたおやつ</h2>
        <table>
          <thead>
            <tr>
              <th>名前</th>
              <th>カロリー</th>
              <th>食べた日</th>
            </tr>
          </thead>
          <tbody>
            {ateOyatsus.map((ateOyatsu, index) => (
                <tr key={`oyatsuRaw${index}`}>
                  <td>{ateOyatsu.oyatsu.name}</td>
                  <td>{ateOyatsu.oyatsu.calory}</td>
                  <td>{ateOyatsu.ate_at}</td>
                </tr>
            ))}
          </tbody>
        </table>
        <h2>総カロリー</h2>
        <p>{totalCalory}</p>
      </div>
  )
}
