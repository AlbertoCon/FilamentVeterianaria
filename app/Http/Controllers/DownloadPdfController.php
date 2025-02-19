<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;

class DownloadPdfController extends Controller
{
    public function download(Patient $record)
    {
        $patient = new Buyer([
            'name'          => $record->name,
            'custom_fields' => [
                'Fecha de nacimiento' => $record->date_of_birth,
                'Tipo'               => $record->type,
                'ID del dueño'        => $record->owner_id,
            ],
        ]);

        $item = InvoiceItem::make('Información del Paciente')->pricePerUnit(0);

        $invoice = Invoice::make()
            ->buyer($patient)
            ->addItem($item)
            ->filename("Reporte_Paciente_{$record->id}")
            ->currencySymbol('')
            ->currencyCode('');
            

        return $invoice->stream();
    }

    // Nuevo método para generar el listado de todos los pacientes
    public function downloadAll()
    {
        $patients = Patient::all();

    // Crear una lista de pacientes como elementos del PDF
    $items = $patients->map(function ($patient) {
        return InvoiceItem::make($patient->name)
            ->pricePerUnit(0); // Puedes cambiarlo según lo que desees mostrar
    });

    $invoice = Invoice::make()
        ->buyer(new Buyer([
            'name' => 'Listado de Pacientes',
        ]))
        ->addItems($items->toArray()); // Agrega los pacientes al PDF

    return $invoice->stream();
    }
}
