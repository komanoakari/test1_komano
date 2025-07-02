<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>FashionablyLate</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
</head>

<body>
  <header class="header">
    <div class="header__inner">
    <p>FashionablyLate</p>
            @if (Auth::check())
            <nav class="header-nav">
            <a href="/login" class="header-nav__button">login</a>
            </nav>
            @endif
      </div>
  </header>

  <main>
    <div class="search-form__content">
      <div class="search-form__heading">
        <h2>Admin</h2>
      </div>
      <form class="search-form" action="/admin/search" method="get">
        @csrf
        <div class="search-form__item">
          <input type="text" class="search-form__item-input" name="keyword" value="{{ old('keyword') }}" placeholder="名前やメールアドレスを入力してください">
          <select name="gender" id="" class="search-form__item-select narrow">
            <option value="" selected disabled hidden>性別</option>
            <option value="1">男性</option>
            <option value="2">女性</option>
            <option value="3">その他</option>
          </select>
          <select name="category_id" id="" class="search-form__item-select">
            <option value="">お問い合わせの種類</option>
            @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->content }}</option>
            @endforeach
          </select>
          <input type="date" name="created_date" value="{{ old('date') }}" class="search-form__item-date narrow">
          <div class="search-form__button">
            <button class="search-form__button-submit" type="submit">検索</button>
          </div>
          <div class="search-form__button">
            <button class="search-form__button-reset" type="reset">リセット</button>
          </div>
        </div>
        </form>
        <div class="search-form__button">
            <button class="search-form__button-reset" type="export">エクスポート</button>
          </div>
        <div class="search-table__link" >
          {{ $contacts->links() }}
        </div>

        <table class="search-table">
        <tr class="search-table__row">
          <th class="search-table__header">お名前</th>
          <th class="search-table__header narrow">性別</th>
          <th class="search-table__header">メールアドレス</th>
          <th class="search-table__header">お問い合わせの種類</th>
          <th class="search-table__header"></th>
        </tr>
        @php
        $genderLabels = [
        1 => '男性',
        2 => '女性',
        3 => 'その他'
        ];
        @endphp
        @foreach ($contacts as $contact)
        <tr class="search-table__row">
        <td class="search-table__item">{{$contact->last_name}}　{{$contact->first_name}}</td>
        <td class="search-table__item">{{ $genderLabels[$contact->gender] ?? '不明' }}</td>
        <td class="search-table__item">{{$contact->email}}</td>
        <td class="search-table__item">{{ $contact->category->content ?? '不明' }}</td>
        <td class="search-table__item">
          <button class="search-table__item detail" onclick="openModal({{ $contact->id }})">詳細</button>
        </td>
        </tr>
        @endforeach
        </table>
   
        @php
        $genderLabels = [
        1 => '男性',
        2 => '女性',
        3 => 'その他'
        ];
        @endphp
        @foreach ($contacts as $contact)
        <div id="modal-{{ $contact->id }}" class="modal" style="display:none;">
  <div class="modal-content">
    <span onclick="closeModal({{ $contact->id }})" class="close-btn">&times;</span>

    <div class="modal-row">
      <div class="modal-label">お名前</div>
      <div class="modal-value">{{ $contact->last_name }}　{{ $contact->first_name }}</div>
    </div>

    <div class="modal-row">
      <div class="modal-label">性別</div>
      <div class="modal-value">{{ $genderLabels[$contact->gender] ?? '不明' }}</div>
    </div>

    <div class="modal-row">
      <div class="modal-label">メールアドレス</div>
      <div class="modal-value">{{ $contact->email }}</div>
    </div>

    <div class="modal-row">
      <div class="modal-label">電話番号</div>
      <div class="modal-value">{{ $contact->tel }}</div>
    </div>

    <div class="modal-row">
      <div class="modal-label">住所</div>
      <div class="modal-value">{{ $contact->address }}</div>
    </div>

    <div class="modal-row">
      <div class="modal-label">建物名</div>
      <div class="modal-value">{{ $contact->building }}</div>
    </div>

    <div class="modal-row">
      <div class="modal-label">お問い合わせの種類</div>
      <div class="modal-value">{{ $contact->category->content ?? '不明' }}</div>
    </div>

    <div class="modal-row">
      <div class="modal-label">お問い合わせ内容</div>
      <div class="modal-value">{{ $contact->detail }}</div>
    </div>

    <form action="{{ route('contact.destroy', $contact->id) }}" method="post">
      @csrf
      @method('DELETE')
      <button type="submit" class="delete-btn">削除</button>
    </form>
  </div>
</div>

        @endforeach
  </div>
    </div> 
  </main>
</body>

</html>

<script>
  function openModal(id) {
    const modal = document.getElementById('modal-' + id);
    if (modal) {
      modal.style.display = 'block';
    }
  }

  function closeModal(id) {
    const modal = document.getElementById('modal-' + id);
    if (modal) {
      modal.style.display = 'none';
    }
  }
</script>