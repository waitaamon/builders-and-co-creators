<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\CountryResource;
use App\Models\Directory\{Country,
    Profession\ArchitectBody,
    Profession\ContractorType,
    Profession\EngineerBody,
    Profession\EngineerType,
    Profession\Profession,
    Profession\ProfessionalBody,
    Profession\SupplierItem,
    Profession\WorkerType};
use App\Http\Controllers\Controller;

class RegistrationDetail extends Controller
{
    public function index()
    {

        $countries = Country::all();

        $professions = Profession::all();

        $contractor_types = ContractorType::all();

        $worker_types = WorkerType::all();

        $professional_bodies = ProfessionalBody::all();

        $architect_bodies = ArchitectBody::all();

        $engineer_bodies = EngineerBody::all();

        $engineer_types = EngineerType::all();

        $supplier_items = SupplierItem::all();

        return response()->json([
            'countries' => CountryResource::collection($countries),
            'professions' => $professions,
            'contractor_types' => $contractor_types,
            'worker_types' => $worker_types,
            'professional_bodies' => $professional_bodies,
            'architect_bodies' => $architect_bodies,
            'engineer_bodies' => $engineer_bodies,
            'engineer_types' => $engineer_types,
            'supplier_items' => $supplier_items,
        ], 200);

    }
}
