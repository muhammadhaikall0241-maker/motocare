<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Vehicle;
use App\Models\ServiceRegistration;
use App\Models\ServiceDetail;
use App\Models\ServicePayment;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Validation\Rule;

class PanelController extends Controller
{
    private function modules(): array
    {
        return [
            'customers' => [
                'title' => 'Pelanggan',
                'singular' => 'Pelanggan',
                'model' => Customer::class,
                'icon' => '👥',
                'fields' => [
                    'name' => [
                        'label' => 'Nama pelanggan',
                        'type' => 'text',
                        'rules' => 'required|string|max:255'
                    ],
                    'phone' => [
                        'label' => 'Nomor telepon',
                        'type' => 'text',
                        'rules' => 'required|string|max:20'
                    ],
                    'address' => [
                        'label' => 'Alamat',
                        'type' => 'textarea',
                        'rules' => 'required|string'
                    ],
                    'occupation' => [
                        'label' => 'Pekerjaan',
                        'type' => 'text',
                        'rules' => 'required|string|max:255'
                    ],
                ],
                'columns' => [
                    'id' => 'ID',
                    'name' => 'Nama',
                    'phone' => 'Telepon',
                    'occupation' => 'Pekerjaan'
                ],
                'with' => [],
            ],

            'vehicles' => [
                'title' => 'Kendaraan',
                'singular' => 'Kendaraan',
                'model' => Vehicle::class,
                'icon' => '🏍️',
                'fields' => [
                    'customer_id' => [
                        'label' => 'Pemilik',
                        'type' => 'select',
                        'options' => Customer::class,
                        'rules' => 'required|exists:customers,id'
                    ],
                    'plate_number' => [
                        'label' => 'Nomor polisi',
                        'type' => 'text',
                        'rules' => 'required|string|max:255|unique:vehicles,plate_number'
                    ],
                    'vehicle_type' => [
                        'label' => 'Jenis transmisi',
                        'type' => 'radio',
                        'options' => [
                            'Matic' => 'Matic',
                            'Manual Transmisi' => 'Manual Transmisi'
                        ],
                        'rules' => 'required|in:Matic,Manual Transmisi'
                    ],
                    'stnk_number' => [
                        'label' => 'Nomor STNK',
                        'type' => 'text',
                        'rules' => 'required|string|max:255|unique:vehicles,stnk_number'
                    ],
                    'manufacture_year' => [
                        'label' => 'Tahun kendaraan',
                        'type' => 'number',
                        'rules' => 'required|integer|min:1950|max:' . (date('Y') + 1)
                    ],
                    'owner_name' => [
                        'label' => 'Nama pemilik pada kendaraan',
                        'type' => 'text',
                        'rules' => 'required|string|max:255'
                    ],
                    'color' => [
                        'label' => 'Warna',
                        'type' => 'text',
                        'rules' => 'required|string|max:255'
                    ],
                ],
                'columns' => [
                    'id' => 'ID',
                    'plate_number' => 'Nomor polisi',
                    'customer.name' => 'Pelanggan',
                    'vehicle_type' => 'Jenis',
                    'manufacture_year' => 'Tahun'
                ],
                'with' => ['customer'],
            ],

            'service-registrations' => [
                'title' => 'Pendaftaran Servis',
                'singular' => 'Pendaftaran servis',
                'model' => ServiceRegistration::class,
                'icon' => '🛠️',
                'fields' => [
                    'customer_id' => [
                        'label' => 'Pelanggan',
                        'type' => 'select',
                        'options' => Customer::class,
                        'rules' => 'required|exists:customers,id'
                    ],
                    'vehicle_id' => [
                        'label' => 'Kendaraan',
                        'type' => 'select',
                        'options' => Vehicle::class,
                        'rules' => 'required|exists:vehicles,id'
                    ],
                    'complaint' => [
                        'label' => 'Keluhan pelanggan',
                        'type' => 'textarea',
                        'rules' => 'required|string'
                    ],
                    'service_date' => [
                        'label' => 'Tanggal servis',
                        'type' => 'date',
                        'rules' => 'required|date'
                    ],
                ],
                'columns' => [
                    'id' => 'ID',
                    'customer.name' => 'Pelanggan',
                    'vehicle.plate_number' => 'Nomor polisi',
                    'service_date' => 'Tanggal',
                    'complaint' => 'Keluhan'
                ],
                'with' => ['customer', 'vehicle'],
            ],

            'service-details' => [
                'title' => 'Detail Servis',
                'singular' => 'Detail servis',
                'model' => ServiceDetail::class,
                'icon' => '🔧',
                'fields' => [
                    'service_registration_id' => [
                        'label' => 'Pendaftaran servis',
                        'type' => 'select',
                        'options' => ServiceRegistration::class,
                        'rules' => 'required|exists:service_registrations,id'
                    ],
                    'complaint' => [
                        'label' => 'Tindakan / keluhan servis',
                        'type' => 'textarea',
                        'rules' => 'required|string'
                    ],
                    'estimated_cost' => [
                        'label' => 'Estimasi biaya (Rp)',
                        'type' => 'number',
                        'step' => '0.01',
                        'rules' => 'required|numeric|gt:0'
                    ],
                    'mechanic_name' => [
                        'label' => 'Nama mekanik',
                        'type' => 'text',
                        'rules' => 'required|string|max:255'
                    ],
                    'replacement_sparepart' => [
                        'label' => 'Suku cadang yang diganti',
                        'type' => 'textarea',
                        'rules' => 'nullable|string'
                    ],
                ],
                'columns' => [
                    'id' => 'ID',
                    'service_registration_id' => 'ID Pendaftaran',
                    'mechanic_name' => 'Mekanik',
                    'estimated_cost' => 'Estimasi biaya',
                    'replacement_sparepart' => 'Suku cadang'
                ],
                'with' => [],
            ],

            'service-payments' => [
                'title' => 'Pembayaran',
                'singular' => 'Pembayaran',
                'model' => ServicePayment::class,
                'icon' => '💳',
                'fields' => [
                    'service_registration_id' => [
                        'label' => 'Pendaftaran servis',
                        'type' => 'select',
                        'options' => ServiceRegistration::class,
                        'rules' => 'required|exists:service_registrations,id'
                    ],
                    'amount' => [
                        'label' => 'Jumlah pembayaran (Rp)',
                        'type' => 'number',
                        'step' => '0.01',
                        'rules' => 'required|numeric|min:0'
                    ],
                    'payment_method' => [
                        'label' => 'Metode pembayaran',
                        'type' => 'radio',
                        'options' => [
                            'Cash/Tunai' => 'Cash/Tunai',
                            'Non Tunai' => 'Non Tunai'
                        ],
                        'rules' => 'required|in:Cash/Tunai,Non Tunai'
                    ],
                    'description' => [
                        'label' => 'Keterangan',
                        'type' => 'textarea',
                        'rules' => 'nullable|string'
                    ],
                ],
                'columns' => [
                    'id' => 'ID',
                    'service_registration_id' => 'ID Pendaftaran',
                    'amount' => 'Jumlah',
                    'payment_method' => 'Metode',
                    'description' => 'Keterangan'
                ],
                'with' => [],
            ],
        ];
    }

    private function config(string $module): array
    {
        abort_unless(isset($this->modules()[$module]), 404);

        return $this->modules()[$module];
    }

    private function options(array $config): array
    {
        foreach ($config['fields'] as $key => &$field) {
            if (($field['type'] ?? '') !== 'select') {
                continue;
            }

            $source = $field['options'];

            if (is_string($source) && $source === Customer::class) {
                $field['options'] = Customer::orderBy('name')
                    ->pluck('name', 'id')
                    ->all();

            } elseif (is_string($source) && $source === Vehicle::class) {
                $field['options'] = Vehicle::orderBy('plate_number')
                    ->get()
                    ->mapWithKeys(fn($v) => [
                        $v->id => $v->plate_number . ' — ' . $v->owner_name
                    ])
                    ->all();

            } elseif (is_string($source) && $source === ServiceRegistration::class) {
                $field['options'] = ServiceRegistration::with('customer', 'vehicle')
                    ->latest()
                    ->get()
                    ->mapWithKeys(fn($s) => [
                        $s->id => [
                            'label' => '#' . $s->id . ' — ' .
                                ($s->customer->name ?? '-') . ' / ' .
                                ($s->vehicle->plate_number ?? '-'),
                            'complaint' => $s->complaint ?? ''
                        ]
                    ])
                    ->all();
            }
        }

        return $config;
    }

    public function dashboard()
    {
        $stats = [
            'customers' => Customer::count(),
            'vehicles' => Vehicle::count(),
            'registrations' => ServiceRegistration::count(),
            'payments' => ServicePayment::sum('amount'),
        ];

        $recent = ServiceRegistration::with('customer', 'vehicle')
            ->latest()
            ->take(6)
            ->get();

        return view('dashboard', compact('stats', 'recent'));
    }

    public function index(string $module)
    {
        $config = $this->config($module);
        $query = ($config['model'])::query();

        if ($config['with']) {
            $query->with($config['with']);
        }

        $rows = $query->latest()
            ->paginate(10)
            ->withQueryString();

        return view('panel.index', compact('module', 'config', 'rows'));
    }

    public function create(string $module)
    {
        $config = $this->options($this->config($module));

        return view('panel.form', [
            'module' => $module,
            'config' => $config,
            'record' => null
        ]);
    }

    public function store(Request $request, string $module)
    {
        $config = $this->config($module);

        $rules = collect($config['fields'])
            ->mapWithKeys(fn($f, $k) => [$k => $f['rules']])
            ->all();

        if ($module === 'service-registrations') {
            $rules['vehicle_id'] = [
                'required',
                Rule::exists('vehicles', 'id')
                    ->where('customer_id', $request->input('customer_id')),
            ];
        }

        $data = $request->validate($rules);

        ($config['model'])::create($data);

        return redirect()
            ->route('panel.index', $module)
            ->with('success', $config['singular'] . ' berhasil ditambahkan.');
    }

    public function edit(string $module, int $id)
    {
        $config = $this->options($this->config($module));
        $record = ($config['model'])::findOrFail($id);

        return view('panel.form', compact('module', 'config', 'record'));
    }

    public function update(Request $request, string $module, int $id)
    {
        $config = $this->config($module);
        $record = ($config['model'])::findOrFail($id);

        $rules = collect($config['fields'])
            ->mapWithKeys(function ($f, $k) use ($module, $id, $request) {
                $rule = $f['rules'];

                if ($module === 'vehicles' && in_array($k, ['plate_number', 'stnk_number'])) {
                    $rule = [
                        'required',
                        'string',
                        'max:255',
                        Rule::unique('vehicles', $k)->ignore($id),
                    ];
                }

                if ($module === 'service-registrations' && $k === 'vehicle_id') {
                    $rule = [
                        'required',
                        Rule::exists('vehicles', 'id')
                            ->where('customer_id', $request->input('customer_id')),
                    ];
                }

                return [$k => $rule];
            })
            ->all();

        $data = $request->validate($rules);

        $record->update($data);

        return redirect()
            ->route('panel.index', $module)
            ->with('success', $config['singular'] . ' berhasil diperbarui.');
    }

    public function destroy(string $module, int $id)
    {
        $config = $this->config($module);
        $record = ($config['model'])::findOrFail($id);

        try {
            $record->delete();

            return back()->with(
                'success',
                $config['singular'] . ' berhasil dihapus.'
            );

        } catch (QueryException $e) {
            return back()->with(
                'error',
                'Data tidak dapat dihapus karena masih digunakan oleh data lain.'
            );
        }
    }
}
