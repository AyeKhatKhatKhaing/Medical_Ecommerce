<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class FamilyMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'first_name',
        'last_name',
        'profile_img',
        'email',
        'phone',
        'dob',
        'gender',
        'customer_id',
        'relationship_type_id',
        'id_type',
        'id_number',
    ];

    public function getRelationshipAttribute()
    {
        $relationshipType = RelationshipType::select("id","name_en","name_sc","name_tc")->where('id', $this->relationship_type_id)->first();
        return $relationshipType;
    }

    public function getVaccinationRecordAttribute()
    {
        $vaccinationRecord = VaccinationRecord::select("id")->where('family_member_id', $this->id)->first();
        return $vaccinationRecord;
    }

    public function getHealthRecordAttribute()
    {
        $healthRecord = HealthRecord::select("id")->where('family_member_id', $this->id)->first();
        return $healthRecord;
    }
}
