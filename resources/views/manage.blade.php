@extends('layouts.managelo')
<body>
  <div class="search-contents" >
    <form action="{{ route('search') }}" method="post">
      @csrf
      <table>
        <tr>
          <th>
            <p>お名前</p>
          </th>
          <td>
            <input type="text" name="fullname" value="{{ request('$fullname') }}">
          </td>
          <th>
            <p>登録日</p>
          </th>
          <td>
            <input type="date" name="from" placeholder="from_date" value="{{ request('$from_date') }}">
              <span class="mx-3 text-grey">~</span>
            <input type="date" name="until" placeholder="until_date" value="{{ request('$until_date') }}">
          </td>
          <th>
            <p>メールアドレス</p>
          </th>
          <td>
            <input type="text" name="email" value="{{ request('$email') }}">
          </td>
          <th>
            <p>性別</p>
          </th>
          <td>
                <input id="all" name="gender_id" type="radio" value="" checked><label for="all">全て</label>
                <input id="men" name="gender_id" type="radio" value="男性"><label for="men">男性</label>
                <input id="women" name="gender_id" type="radio" value="女性"><label for="women">女性</label>
          </td>
        </tr>
      </table>
      <input type="submit" value="検索">
    </form>
  </div>


  <div class="">
    {{ $contacts->links() }}
  </div>
    <table>
    <tr>
      <th>id</th>
      <th>お名前</th>
      <th>性別</th>
      <th>メールアドレス</th>
      <th>ご意見</th>
    </tr>
    @foreach ($contacts as $contact)
    <tr>
      <td class="px-4 py-3">
        {{$contact->id}}
      </td>
      <td class="px-4 py-3">
        {{$contact->fullname}}
      </td>
      <td class="px-4 py-3">
        {{ $contact->gender }}
      </td>
      <td class="px-4 py-3">
        {{$contact->email}}
      </td>
      <td class="px-4 py-3">
        {{Str::limit($contact->opinion,25,'...')}}
      </td>
      <td>
        <form action="{{ route('delete', ['id' => $contact->id]) }}" method="post">
          @csrf
            <input type="submit" class="task-delete__btn" value="削除">
        </form>
      </td>
    </tr>
    @endforeach
  </table>
  <div>
    <a href="/">ホームへ</a>
  </div>
</body>
</html>