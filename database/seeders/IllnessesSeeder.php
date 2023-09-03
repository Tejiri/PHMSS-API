<?php

namespace Database\Seeders;

use App\Models\Illness;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IllnessesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $illnesses =  Illness::all();
        if (count($illnesses)) {
        } else {
            DB::table('illnesses')->insert(
                [
                    ['name' => 'Asthma', 'description' => 'A chronic respiratory condition where the airways in the lungs become inflamed and narrowed.'],
                    ['name' => 'Diabetes Mellitus (Types 1 & 2)', 'description' => 'Metabolic disorders affecting blood glucose levels.'],
                    ['name' => 'Hypertension (High Blood Pressure)', 'description' => 'Consistently high blood pressure levels.'],
                    ['name' => 'Rheumatoid Arthritis', 'description' => 'An autoimmune disease affecting the joints.'],
                    ['name' => 'Chronic Obstructive Pulmonary Disease (COPD)', 'description' => 'A group of lung diseases blocking airflow.'],
                    ['name' => 'Osteoporosis', 'description' => 'Bone density loss leading to increased fracture risk.'],
                    ['name' => 'Multiple Sclerosis (MS)', 'description' => 'Disease affecting the central nervous system.'],
                    ['name' => 'Alzheimer\'s Disease', 'description' => 'Degenerative brain disease leading to cognitive decline.'],
                    ['name' => 'Parkinson\'s Disease', 'description' => 'Neurodegenerative disorder affecting movement.'],
                    ['name' => 'Chronic Kidney Disease (CKD)', 'description' => 'Gradual loss of kidney function.'],
                    ['name' => 'Heart Disease', 'description' => 'Conditions affecting heart structure and functions.'],
                    ['name' => 'Hepatitis B', 'description' => 'Viral liver infections.',],
                    ['name' => 'Inflammatory Bowel Disease (IBD)', 'description' => 'Chronic inflammation of the digestive tract.',],
                    ['name' => 'Lupus', 'description' => 'Autoimmune disease affecting various organs.',],
                    ['name' => 'Fibromyalgia', 'description' => 'Widespread musculoskeletal pain.',]
                ]
            );
        }
    }
}
