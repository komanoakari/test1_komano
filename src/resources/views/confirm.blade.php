<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FashionablyLate</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/confirm.css') }}" />
</head>
<body>
    <header class="header">
    <div class="header__inner">
    <p>FashionablyLate</p>
    </div>
    </header>

  <main>
    <div class="confirm__content">
      <div class="confirm__heading">
        <h2>Confirm</h2>
      </div>
      <form class="form" action="/thanks" method="post">
      @csrf
        <div class="confirm-table">
          <table class="confirm-table__inner">
            <tr class="confirm-table__row">
              <th class="confirm-table__header">お名前</th>
              <td class="confirm-table__text">
                <div>{{ $contact['last_name'] }}　 {{ $contact['first_name'] }}</div>
              </td>
            </tr>
            <tr class="confirm-table__row">
              <th class="confirm-table__header">性別</th>
              <td class="confirm-table__text">
              @php
  $genderLabels = [
    1 => '男性',
    2 => '女性',
    3 => 'その他'
  ];
@endphp
<div>{{ $genderLabels[$contact['gender']] ?? '不明' }}</div>
              </td>
            </tr>
            <tr class="confirm-table__row">
              <th class="confirm-table__header">メールアドレス</th>
              <td class="confirm-table__text">
              <div>{{ $contact['email'] }}</div>
              </td>
            </tr>
            <tr class="confirm-table__row">
              <th class="confirm-table__header">電話番号</th>

              <td class="confirm-table__text">
              <div>{{ $contact['tel'] }}</div>
              </td>
            </tr>
            <tr class="confirm-table__row">
              <th class="confirm-table__header">住所</th>
            
              <td class="confirm-table__text">
              <div>{{ $contact['address'] }}</div>
              </td>
            </tr>
            <tr class="confirm-table__row">
              <th class="confirm-table__header">建物名</th>
              
              <td class="confirm-table__text">
              <div>{{ $contact['building'] ?? '' }}</div>
              </td>
            </tr>
            <tr class="confirm-table__row">
              <th class="confirm-table__header">お問い合わせの種類</th>
              <td class="confirm-table__text">
              @php
                $categoryLabel = [
                    '1' => '商品のお届けについて',
                    '2' => '商品の交換について',
                    '3' => '商品トラブル',
                    '4' => 'ショップへのお問い合わせ',
                    '5' => 'その他',
                    ];
                @endphp
                <div>{{ $categoryLabel[$contact['category_id']] }}</div>
              </td>
            </tr>
            <tr class="confirm-table__row">
              <th class="confirm-table__header">お問い合わせ内容</th>
              <td class="confirm-table__text">
              <div>{{ $contact['detail'] }}</div>
              </td>
            </tr>
          </table>
        </div>
        <div class="form__button">
          <button class="form__button-submit" type="submit" name="action" value="submit">送信</button>
          <button type="submit" class="form__button-correct" name="action" value="back">修正</button>
        </div>
        <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}" />
        <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}" />
        <input type="hidden" name="gender" value="{{ $contact['gender'] }}" />
        <input type="hidden" name="email" value="{{ $contact['email'] }}" />
        <input type="hidden" name="tel" value="{{ $contact['tel'] }}" />
        <input type="hidden" name="address" value="{{ $contact['address'] }}" />
        <input type="hidden" name="building" value="{{ $contact['building'] ?? '' }}" />
        <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}" />
        <input type="hidden" name="detail" value="{{ $contact['detail'] }}">
      </form>
    </div>
  </main>
</body>
</html>