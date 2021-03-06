<?php

return [
    'userManagement' => [
        'title'          => 'User management',
        'title_singular' => 'User management',
    ],
    'permission' => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Name',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'roles'                    => 'Roles',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
            'mobile'                   => 'Mobile',
            'mobile_helper'            => ' ',
            'gender'                   => 'Gender',
            'gender_helper'            => ' ',
            'date_of_birth'            => 'Date Of Birth',
            'date_of_birth_helper'     => ' ',
            'age'                      => 'Age',
            'age_helper'               => ' ',
            'weight'                   => 'Weight',
            'weight_helper'            => ' ',
            'height'                   => 'Height in',
            'height_helper'            => ' ',
            'address'                  => 'Address',
            'address_helper'           => ' ',
            'is_active'                => 'Payment is Active',
            'is_active_helper'         => ' ',
        ],
    ],
    'appointment' => [
        'title'          => 'Appointment',
        'title_singular' => 'Appointment',
        'fields'         => [
            'id'                        => 'ID',
            'id_helper'                 => ' ',
            'patient'                   => 'Patient',
            'patient_helper'            => ' ',
            'appointment_date'          => 'Appointment Date',
            'appointment_date_helper'   => ' ',
            'appointment_status'        => 'Appointment Status',
            'appointment_status_helper' => ' ',
            'created_at'                => 'Created at',
            'created_at_helper'         => ' ',
            'updated_at'                => 'Updated at',
            'updated_at_helper'         => ' ',
            'deleted_at'                => 'Deleted at',
            'deleted_at_helper'         => ' ',
            'doctor'                    => 'Doctor',
            'doctor_helper'             => ' ',
        ],
    ],
    'consultation' => [
        'title'          => 'Consultation',
        'title_singular' => 'Consultation',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'patient'              => 'Patient',
            'patient_helper'       => ' ',
            'symptom_one'          => 'Symptom One',
            'symptom_one_helper'   => ' ',
            'symptom_two'          => 'Symptom Two',
            'symptom_two_helper'   => ' ',
            'symptom_three'        => 'Symptom Three',
            'symptom_three_helper' => ' ',
            'symptom_four'         => 'Symptom Four',
            'symptom_four_helper'  => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
            'doctor'               => 'Doctor',
            'doctor_helper'        => ' ',
        ],
    ],
    'prescription' => [
        'title'          => 'Prescription',
        'title_singular' => 'Prescription',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'patient'            => 'Patient',
            'patient_helper'     => ' ',
            'medic_one'          => 'Medication One',
            'medic_one_helper'   => ' ',
            'medic_two'          => 'Medication Two',
            'medic_two_helper'   => ' ',
            'medic_three'        => 'Medic Three',
            'medic_three_helper' => ' ',
            'medic_four'         => 'Medic Four',
            'medic_four_helper'  => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
            'doctor'             => 'Doctor',
            'doctor_helper'      => ' ',
        ],
    ],
    'payment' => [
        'title'          => 'Payment',
        'title_singular' => 'Payment',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'patient'             => 'Patient',
            'patient_helper'      => ' ',
            'amount'              => 'Amount',
            'amount_helper'       => ' ',
            'mobile'              => 'Mobile',
            'mobile_helper'       => ' ',
            'status'              => 'Status',
            'status_helper'       => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
            'start_from'          => 'Start From',
            'start_from_helper'   => ' ',
            'active_until'        => 'Active Until',
            'active_until_helper' => ' ',
        ],
    ],
];
