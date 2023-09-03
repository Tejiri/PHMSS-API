<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Illness;
use App\Models\Medication;
use App\Models\Symptom;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(
            [
                IllnessesSeeder::class,
                SymptomsSeeder::class,
                UserSeeder::class,
                MedicationSeeder::class
            ]
        );

        $this->attachSymtomAndMedicationToIllnesses();
    }

    function attachSymtomAndMedicationToIllnesses()
    {

        $illness1 = Illness::where('name', 'Asthma')->first();
        $illness2 = Illness::where('name', 'Diabetes Mellitus (Types 1 & 2)')->first();
        $illness3 = Illness::where('name', 'Hypertension (High Blood Pressure)')->first();
        $illness4 = Illness::where('name', 'Rheumatoid Arthritis')->first();
        $illness5 = Illness::where('name', 'Chronic Obstructive Pulmonary Disease (COPD)')->first();
        $illness6 = Illness::where('name', 'Osteoporosis')->first();
        $illness7 = Illness::where('name', 'Multiple Sclerosis (MS)')->first();
        $illness8 = Illness::where('name', 'Alzheimer\'s Disease')->first();
        $illness9 = Illness::where('name', 'Parkinson\'s Disease')->first();
        $illness10 = Illness::where('name', 'Chronic Kidney Disease (CKD)')->first();
        $illness11 = Illness::where('name', 'Heart Disease')->first();
        $illness12 = Illness::where('name', 'Hepatitis B')->first();
        $illness13 = Illness::where('name', 'Inflammatory Bowel Disease (IBD)')->first();
        $illness14 = Illness::where('name', 'Lupus')->first();
        $illness15 = Illness::where('name', 'Fibromyalgia')->first();

        if (count($illness1->medications)) {
        
        } else{

            $medication1Id = Medication::where('name', 'Albuterol')->first()->id;
            $medication2Id = Medication::where('name', 'Flovent (Fluticasone)')->first()->id;
            $medication3Id = Medication::where('name', 'Metformin')->first()->id;
            $medication4Id = Medication::where('name', 'Insulin')->first()->id;
            $medication5Id = Medication::where('name', 'Lisinopril')->first()->id;
            $medication6Id = Medication::where('name', 'Amlodipine')->first()->id;
            $medication7Id = Medication::where('name', 'Methotrexate')->first()->id;
            $medication8Id = Medication::where('name', 'Prednisone')->first()->id;
            $medication9Id = Medication::where('name', 'Salmeterol')->first()->id;
            $medication10Id = Medication::where('name', 'Tiotropium')->first()->id;
            $medication11Id = Medication::where('name', 'Alendronate')->first()->id;
            $medication12Id = Medication::where('name', 'Raloxifene')->first()->id;
            $medication13Id = Medication::where('name', 'Interferon beta-1a')->first()->id;
            $medication14Id = Medication::where('name', 'Glatiramer acetate')->first()->id;
            $medication15Id = Medication::where('name', 'Donepezil')->first()->id;
            $medication16Id = Medication::where('name', 'Memantine')->first()->id;
            $medication17Id = Medication::where('name', 'Levodopa')->first()->id;
            $medication18Id = Medication::where('name', 'Pramipexole')->first()->id;
            $medication19Id = Medication::where('name', 'Losartan')->first()->id;
            $medication20Id = Medication::where('name', 'Erythropoietin')->first()->id;
            $medication21Id = Medication::where('name', 'Atorvastatin')->first()->id;
            $medication22Id = Medication::where('name', 'Aspirin')->first()->id;
            $medication23Id = Medication::where('name', 'Lamivudine')->first()->id;
            $medication24Id = Medication::where('name', 'Entecavir')->first()->id;
            $medication25Id = Medication::where('name', 'Mesalamine')->first()->id;
            $medication26Id = Medication::where('name', 'Infliximab')->first()->id;
            $medication27Id = Medication::where('name', 'Hydroxychloroquine')->first()->id;
            $medication28Id = Medication::where('name', 'Azathioprine')->first()->id;
            $medication29Id = Medication::where('name', 'Pregabalin')->first()->id;
            $medication30Id = Medication::where('name', 'Duloxetine')->first()->id;
    
            $illness1->medications()->attach([$medication1Id, $medication2Id]);
            $illness2->medications()->attach([$medication3Id, $medication4Id]);
            $illness3->medications()->attach([$medication5Id, $medication6Id]);
            $illness4->medications()->attach([$medication7Id, $medication8Id]);
            $illness5->medications()->attach([$medication9Id, $medication10Id]);
            $illness6->medications()->attach([$medication11Id, $medication12Id]);
            $illness7->medications()->attach([$medication13Id, $medication14Id]);
            $illness8->medications()->attach([$medication15Id, $medication16Id]);
            $illness9->medications()->attach([$medication17Id, $medication18Id]);
            $illness10->medications()->attach([$medication19Id, $medication20Id]);
            $illness11->medications()->attach([$medication21Id, $medication22Id]);
            $illness12->medications()->attach([$medication23Id, $medication24Id]);
            $illness13->medications()->attach([$medication25Id, $medication26Id]);
            $illness14->medications()->attach([$medication27Id, $medication28Id]);
            $illness15->medications()->attach([$medication29Id, $medication30Id]);
    
            $symptom1Id = Symptom::where('name', 'Shortness of breath')->first()->id;
            $symptom2Id = Symptom::where('name', 'Wheezing')->first()->id;
            $symptom3Id = Symptom::where('name', 'Chest tightness')->first()->id;
            $symptom4Id = Symptom::where('name', 'Coughing at night or early morning')->first()->id;
            $symptom5Id = Symptom::where('name', 'Frequent urination')->first()->id;
            $symptom6Id = Symptom::where('name', 'Excessive thirst')->first()->id;
            $symptom7Id = Symptom::where('name', 'Unexplained weight loss')->first()->id;
            $symptom8Id = Symptom::where('name', 'Fatigue')->first()->id;
            $symptom9Id = Symptom::where('name', 'Blurred vision')->first()->id;
            $symptom10Id = Symptom::where('name', 'Slow healing sores')->first()->id;
            $symptom11Id = Symptom::where('name', 'Headaches')->first()->id;
            $symptom12Id = Symptom::where('name', 'Dizziness')->first()->id;
            $symptom13Id = Symptom::where('name', 'Joint pain')->first()->id;
            $symptom14Id = Symptom::where('name', 'Joint swelling')->first()->id;
            $symptom15Id = Symptom::where('name', 'Joint stiffness')->first()->id;
            $symptom16Id = Symptom::where('name', 'Fever')->first()->id;
            $symptom17Id = Symptom::where('name', 'Chronic cough')->first()->id;
            $symptom18Id = Symptom::where('name', 'Memory loss')->first()->id;
            $symptom19Id = Symptom::where('name', 'Confusion')->first()->id;
            $symptom20Id = Symptom::where('name', 'Misplacing things')->first()->id;
            $symptom21Id = Symptom::where('name', 'Mood changes')->first()->id;
            $symptom22Id = Symptom::where('name', 'Numbness or weakness')->first()->id;
            $symptom23Id = Symptom::where('name', 'Spasticity')->first()->id;
            $symptom24Id = Symptom::where('name', 'Vision problems')->first()->id;
            $symptom25Id = Symptom::where('name', 'Tremors')->first()->id;
            $symptom26Id = Symptom::where('name', 'Rigid muscles')->first()->id;
            $symptom27Id = Symptom::where('name', 'Impaired posture and balance')->first()->id;
            $symptom28Id = Symptom::where('name', 'Swollen ankles or limbs')->first()->id;
            $symptom29Id = Symptom::where('name', 'High blood pressure')->first()->id;
            $symptom30Id = Symptom::where('name', 'Nausea')->first()->id;
            $symptom31Id = Symptom::where('name', 'Anemia')->first()->id;
            $symptom32Id = Symptom::where('name', 'Chest pain')->first()->id;
            $symptom33Id = Symptom::where('name', 'Palpitations')->first()->id;
            $symptom34Id = Symptom::where('name', 'Jaundice')->first()->id;
            $symptom35Id = Symptom::where('name', 'Abdominal pain')->first()->id;
            $symptom36Id = Symptom::where('name', 'Joint pain')->first()->id;
            $symptom37Id = Symptom::where('name', 'Rash')->first()->id;
            $symptom38Id = Symptom::where('name', 'Renal impairment')->first()->id;
            $symptom39Id = Symptom::where('name', 'Photosensitivity')->first()->id;
            $symptom40Id = Symptom::where('name', 'Cognitive difficulties')->first()->id;
            $symptom41Id = Symptom::where('name', 'Tender points')->first()->id;
            $symptom42Id = Symptom::where('name', 'Sleep disturbances')->first()->id;
            $symptom43Id = Symptom::where('name', 'Frequent Respiratory Infections')->first()->id;
            $symptom44Id = Symptom::where('name', 'Back Pain')->first()->id;
            $symptom45Id = Symptom::where('name', 'Loss of Height')->first()->id;
            $symptom46Id = Symptom::where('name', 'Stooped Posture')->first()->id;
            $symptom47Id = Symptom::where('name', 'Difficulty Walking')->first()->id;
            $symptom48Id = Symptom::where('name', 'Slowed Movement')->first()->id;
            $symptom49Id = Symptom::where('name', 'Speech Changes')->first()->id;
            $symptom50Id = Symptom::where('name', 'Dark Urine')->first()->id;
            $symptom51Id = Symptom::where('name', 'Diarrhea')->first()->id;
            $symptom52Id = Symptom::where('name', 'Blood in Stool')->first()->id;
    
            $illness1->symptoms()->attach([$symptom1Id, $symptom2Id, $symptom3Id, $symptom4Id]);
            $illness2->symptoms()->attach([$symptom5Id, $symptom6Id, $symptom7Id, $symptom8Id, $symptom9Id, $symptom10Id]);
            $illness3->symptoms()->attach([$symptom11Id, $symptom1Id, $symptom12Id, $symptom32Id]);
            $illness4->symptoms()->attach([$symptom36Id, $symptom14Id, $symptom15Id, $symptom8Id, $symptom16Id, $symptom7Id]);
            $illness5->symptoms()->attach([$symptom1Id, $symptom2Id, $symptom3Id, $symptom17Id, $symptom43Id]);
            $illness6->symptoms()->attach([$symptom18Id, $symptom19Id, $symptom40Id, $symptom20Id, $symptom21Id]);
            $illness7->symptoms()->attach([$symptom44Id, $symptom45Id, $symptom46Id]);
            $illness8->symptoms()->attach([$symptom8Id, $symptom22Id, $symptom23Id, $symptom24Id, $symptom47Id]); 
            $illness9->symptoms()->attach([$symptom25Id, $symptom26Id, $symptom27Id, $symptom48Id, $symptom49Id]);
            $illness10->symptoms()->attach([$symptom8Id, $symptom28Id, $symptom29Id, $symptom1Id, $symptom30Id, $symptom31Id]);
            $illness11->symptoms()->attach([$symptom32Id, $symptom1Id, $symptom33Id, $symptom12Id, $symptom28Id]);
            $illness12->symptoms()->attach([$symptom8Id, $symptom34Id, $symptom35Id, $symptom36Id, $symptom50Id]);
            $illness13->symptoms()->attach([$symptom35Id, $symptom7Id, $symptom8Id, $symptom51Id, $symptom52Id]);
            $illness14->symptoms()->attach([$symptom8Id, $symptom13Id, $symptom37Id, $symptom38Id, $symptom39Id]);
            $illness15->symptoms()->attach([$symptom8Id, $symptom40Id, $symptom11Id, $symptom41Id, $symptom42Id]);
       
        }
 }
}
