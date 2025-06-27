<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>FashionablyLate</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
</head>

<body>
  <header class="header">
    <div class="header__inner">
    <p>FashionablyLate</p>
    </div>
  </header>

  <main>
    <div class="contact-form__content">
      <div class="contact-form__heading">
        <h2>Contact</h2>
      </div>
      <form class="form" action="/confirm" method="post">
        @csrf
        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">お名前</span>
            <span style="color: red;">※</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <input type="text" name="last_name" placeholder="例:山田" value="{{ old('last_name') }}"/>
              <div class="form__error">
              @error('last_name')
                {{ $message }} 
            @enderror
              </div>
              <input type="text" name="first_name" placeholder="例:太郎" value="{{ old('first_name') }}"/>
              <div class="form__error">
              @error('first_name')
                {{ $message }} 
            @enderror
              </div>
            </div>
          </div>
        </div>
        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">性別</span>
            <span style="color: red;">※</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <input type="radio" name="gender" value="male" id="gender-male" checked>
              <label for="gender-male">男性</label>
              <input type="radio" name="gender" value="female" id="gender-female">
              <label for="gender-female">女性</label>
              <input type="radio" name="gender" value="other" id="gender-other">
              <label for="gender-other">その他</label>
            </div>
            <div class="form__error">
            @error('gender')
                {{ $message }} 
            @enderror
            </div>
          </div>
        </div>
        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">メールアドレス</span>
            <span style="color: red;">※</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <input type="email" name="email" placeholder="例:test@example.com" />
            </div>
            <div class="form__error">
            @error('email')
            {{ $message }}
            @enderror
            </div>
          </div>
        </div>
        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">電話番号</span>
            <span style="color: red;">※</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <input type="tel" name="tel1" id="tel1" size="4" maxlength="4"> -
              <input type="tel" name="tel2" id="tel2" size="4" maxlength="4"> -
              <input type="tel" name="tel3" id="tel3" size="4" maxlength="4"> 
            </div>
            <div class="form__error">
            @error('tel')
            {{ $message }}
            @enderror
            </div>
          </div>
        </div>
        
        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">住所</span>
            <span style="color: red;">※</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <input type="text" name="address" placeholder="例:東京都渋谷区千駄ヶ谷1-2-3" />
            </div>
            <div class="form__error">
            @error('address')
            {{ $message }}
            @enderror
            </div>
          </div>
        </div>
        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">建物名</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <input type="type" name="building" placeholder="例:千駄ヶ谷マンション101" />
            </div>
          </div>
        </div>
        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">お問い合わせの種類</span>
            <span style="color: red;">※</span>
          </div>
          <div class="form__group-content">
          <select name="example">
            <option>選択してください</option>
            <option>選択肢のサンプル2</option>
            <option>選択肢のサンプル3</option>
        </select>
            <div class="form__error">
            @error('example')
                {{ $message }}
            @enderror
            </div>
          </div>
        </div>
        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">お問い合わせ内容</span>
            <span style="color: red;">※</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--textarea">
              <textarea name="content" placeholder="お問い合わせの内容をご記載ください"></textarea>
            </div>
            <div class="form__error">
            @error('content')
                {{ $message }}
            @enderror
            </div>
          </div>
        </div>
        <div class="form__button">
          <button class="form__button-submit" type="submit">確認画面</button>
        </div>
      </form>
    </div>
  </main>
</body>

</html>
