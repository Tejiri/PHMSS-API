<?php

namespace Database\Seeders;

use App\Models\Medication;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $illnesses =  Medication::all();
        if (count($illnesses)) {
        } else {
            DB::table('medications')->insert(
                [
                    [
                        'name' => 'Albuterol',
                        'description' => 'Short-acting bronchodilator used for quick relief from asthma symptoms.',
                        'dosage' => 'Two puffs',
                        'frequency' => 'As needed',
                    ],
                    [
                        'name' => 'Flovent (Fluticasone)',
                        'description' => 'Corticosteroid inhaler used for long-term asthma control.',
                        'dosage' => '110 mcg',
                        'frequency' => 'Twice daily',
                    ],
                    [
                        'name' => 'Metformin',
                        'description' => 'Oral medication to lower blood sugar.',
                        'dosage' => '500 mg',
                        'frequency' => 'Twice daily',
                    ],
                    [
                        'name' => 'Insulin',
                        'description' => 'Hormone injection to regulate blood sugar.',
                        'dosage' => 'Varies',
                        'frequency' => 'As prescribed',
                    ],
                    [
                        'name' => 'Lisinopril',
                        'description' => 'ACE inhibitor for blood pressure control.',
                        'dosage' => '10 mg',
                        'frequency' => 'Once daily',
                    ],
                    [
                        'name' => 'Amlodipine',
                        'description' => 'Calcium channel blocker for blood pressure and angina.',
                        'dosage' => '5 mg',
                        'frequency' => 'Once daily',
                    ],

                    [
                        'name' => 'Methotrexate',
                        'description' => 'Immune system suppressor.',
                        'dosage' => '15 mg',
                        'frequency' => 'Once weekly',
                    ],
                    [
                        'name' => 'Prednisone',
                        'description' => 'Corticosteroid to reduce inflammation.',
                        'dosage' => '10 mg',
                        'frequency' => 'Once daily',
                    ],
                    [
                        'name' => 'Salmeterol',
                        'description' => 'Long-acting bronchodilator.',
                        'dosage' => 'Two puffs',
                        'frequency' => 'Twice daily',
                    ],

                    [
                        'name' => 'Tiotropium',
                        'description' => 'Long-acting anticholinergic bronchodilator.',
                        'dosage' => 'One capsule inhaled',
                        'frequency' => 'Once daily',
                    ],  [
                        'name' => 'Alendronate',
                        'description' => 'Bone-strengthening medication.',
                        'dosage' => '70 mg',
                        'frequency' => 'Once weekly',
                    ],  [
                        'name' => 'Raloxifene',
                        'description' => 'Selective estrogen receptor modulator.',
                        'dosage' => '60 mg',
                        'frequency' => 'Once daily',
                    ],

                    [
                        'name' => 'Interferon beta-1a',
                        'description' => 'Immunomodulating drug used for the treatment of multiple sclerosis.',
                        'dosage' => '30 mcg',
                        'frequency' => 'Once weekly',
                    ],
                    [
                        'name' => 'Glatiramer acetate',
                        'description' => 'Immunomodulating drug used primarily to treat multiple sclerosis.',
                        'dosage' => '20 mg',
                        'frequency' => 'Daily',
                    ],
                    [
                        'name' => 'Donepezil',
                        'description' => 'Medication that slows cognitive decline in Alzheimer\'s disease.',
                        'dosage' => '5 mg',
                        'frequency' => 'Once daily',
                    ],
                    [
                        'name' => 'Memantine',
                        'description' => 'NMDA receptor antagonist used in the treatment of Alzheimer\'s disease.',
                        'dosage' => '10 mg',
                        'frequency' => 'Twice daily',
                    ],
                    [
                        'name' => 'Levodopa',
                        'description' => 'Medication that converts to dopamine in the brain, used in Parkinson\'s Disease.',
                        'dosage' => '100 mg',
                        'frequency' => 'Three times daily',
                    ],
                    [
                        'name' => 'Pramipexole',
                        'description' => 'Dopamine agonist used for treating Parkinson\'s Disease.',
                        'dosage' => '0.125 mg',
                        'frequency' => 'Three times daily',
                    ],
                    [
                        'name' => 'Losartan',
                        'description' => 'Angiotensin II receptor blocker (ARB) used for blood pressure control in chronic kidney disease.',
                        'dosage' => '50 mg',
                        'frequency' => 'Once daily',
                    ],
                    [
                        'name' => 'Erythropoietin',
                        'description' => 'Hormone used to stimulate red blood cell production in chronic kidney disease.',
                        'dosage' => 'Varies',
                        'frequency' => 'As prescribed',
                    ],

                    [
                        'name' => 'Atorvastatin',
                        'description' => 'Lowers LDL cholesterol, commonly prescribed for managing heart disease.',
                        'dosage' => '20 mg',
                        'frequency' => 'Once daily',
                    ],
                    [
                        'name' => 'Aspirin',
                        'description' => 'Antiplatelet medication used for preventing heart disease complications.',
                        'dosage' => '81 mg',
                        'frequency' => 'Once daily',
                    ],
                    [
                        'name' => 'Lamivudine',
                        'description' => 'Antiviral medication used for treating Hepatitis B.',
                        'dosage' => '100 mg',
                        'frequency' => 'Once daily',
                    ],
                    [
                        'name' => 'Entecavir',
                        'description' => 'Antiviral medication used specifically for Hepatitis B treatment.',
                        'dosage' => '0.5 mg',
                        'frequency' => 'Once daily',
                    ],
                    [
                        'name' => 'Mesalamine',
                        'description' => 'Anti-inflammatory medication commonly used for treating Inflammatory Bowel Disease.',
                        'dosage' => '1.2 g',
                        'frequency' => 'Once daily',
                    ],
                    [
                        'name' => 'Infliximab',
                        'description' => 'Anti-TNF alpha medication used for severe cases of Inflammatory Bowel Disease.',
                        'dosage' => 'Varies',
                        'frequency' => 'Infusion every 8 weeks',
                    ],
                    [
                        'name' => 'Hydroxychloroquine',
                        'description' => 'Immune system modulator used for the management of Lupus.',
                        'dosage' => '200 mg',
                        'frequency' => 'Once daily',
                    ],
                    [
                        'name' => 'Azathioprine',
                        'description' => 'Immunosuppressive medication often used in Lupus treatment.',
                        'dosage' => '50 mg',
                        'frequency' => 'Once daily',
                    ],
                    [
                        'name' => 'Pregabalin',
                        'description' => 'Medication prescribed for nerve pain and fibromyalgia.',
                        'dosage' => '75 mg',
                        'frequency' => 'Twice daily',
                    ],
                    [
                        'name' => 'Duloxetine',
                        'description' => 'Antidepressant also effective for pain relief in fibromyalgia.',
                        'dosage' => '30 mg',
                        'frequency' => 'Once daily',
                    ],

                ]
            );
        }
    }
}
