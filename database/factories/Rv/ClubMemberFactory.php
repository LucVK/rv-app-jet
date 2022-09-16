<?php

namespace Database\Factories\Rv;

use App\Models\Rv\ClubMember;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rv\ClubMember>
 */
class ClubMemberFactory extends Factory
{
    private function lastStateAttributes()
    {
        return $this->states->last()();
    }

    private function generateLoginCode(string $firstname, string $lastname)
    {
        static $existingLoginCodes;
        $existingLoginCodes = $existingLoginCodes ?: ClubMember::pluck('code')->toArray();

        $suffix = 0;
        do {
            $safeLastName = Str::ascii($lastname);
            $lastnameParts = preg_split('/\s+/', $safeLastName);
            $initials = strtoupper(Str::ascii($firstname)[0]);
            if (count($lastnameParts) > 1) {
                $initials .= strtoupper(Str::ascii($lastnameParts[0])[0]);
                $safeLastName = $lastnameParts[count($lastnameParts) - 1];
            }

            for ($i = 0; $i <= $suffix; $i++) {
                if (!isset($safeLastName[$i])) {
                    $initials .= 'X';
                    continue;
                }

                $character = $safeLastName[$i];
                if (in_array($character, [' ', '-', '\'', ''])) {
                    continue;
                }
                $initials .= strtoupper($character);
            }
            $suffix++;
        } while (in_array($initials, $existingLoginCodes));

        $existingLoginCodes[] = $initials;
        return $initials;
    }

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $stateAttributes = $this->lastStateAttributes();
        $firstname = isset($stateAttributes['firstname']) ? $stateAttributes['firstname'] : fake()->firstName;
        $lastname = isset($stateAttributes['lastname']) ? $stateAttributes['lastname'] : fake()->lastname;
        $email = isset($stateAttributes['email']) ? $stateAttributes['email'] : fake()->email();
        $code = $this->generateLoginCode($firstname, $lastname);
        $birthdate = isset($stateAttributes['birthdate']) ? $stateAttributes['birthdate'] : fake()->date;
        $streetandnumber = isset($stateAttributes['streetandnumber']) ? $stateAttributes['streetandnumber'] : fake()->address;
        $phone = isset($stateAttributes['phone']) ? $stateAttributes['phone'] : fake()->phoneNumber;
        $zipcode = isset($stateAttributes['zipcode']) ? $stateAttributes['zipcode'] : fake()->numberBetween(1000,9000);
        $city = isset($stateAttributes['city']) ? $stateAttributes['city'] : fake()->city();

        $streetandnumber = explode("\n", $streetandnumber)[0];

        return [
            'code' => $code,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'birthdate' => $birthdate,
            'streetandnumber' => $streetandnumber,
            'zipcode' => $zipcode,
            'city' => $city,
            'phone' => $phone,
        ];
    }
}
