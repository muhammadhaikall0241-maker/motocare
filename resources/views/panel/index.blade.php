@extends('layouts.app')
@section('title',$config['title'])
@section('content')
<div class="heading">
    <div><div class="eyebrow">Data management / MotoCare</div><h1>{{ $config['title'] }}</h1><div class="sub">Kelola dan pantau data {{ strtolower($config['title']) }} MotoCare.</div></div>
    <a class="btn primary" href="{{ route('panel.create',$module) }}">＋ Tambah {{ $config['singular'] }}</a>
</div>
<div class="box">
    @if($rows->count())
    <div class="box-head"><span>Daftar {{ $config['title'] }}</span><span style="color:#85857c;font:500 11px 'DM Sans',sans-serif">{{ $rows->total() }} data tercatat</span></div>
    <table>
        <thead><tr>@foreach($config['columns'] as $key=>$label)<th>{{ $label }}</th>@endforeach<th>Aksi</th></tr></thead>
        <tbody>
        @foreach($rows as $row)
        <tr>
            @foreach($config['columns'] as $key=>$label)
                @php($value = data_get($row,$key))
                <td>
                    @if(in_array($key,['amount','estimated_cost']) && is_numeric($value))
                        <span class="money">Rp {{ number_format((float)$value,0,',','.') }}</span>
                    @elseif($key === 'service_date' && $value)
                        {{ \Illuminate\Support\Carbon::parse($value)->format('d/m/Y') }}
                    @else
                        {{ \Illuminate\Support\Str::limit((string)($value ?? '-'),55) }}
                    @endif
                </td>
            @endforeach
            <td><div class="actions">
                <a class="btn light small" href="{{ route('panel.edit',[$module,$row->id]) }}">Edit</a>
                <form method="POST" action="{{ route('panel.destroy',[$module,$row->id]) }}" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn danger small" type="submit">Hapus</button>
                </form>
            </div></td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <div class="pagination">{{ $rows->links() }}</div>
    @else
    <div class="empty">
        <div style="font:700 14px 'Manrope',sans-serif;color:#42443d;margin-bottom:8px">Belum ada data {{ strtolower($config['title']) }}</div>
        <div style="margin-bottom:17px">Mulai dengan menambahkan {{ strtolower($config['singular']) }} pertama ke sistem MotoCare.</div>
        <a class="btn primary" href="{{ route('panel.create',$module) }}">＋ Tambah {{ $config['singular'] }}</a>
    </div>
    @endif
</div>
@endsection
