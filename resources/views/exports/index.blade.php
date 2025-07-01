<table>
    <tr>
        <th rowspan="4">
            <img src="{{ public_path('img/hero.png') }}" width="100" height="100">
        </th>
        <th style="font-size: 14px; font-weight: bold; text-align: left;" colspan="10">
            PT. INTEGRASI PRODUKTIVITAS INDONESIA
        </th>
    </tr>
    <tr>
        <td>
            Website
        </td>
        <td colspan="14">
            : https://www.linkproductive.com/
        </td>
        <td style="font-size: 14px; font-weight: bold; text-align: right;" colspan="6">
            LINK PRODUCTIVE
        </td>
    </tr>
    <tr>
        <td>
            Instagram
        </td>
        <td colspan="14">
            : https://shorturl.at/jNSJ8
        </td>
        <td style="font-weight: bold; text-align: right;" colspan="6">
            Jl. BBS III Blok B3, No 9, Cilegon, Banten
        </td>
    </tr>
    <tr>
        <td>
            Youtube
        </td>
        <td colspan="8">
            : https://shorturl.at/MJWGB
        </td>
        <td style="font-weight: bold; text-align: right;" colspan="12">
            Jl. Daradasih No. 28A, Wirobrajan, Yogyakarta
        </td>
    </tr>
</table>

<table>
    <tr>
        <td colspan="22" style="border-top: 2px double black;"></td>
    </tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>
    <tr>
        <td colspan="22" style="text-align: center; font-weight: bold; font-size: 14px;">
            PERFORMA UMKM KOTA {{ strtoupper($city) }}
        </td>
    </tr>

    <tr>
        <td colspan="22" style="text-align: center; font-weight: bold; font-size: 12px;">
            {{ strtoupper(\Carbon\Carbon::parse($start_date)->translatedFormat('d F Y')) }} -
            {{ strtoupper(\Carbon\Carbon::parse($end_date)->translatedFormat('d F Y')) }}
        </td>
    </tr>
    <tr></tr>
    <tr></tr>
</table>

<table>
    <thead>
        <tr>
            <th style="font-weight: bold; border: 1px solid black; text-align: center;">NO</th>
            <th style="font-weight: bold; border: 1px solid black; text-align: center;" colspan="4">OWNER</th>
            <th style="font-weight: bold; border: 1px solid black; text-align: center;" colspan="4">UMKM</th>
            <th style="font-weight: bold; border: 1px solid black; text-align: center;" colspan="2">TELEPON</th>
            <th style="font-weight: bold; border: 1px solid black; text-align: center;">SKALA</th>
            <th style="font-weight: bold; border: 1px solid black; text-align: center;" colspan="2">STATUS</th>
            <th style="font-weight: bold; border: 1px solid black; text-align: center;" colspan="3">BULAN</th>
            <th style="font-weight: bold; border: 1px solid black; text-align: center;" colspan="2">PENDAPATAN</th>
            <th style="font-weight: bold; border: 1px solid black; text-align: center;" colspan="3">KARYAWAN</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($incomes as $income)
            <tr>
                <td style="border: 1px solid black; text-align: center; vertical-align: middle;">
                    {{ $loop->iteration }}
                </td>
                <td style="border: 1px solid black; text-align: center; vertical-align: middle;" colspan="4">
                    {{ $income->umkm->user->name }}
                </td>
                <td style="border: 1px solid black; text-align: center; vertical-align: middle;" colspan="4">
                    {{ $income->umkm->biodata->business_name ?? '-' }}
                </td>
                <td style="border: 1px solid black; text-align: center; vertical-align: middle;" colspan="2">
                    {{ $income->umkm->biodata->phone_number ?? '-' }}
                </td>
                <td style="border: 1px solid black; text-align: center; vertical-align: middle;">
                    {{ $income->umkm->biodata->businessScale->name ?? '-' }}
                </td>
                <td style="border: 1px solid black; text-align: center; vertical-align: middle;" colspan="2">
                    {{ $income->umkm->umkmStatus->name ?? '-' }}
                </td>
                <td style="border: 1px solid black; text-align: center; vertical-align: middle;" colspan="3">
                    {{ $income->date->translatedFormat('F') ?? '-' }}
                </td>
                <td style="border: 1px solid black; text-align: center; vertical-align: middle;" colspan="2">
                    {{ number_format($income->total_income, thousands_separator: '.') }}
                </td>
                <td style="border: 1px solid black; text-align: center; vertical-align: middle;" colspan="3">
                    {{ number_format($income->total_employee, thousands_separator: '.') }}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
