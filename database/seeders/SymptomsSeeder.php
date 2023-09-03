<?php

namespace Database\Seeders;

use App\Models\Symptom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SymptomsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $symptoms =  Symptom::all();
        if (count($symptoms)) {
        } else {
            DB::table('symptoms')->insert(
                [
                    ['name' => 'Shortness of breath', 'description' => 'Difficulty or discomfort in breathing, often felt as a feeling of not getting enough air.'],
                    ['name' => 'Wheezing', 'description' => 'A high-pitched whistling sound made while breathing, typically during exhalation; indicates narrowing or obstruction in the airways.'],
                    ['name' => 'Chest tightness', 'description' => 'A squeezing or constricting sensation in the chest, which can be related to heart or lung conditions.'],
                    ['name' => 'Coughing at night or early morning', 'description' => 'Persistent cough that occurs during nighttime hours, commonly seen in conditions like asthma.'],
                    ['name' => 'Frequent urination', 'description' => 'Needing to urinate more often than usual, sometimes disrupting normal activities or sleep.'],
                    ['name' => 'Excessive thirst', 'description' => 'An abnormally strong craving for water or fluids.'],
                    ['name' => 'Unexplained weight loss', 'description' => 'Losing weight without a clear reason, such as changes in diet or exercise.'],
                    ['name' => 'Fatigue', 'description' => 'Persistent feelings of tiredness or exhaustion, not relieved by rest.'],
                    ['name' => 'Blurred vision', 'description' => 'Lack of clarity in vision, where objects appear fuzzy or indistinct.'],
                    ['name' => 'Slow healing sores', 'description' => 'Wounds or sores that take an unusually long time to heal.'],
                    ['name' => 'Headaches', 'description' => 'Pain or discomfort in the head, scalp, or neck, varying in intensity and duration.'],
                    ['name' => 'Dizziness', 'description' => 'Feeling lightheaded, unsteady, or like the surroundings are spinning (vertigo).',],
                    ['name' => 'Joint pain', 'description' => 'Discomfort, inflammation, or soreness in any of the body\'s joints.',],
                    ['name' => 'Joint swelling', 'description' => 'Enlargement or puffiness of the joint area, often accompanied by stiffness or pain.',],
                    ['name' => 'Joint stiffness', 'description' => 'Reduced mobility or flexibility in a joint, often felt after periods of inactivity.',],
                    ['name' => 'Fever', 'description' => 'Elevated body temperature, usually indicating an infection or inflammatory process.'],
                    ['name' => 'Chronic cough', 'description' => 'A persistent cough that lasts for weeks or longer.'],
                    ['name' => 'Memory loss', 'description' => 'Difficulty recalling past events, information, or conversations.'],
                    ['name' => 'Confusion', 'description' => 'Difficulty in understanding, thinking clearly, or making decisions.'],
                    ['name' => 'Misplacing things', 'description' => 'Regularly placing items in unusual locations and being unable to locate them.'],
                    ['name' => 'Mood changes', 'description' => 'Fluctuations or alterations in mood or emotional state, including feelings of sadness, irritability, or elation.'],
                    ['name' => 'Numbness or weakness', 'description' => 'Lack of sensation or reduced strength in a part of the body.'],
                    ['name' => 'Spasticity', 'description' => 'Muscle stiffness or spasms, often seen in neurological conditions.'],
                    ['name' => 'Vision problems', 'description' => 'Issues related to eyesight, such as blurred vision, double vision, or partial vision loss.'],
                    ['name' => 'Tremors', 'description' => 'Involuntary, rhythmic muscle movements or shaking in one or more body parts.'],
                    ['name' => 'Rigid muscles', 'description' => 'Muscle stiffness that can impair movement.'],
                    ['name' => 'Impaired posture and balance', 'description' => 'Difficulty maintaining an upright position, leading to stooping or instability.',],
                    ['name' => 'Swollen ankles or limbs', 'description' => 'Fluid buildup in the tissues, leading to puffiness or enlargement.',],
                    ['name' => 'High blood pressure', 'description' => 'Elevated force of blood against the walls of the arteries, which can strain the heart.',],
                    ['name' => 'Nausea', 'description' => 'A feeling of discomfort or unease in the stomach, often preceding vomiting.',],
                    ['name' => 'Anemia', 'description' => 'A condition where there\'s a deficiency in the quantity or quality of red blood cells, leading to symptoms like fatigue or pallor.'],
                    ['name' => 'Chest pain', 'description' => 'Discomfort or pain in the chest area, which can be sharp, dull, or burning.'],
                    ['name' => 'Palpitations', 'description' => 'Unusual sensations of the heartbeat, like it\'s racing, pounding, or fluttering.'],
                    ['name' => 'Jaundice', 'description' => 'Yellowing of the skin and eyes due to the buildup of bilirubin in the blood, often related to liver disease.'],
                    ['name' => 'Abdominal pain', 'description' => 'Discomfort or pain originating from organs within the abdominal cavity.'],
                    ['name' => 'Joint pain', 'description' => 'Pain or discomfort arising from the joints.'],
                    ['name' => 'Rash', 'description' => 'Change in the skin\'s appearance or texture, often marked by redness, bumps, or itchiness.'],
                    ['name' => 'Renal impairment', 'description' => 'Decreased functioning of the kidneys, which can lead to fluid buildup or waste accumulation.'],
                    ['name' => 'Photosensitivity', 'description' => 'Increased sensitivity to sunlight, leading to rashes or burns after minimal sun exposure.'],
                    ['name' => 'Cognitive difficulties', 'description' => 'Challenges with thinking, understanding, learning, or remembering.'],
                    ['name' => 'Tender points', 'description' => 'Specific spots on the body that are painful when pressure is applied, commonly associated with fibromyalgia.'],
                    ['name' => 'Sleep disturbances', 'description' => 'Problems related to sleeping, including insomnia, frequent waking, or sleep apnea.',],
                    ['name' => 'Frequent Respiratory Infections', 'description' => 'Recurring infections in the respiratory system, manifesting as coughs or breathing difficulty.',],
                    ['name' => 'Back Pain', 'description' => 'Discomfort in the upper, middle, or lower back, caused by muscle strain, spinal issues, or injuries.',],
                    ['name' => 'Loss of Height', 'description' => 'A noticeable decrease in stature due to spinal disc degeneration or osteoporosis.',],
                    ['name' => 'Stooped Posture', 'description' => 'A forward-bending upper back, often resulting from osteoporosis or spinal conditions.',],
                    ['name' => 'Difficulty Walking', 'description' => 'Challenges in movement, stemming from muscle weakness, joint pain, or neurological issues.',],
                    ['name' => 'Slowed Movement', 'description' => 'Reduced speed in actions, commonly seen in conditions like Parkinson\s disease.',],
                    ['name' => 'Speech Changes', 'description' => 'Alterations in voice or speech patterns, potentially due to neurological conditions or throat disorders.',],
                    ['name' => 'Dark Urine', 'description' => 'Indicative of dehydration or severe issues like liver disease or blood presence.',],
                    ['name' => 'Diarrhea', 'description' => 'Frequent loose or watery stools, arising from infections, food intolerances, or medications.',],
                    ['name' => 'Blood in Stool', 'description' => 'Presence of blood in bowel movements, signifying hemorrhoids, gastrointestinal bleeding, or cancers.',],
                ]
            );
        }
    }
}
