<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB; // Import DB facade

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_symptoms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        // Insert default rows in bulk
        $symptoms = [
            ['name' => 'itching'],
            ['name' => 'skin_rash'],
            ['name' => 'nodal_skin_eruptions'],
            ['name' => 'continuous_sneezing'],
            ['name' => 'shivering'],
            ['name' => 'chills'],
            ['name' => 'joint_pain'],
            ['name' => 'stomach_pain'],
            ['name' => 'acidity'],
            ['name' => 'ulcers_on_tongue'],
            ['name' => 'muscle_wasting'],
            ['name' => 'vomiting'],
            ['name' => 'burning_micturition'],
            ['name' => 'spotting_urination'],
            ['name' => 'fatigue'],
            ['name' => 'weight_gain'],
            ['name' => 'anxiety'],
            ['name' => 'cold_hands_and_feets'],
            ['name' => 'mood_swings'],
            ['name' => 'weight_loss'],
            ['name' => 'restlessness'],
            ['name' => 'lethargy'],
            ['name' => 'patches_in_throat'],
            ['name' => 'irregular_sugar_level'],
            ['name' => 'cough'],
            ['name' => 'high_fever'],
            ['name' => 'sunken_eyes'],
            ['name' => 'breathlessness'],
            ['name' => 'sweating'],
            ['name' => 'dehydration'],
            ['name' => 'indigestion'],
            ['name' => 'headache'],
            ['name' => 'yellowish_skin'],
            ['name' => 'dark_urine'],
            ['name' => 'nausea'],
            ['name' => 'loss_of_appetite'],
            ['name' => 'pain_behind_the_eyes'],
            ['name' => 'back_pain'],
            ['name' => 'constipation'],
            ['name' => 'abdominal_pain'],
            ['name' => 'diarrhoea'],
            ['name' => 'mild_fever'],
            ['name' => 'yellow_urine'],
            ['name' => 'yellowing_of_eyes'],
            ['name' => 'acute_liver_failure'],
            ['name' => 'fluid_overload'],
            ['name' => 'swelling_of_stomach'],
            ['name' => 'swelled_lymph_nodes'],
            ['name' => 'malaise'],
            ['name' => 'blurred_and_distorted_vision'],
            ['name' => 'phlegm'],
            ['name' => 'throat_irritation'],
            ['name' => 'redness_of_eyes'],
            ['name' => 'sinus_pressure'],
            ['name' => 'runny_nose'],
            ['name' => 'congestion'],
            ['name' => 'chest_pain'],
            ['name' => 'weakness_in_limbs'],
            ['name' => 'fast_heart_rate'],
            ['name' => 'pain_during_bowel_movements'],
            ['name' => 'pain_in_anal_region'],
            ['name' => 'bloody_stool'],
            ['name' => 'irritation_in_anus'],
            ['name' => 'neck_pain'],
            ['name' => 'dizziness'],
            ['name' => 'cramps'],
            ['name' => 'bruising'],
            ['name' => 'obesity'],
            ['name' => 'swollen_legs'],
            ['name' => 'swollen_blood_vessels'],
            ['name' => 'puffy_face_and_eyes'],
            ['name' => 'enlarged_thyroid'],
            ['name' => 'brittle_nails'],
            ['name' => 'swollen_extremeties'],
            ['name' => 'excessive_hunger'],
            ['name' => 'extra_marital_contacts'],
            ['name' => 'drying_and_tingling_lips'],
            ['name' => 'slurred_speech'],
            ['name' => 'knee_pain'],
            ['name' => 'hip_joint_pain'],
            ['name' => 'muscle_weakness'],
            ['name' => 'stiff_neck'],
            ['name' => 'swelling_joints'],
            ['name' => 'movement_stiffness'],
            ['name' => 'spinning_movements'],
            ['name' => 'loss_of_balance'],
            ['name' => 'unsteadiness'],
            ['name' => 'weakness_of_one_body_side'],
            ['name' => 'loss_of_smell'],
            ['name' => 'bladder_discomfort'],
            ['name' => 'foul_smell_of_urine'],
            ['name' => 'continuous_feel_of_urine'],
            ['name' => 'passage_of_gases'],
            ['name' => 'internal_itching'],
            ['name' => 'toxic_look_(typhos)'],
            ['name' => 'depression'],
            ['name' => 'irritability'],
            ['name' => 'muscle_pain'],
            ['name' => 'altered_sensorium'],
            ['name' => 'red_spots_over_body'],
            ['name' => 'belly_pain'],
            ['name' => 'abnormal_menstruation'],
            ['name' => 'dischromic_patches'],
            ['name' => 'watering_from_eyes'],
            ['name' => 'increased_appetite'],
            ['name' => 'polyuria'],
            ['name' => 'family_history'],
            ['name' => 'mucoid_sputum'],
            ['name' => 'rusty_sputum'],
            ['name' => 'lack_of_concentration'],
            ['name' => 'visual_disturbances'],
            ['name' => 'receiving_blood_transfusion'],
            ['name' => 'receiving_unsterile_injections'],
            ['name' => 'coma'],
            ['name' => 'stomach_bleeding'],
            ['name' => 'distention_of_abdomen'],
            ['name' => 'history_of_alcohol_consumption'],
            ['name' => 'blood_in_sputum'],
            ['name' => 'prominent_veins_on_calf'],
            ['name' => 'palpitations'],
            ['name' => 'painful_walking'],
            ['name' => 'pus_filled_pimples'],
            ['name' => 'blackheads'],
            ['name' => 'scurring'],
            ['name' => 'skin_peeling'],
            ['name' => 'silver_like_dusting'],
            ['name' => 'small_dents_in_nails'],
            ['name' => 'inflammatory_nails'],
            ['name' => 'blister'],
            ['name' => 'red_sore_around_nose'],
            ['name' => 'yellow_crust_ooze'],
        ];

        DB::table('user_symptoms')->insert($symptoms);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_symptoms');
    }
};
