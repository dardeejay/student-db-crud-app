<?php

class StudentHelper 
{
    /**
     * Formats a name in the format "last_name, first_name, middle_initial".
     * The middle initial is optional.
     *
     * @param string $lastName
     * @param string $firstName
     * @param string|null $middleName (optional)
     * @return string
     */
    public static function formatName($lastName, $firstName, $middleName = null)
    {
        // Start with the required parts
        $formattedName = "{$lastName}, {$firstName}";

        // Add the middle initial if provided
        if (!empty($middleName)) {
            $middleInitial = strtoupper($middleName[0]); // Get the first letter and capitalize it
            $formattedName .= ", {$middleInitial}.";
        }

        return $formattedName;
    }
}
