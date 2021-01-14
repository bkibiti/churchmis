<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Member extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id'=> $this->id,
            'name'=> $this->name,
            'gender'=> $this->gender,
            'date_of_birth'=> $this->dob,
            'birth_place'=> $this->birth_place,
            'marriage_status'=> $this->marriageStatus->name,
            'marriage_type'=> $this->marriage_type,
            'date_marriage'=>  (string)$this->date_marriage,
            'place_of_marriage'=> $this->marriage_place,
            'partner_name'=> $this->partner_name,
            'mobile_phone'=> $this->mobile_phone,
            'partner_phone'=> $this->partner_phone,
            'address'=> $this->address,
            'house_no'=> $this->house_no,
            'email'=> $this->email,
            'residential_area'=> $this->residential_area,
            'block_no'=> $this->block_no,
            'previous_church'=> $this->previous_church,
            'fellowship'=> $this->fellowship,
            'neighbour'=> $this->neighbour,
            'church_elder'=> $this->church_elder,
            'occupation'=> $this->occupation,
            'work_place'=> $this->work_place,
            'profession'=> $this->profession,
            'education'=> $this->education,
            'volunteer'=> $this->volunteer,
            'baptised'=> $this->baptised,
            'date_baptism'=>  (string)$this->date_baptism,
            'confirmation'=> $this->confirmation,
            'date_confirmation'=>  (string)$this->date_confirmation,
            'eucharist'=> $this->eucharist,
            'active_community_prayers'=> $this->active_community_prayers,
            'community_name'=> $this->community->name,
            'community_leader'=> $this->community_leader,
            'participation_reason'=> $this->participation_reason,
            'services'=> $this->services,
            'pledge_number'=> $this->pledge_no,
            'form_return_date'=>  (string)$this->form_return_date,
            'position'=> $this->position->name,
            'created_at'=>  (string)$this->created_at,
            'updated_at'=>  (string)$this->updated_at,
        ];
    }

}
