
<div>
    <h1>お問い合わせ</h1>
    <form wire:submit.prevent="store" onSubmit="inputAddress();" class="h-adr">

        <table>
            <tr>
                <th>
                    <p>お名前<span>※</span></p>
                </th>
                <td>
                    <input type="text" wire:model="family_name" placeholder="例）山田">
                    <div>@error('family_name')<span style="color:#red">{{ $message }}</span>@enderror</div>
                </td>
                <td>
                    <input type="text" wire:model="first_name" placeholder="例）太郎">
                    <div>@error('first_name')<span style="color:#red">{{ $message }}</span>@enderror</div>
                </td>
            </tr>
            <tr>
                <th>
                    <p>性別<span>※</span></p>
                </th>
                <td>
                    <input type="radio" wire:model="gender" value="男性" checked><label>男性</label>
                    <input type="radio" wire:model="gender" value="女性"><label>女性</label>
                    <div>@error('gender')<span style="color:#red">{{ $message }}</span>@enderror</div>
                </td>
            </tr>
            <tr>
                <th>
                    <p>メールアドレス<span>※</span></p>
                </th>
                <td>
                    <input type="email" wire:model="email" placeholder="例）test@example.com">
                    <div>@error('email')<span style="color:#red">{{ $message }}</span>@enderror</div>
                </td>
            </tr>
            <tr>
                <th>
                    <p>郵便番号<span>※</span></p>
                </th>
                <td>
                    <input type="text" wire:model="postcode" class="p-postal-code" size="8" maxlength="8">
                    <div>@error('postcode')<span style="color:#red">{{ $message }}</span>@enderror</div>
                </td>
            </tr>
            <tr>
                <th>
                    <p>住所<span>※</span></p>
                </th>
                <td>
                    <input type="hidden" class="p-country-name" value="Japan">
                    <input type="text" wire:model="address" class="p-region p-locality p-street-address p-extended-address" placeholder="例）東京都渋谷区千駄ヶ谷1-2-3">
                    <div>@error('address')<span style="color:#red">{{ $message }}</span>@enderror</div>
                </td>
            </tr>
            <tr>
                <th>
                    <p>建物</p>
                </th>
                <td>
                    <input type="text" wire:model="building_name" placeholder="例）千駄ヶ谷マンション101">
                </td>
            </tr>
            <tr>
                <th>
                    <p>ご意見<span>※</span></p>
                </th>
                <td>
                    <textarea wire:model="opinion"></textarea>
                    <div>@error('opinion')<span style="color:#red">{{ $message }}</span>@enderror</div>
                </td>
            </tr>
        </table>
        <input type="submit" class="Form-Btn" value="確認">
    </form>
<script>
    function inputAddress() {
    @this.inputYubinbango($('#p-postal-code').val(), $('#p-region').val(), $('#p-locality').val(), $('#p-street-address').val(), $('#p-extended-address').val());
    }
</script>
</div>
