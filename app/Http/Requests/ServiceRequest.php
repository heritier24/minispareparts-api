<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->role === 'receptionist' || auth()->user()->role === 'mechanic';
    }

    public function rules(): array
    {
        return [
            'vehicle_id' => 'required|exists:vehicles,id',
            'status' => 'required|in:new-service,in-service,completed',
            'assignedMechanic' => 'nullable|string|max:255',
            'createdAt' => 'required|date',
        ];
    }
}
