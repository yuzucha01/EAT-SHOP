
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>郵便番号検索</title>
    </head>
    <body>
    <h3>郵便番号から住所検索サンプル</h3>
    <label>郵便番号<input id="postcode" type="text" size="12" maxlength="8" placeholder="例：162-0825"></label>
    <button id="btn">検索</button>
    <div id="result">
    <p><label>都道府県 <input id="pref" type="text" size="6"></label></p>
    <p><label>市区町村 <input id="city" type="text" size="6"></label></p>
    <p><label>住所 <input id="address" type="text"></label></p>
    </div>

    <script>
    var btn = document.getElementById('btn');

    //「検索ボタン」クリック時にJSONデータ読み込み
    btn.addEventListener('click', function() {
    var postcode = document.getElementById('postcode');
    var pref = document.getElementById('pref');
    var city = document.getElementById('city');
    var address = document.getElementById('address');
    var script = document.createElement('script');

    //テキストボックスに入力された郵便番号をURLに追加
    script.src = "https://zipcloud.ibsnet.co.jp/api/search?zipcode=" + postcode.value + "&callback=jsonData";
    document.body.appendChild(script);
    document.body.removeChild(script);
    })

    //コールバックされたJSONデータ取得
    function jsonData(data) {

    //取得したデータを各HTML要素に代入
    pref.value = data['results'][0]['address1'];
    city.value = data['results'][0]['address2'];
    address.value = data['results'][0]['address3'];
    }
    </script>
    </body>
</html>