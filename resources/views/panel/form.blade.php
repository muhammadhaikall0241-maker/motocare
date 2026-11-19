
@extends('layouts.app')

@section('title', ($record ? 'Edit ' : 'Tambah ') . $config['singular'])

@section('styles')
<style>
    .radio-options {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
    }

    .radio-option {
        display: flex;
        align-items: center;
        gap: 9px;
        padding: 12px 16px;
        border: 1px solid #414243;
        border-radius: 7px;
        background: #242526;
        color: #e9e6dc;
        cursor: pointer;
        transition: .2s;
    }

    .radio-option:has(input:checked) {
        border-color: #c5a66b;
        background: #332d22;
    }

    .radio-option input {
        width: auto;
        accent-color: #c5a66b;
    }

    .auto-info {
        margin-top: 9px;
        padding: 12px 14px;
        border: 1px solid #665638;
        border-radius: 6px;
        background: #29251e;
        color: #d8c69f;
        font-size: 12px;
        line-height: 1.7;
    }
</style>
@endsection

@section('content')
<div class="heading">
    <div>
        <div class="eyebrow">Data management / MotoCare</div>
        <h1>{{ $record ? 'Edit' : 'Tambah' }} {{ $config['singular'] }}</h1>
        <div class="sub">Lengkapi formulir berikut dengan data yang benar.</div>
    </div>

    <a class="btn light" href="{{ route('panel.index', $module) }}">Kembali ke daftar</a>
</div>

<div class="formbox">
    <form method="POST" action="{{ $record ? route('panel.update', [$module, $record->id]) : route('panel.store', $module) }}">
        @csrf

        @if($record)
            @method('PUT')
        @endif

        <div class="fields">
            @foreach($config['fields'] as $name => $field)
                <div class="field {{ in_array($field['type'] ?? '', ['textarea', 'radio']) ? 'full' : '' }}">

                    <label for="{{ $name }}">
                        {{ $field['label'] }}

                        @if(str_contains($field['rules'], 'required'))
                            <span style="color:#c77c70">*</span>
                        @endif
                    </label>

                    {{-- RADIO BUTTON --}}
                    @if(($field['type'] ?? '') === 'radio')

                        <div class="radio-options">
                            @foreach($field['options'] as $value => $label)
                                <label class="radio-option">
                                    <input
                                        type="radio"
                                        name="{{ $name }}"
                                        value="{{ $value }}"
                                        @checked((string)old($name, $record?->{$name}) === (string)$value)
                                        {{ str_contains($field['rules'], 'required') ? 'required' : '' }}
                                    >
                                    {{ $label }}
                                </label>
                            @endforeach
                        </div>

                    {{-- TEXTAREA --}}
                    @elseif(($field['type'] ?? '') === 'textarea')

                        <textarea
                            id="{{ $name }}"
                            name="{{ $name }}"
                            {{ str_contains($field['rules'], 'required') ? 'required' : '' }}
                            placeholder="Masukkan {{ strtolower($field['label']) }}"
                        >{{ old($name, $record?->{$name}) }}</textarea>

                    {{-- SELECT DROPDOWN --}}
                    @elseif(($field['type'] ?? '') === 'select')

                        <select
                            id="{{ $name }}"
                            name="{{ $name }}"
                            {{ str_contains($field['rules'], 'required') ? 'required' : '' }}
                        >
                            <option value="">Pilih {{ strtolower($field['label']) }}</option>

                            @foreach($field['options'] as $value => $label)
                                <option
                                    value="{{ $value }}"
                                    data-complaint="{{ is_array($label) ? ($label['complaint'] ?? '') : '' }}"
                                    @selected((string)old($name, $record?->{$name}) === (string)$value)
                                >
                                    {{ is_array($label) ? $label['label'] : $label }}
                                </option>
                            @endforeach
                        </select>

                        {{-- INFORMASI NAMA PELANGGAN --}}
                        @if($module === 'service-registrations' && $name === 'customer_id')
                            <div class="auto-info" id="customerInfo">
                                Nama pelanggan akan muncul otomatis setelah dipilih.
                            </div>
                        @endif

                        {{-- INFORMASI KELUHAN PENDAFTARAN --}}
                        @if($module === 'service-details' && $name === 'service_registration_id')
                            <div class="auto-info" id="complaintInfo">
                                Keluhan pendaftaran servis akan muncul otomatis setelah dipilih.
                            </div>
                        @endif

                    {{-- INPUT BIASA --}}
                    @else

                        <input
                            id="{{ $name }}"
                            name="{{ $name }}"
                            type="{{ $field['type'] }}"
                            value="{{ old($name, $record?->{$name}) }}"
                            placeholder="Masukkan {{ strtolower($field['label']) }}"
                            {{ isset($field['step']) ? 'step='.$field['step'] : '' }}
                            {{ str_contains($field['rules'], 'required') ? 'required' : '' }}
                        >

                    @endif

                    @error($name)
                        <div class="error-text">{{ $message }}</div>
                    @enderror

                </div>
            @endforeach
        </div>

        <div class="form-actions">
            <button class="btn primary" type="submit">Simpan Data</button>
            <a class="btn light" href="{{ route('panel.index', $module) }}">Batal</a>
        </div>
    </form>
</div>
@endsection

@section('scripts')

{{-- JAVASCRIPT NAMA PELANGGAN --}}
@if($module === 'service-registrations')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const customerSelect = document.getElementById('customer_id');
    const info = document.getElementById('customerInfo');

    if (!customerSelect || !info) return;

    function updateCustomer() {
        const selected = customerSelect.options[customerSelect.selectedIndex];

        info.textContent = selected && selected.value
            ? 'Nama pelanggan: ' + selected.text
            : 'Nama pelanggan akan muncul otomatis setelah dipilih.';
    }

    customerSelect.addEventListener('change', updateCustomer);
    updateCustomer();
});
</script>
@endif

{{-- JAVASCRIPT KELUHAN PENDAFTARAN SERVIS --}}
@if($module === 'service-details')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const registrationSelect = document.getElementById('service_registration_id');
    const complaintField = document.getElementById('complaint');
    const complaintInfo = document.getElementById('complaintInfo');

    if (!registrationSelect || !complaintField || !complaintInfo) return;

    function updateComplaint() {
        const selected = registrationSelect.options[registrationSelect.selectedIndex];

        if (!selected || !selected.value) {
            complaintInfo.textContent = 'Keluhan pendaftaran servis akan muncul otomatis setelah dipilih.';
            return;
        }

        const complaint = selected.dataset.complaint || '';

        complaintField.value = complaint;

        complaintInfo.textContent = complaint
            ? 'Keluhan pendaftaran: ' + complaint
            : 'Pendaftaran ini belum memiliki keluhan.';
    }

    registrationSelect.addEventListener('change', updateComplaint);
    updateComplaint();
});
</script>
@endif

@endsection
