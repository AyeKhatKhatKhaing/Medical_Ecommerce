<?php

namespace App\Repositories;

use Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use App\Models\Recipient;
use App\Models\Role;
use Illuminate\Http\Request;
use Session;

class RecipientRepo
{

    public function getRecipient($request)
    {
        $recipient        = $this->recipientData($request);
        $datatables       = DataTables::of($recipient)
            ->addIndexColumn()
            ->addColumn('no', function ($recipient) {
                return '';
            })
            ->editColumn('location', function ($recipient) {
                return ' ' . $recipient->area->name_en . ' ';
            })
            ->editColumn('product_id', function ($recipient) {
                return ' ' . $recipient->product->name_en . ' ';
            })
            ->addColumn('action', function ($recipient) {
                $btn  = '';

                $btn .= ' <a href="' . route('recipient.show', $recipient->id) . '" title="view recipient">
                <button class="btn btn-icon btn btn-secondary w-30px h-30px"><i class="bi bi-eye" aria-hidden="true"></i></button></a>';
                return "<div class='action-column'>" . $btn . "</div>";
            })
            ->rawColumns(['name', 'updated_at', 'action']);

        return $datatables->make(true);
    }

    public function recipientData($request)
    {
        $data = Recipient::leftJoin('customers', function ($join) {
            return $join->on('customers.id', '=', 'recipients.customer_id');
        })->select('recipients.*')->orderBy('recipients.id', 'desc')->get();
        return $data;
    }
}
