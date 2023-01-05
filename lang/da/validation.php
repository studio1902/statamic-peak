<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ':attribute skal accepteres.',
    'accepted_if' => ':attribute skal accepteres, når :other er :value',
    'active_url' => ':attribute er ikke en gyldig URL.',
    'after' => ':attribute skal være en dato efter :date.',
    'after_or_equal' => ':attribute skal være en dato efter eller lig med :date.',
    'alpha' => ':attribute må kun indeholde bogstaver.',
    'alpha_dash' => ':attribute må kun indeholde bogstaver, tal, bindestreger og understregninger.',
    'alpha_num' => ':attribute må kun indeholde bogstaver og tal.',
    'array' => ':attribute skal være et array.',
    'before' => ':attribute skal være en dato før :date.',
    'before_or_equal' => ':attribute skal være en dato før eller lig med :date.',
    'between' => [
        'numeric' => ':attribute skal være mellem :min og :max.',
        'file' => ':attribute skal være mellem :min og :max kilobyte.',
        'string' => ':attribute skal være mellem :min og :max tegn.',
        'array' => ':attribute skal have mellem :min og :max emner.',
    ],
    'boolean' => ':attribute felt skal være sandt eller falsk.',
    'confirmed' => ':attribute bekræftelse stemmer ikke overens.',
    'current_password' => 'Adgangskoden er forkert.',
    'date' => ':attribute er ikke en gyldig dato.',
    'date_equals' => ':attribute skal være en dato lig med :date.',
    'date_format' => ':attribute stemmer ikke overens med formatet :format.',
    'declined' => ':attribute skal afvises.',
    'declined_if' => ':attribute skal afvises når :other er :value.',
    'different' => ':attribute og :other skal være forskellige.',
    'digits' => ':attribute skal være :digits decimaler.',
    'digits_between' => ':attribute skal være mellem :min og :max decimaler.',
    'dimensions' => ':attribute har ugyldige billeddimensioner.',
    'distinct' => ':attribute felt har en dubletværdi.',
    'email' => ':attribute Skal være en gyldig e-mail-adresse.',
    'ends_with' => ':attribute skal slutte med en af følgende: :values.',
    'enum' => 'Den valgte :attribute er ikke gyldig.',
    'exists' => 'Den valgte :attribute eksistere allerede.',
    'file' => ':attribute skal være en fil.',
    'filled' => ':attribute feltet skal have en værdi.',
    'gt' => [
        'numeric' => ':attribute skal være større end :value.',
        'file' => ':attribute skal være større end :value kilobytes.',
        'string' => ':attribute skal være større end :value tegn.',
        'array' => ':attribute skal have mere end :value emner.',
    ],
    'gte' => [
        'numeric' => ':attribute skal være større end or equal to :value.',
        'file' => ':attribute skal være større end or equal to :value kilobytes.',
        'string' => ':attribute skal være større end or equal to :value tegn.',
        'array' => ':attribute skal have :value elementer eller flere.',
    ],
    'image' => ':attribute skal være et billede.',
    'in' => 'Den valgte :attribute er ikke gyldig.',
    'in_array' => ':attribute felt findes ikke i :other.',
    'integer' => ':attribute skal være et heltal.',
    'ip' => ':attribute skal være en gyldig IP-adresse.',
    'ipv4' => ':attribute skal være en gyldig IPv4-adresse.',
    'ipv6' => ':attribute skal være en gyldig IPv6-adresse.',
    'json' => ':attribute skal være en gyldig JSON-streng.',
    'lt' => [
        'numeric' => ':attribute skal være mindre end :value.',
        'file' => ':attribute skal være mindre end :value kilobytes.',
        'string' => ':attribute skal være mindre end :value karaktere.',
        'array' => ':attribute skal være mindre end :value elementer.',
    ],
    'lte' => [
        'numeric' => ':attribute skal være mindre end eller lig med :value.',
        'file' => ':attribute skal være mindre end eller lig med :value kilobytes.',
        'string' => ':attribute skal være mindre end eller lig med :value tegn.',
        'array' => ':attribute må ikke have mere end :value elementer.',
    ],
    'mac_address' => ':attribute skal være en gyldig MAC addresse.',
    'max' => [
        'numeric' => ':attribute må ikke være større end :max.',
        'file' => ':attribute må ikke være større end :max kilobytes.',
        'string' => ':attribute må ikke være større end :max tegn.',
        'array' => ':attribute må ikke have mere end :max elementer.',
    ],
    'mimes' => ':attribute skal være af fil type: :values.',
    'mimetypes' => ':attribute skal være en fil af typen: :values.',
    'min' => [
        'numeric' => ':attribute skal være mindst :min.',
        'file' => ':attribute skal være mindst :min kilobytes.',
        'string' => ':attribute skal være mindst :min tegn.',
        'array' => ':attribute skal have mindst :min elementer.',
    ],
    'multiple_of' => ':attribute must be a multiple of :value.',
    'not_in' => 'Den valgte :attribute er ugyldig.',
    'not_regex' => ':attribute format er ugyldig.',
    'numeric' => ':attribute skal være et nummer.',
    'password' => 'Adgangskoden er forkert.',
    'present' => ':attribute felt skal være til stede.',
    'prohibited' => ':attribute felt er forbudt.',
    'prohibited_if' => ':attribute felt er forbudt når :other er :value.',
    'prohibited_unless' => ':attribute felt er forbudt medmindre :other er en af :values.',
    'prohibits' => ':attribute felt forbyder :other fra at være til stede.',
    'regex' => ':attribute formatet er ugyldigt.',
    'required' => ':attribute felt er påkrævet.',
    'required_array_keys' => ':attribute feltet skal indeholder elementer til: :values.',
    'required_if' => ':attribute feltet er pøkrævet når :other er :value.',
    'required_unless' => ':attribute felt er påkrævet, medmindre :other er en af :values.',
    'required_with' => ':attribute felt er påkrævet når :values er tilstæde.',
    'required_with_all' => ':attribute felt er påkrævet når :values er til stede.',
    'required_without' => ':attribute felt er påkrævet når :values ikke er til stede.',
    'required_without_all' => ':attribute felt er påkrævet når ingen af :values er til stede. ',
    'same' => ':attribute og :other skal være ens.',
    'size' => [
        'numeric' => ':attribute skal være :size.',
        'file' => ':attribute skal være  :size kilobytes.',
        'string' => ':attribute skal være :size tegn.',
        'array' => ':attribute skal indeholde :size elementer.',
    ],
    'starts_with' => ':attribute skal starte med en af ​​følgende: :values.',
    'string' => ':attribute skal være en streng.',
    'timezone' => ':attribute skal være en gyldig tidszone.',
    'unique' => ':attribute er allerede taget.',
    'uploaded' => ':attribute kunne ikke uploade.',
    'url' => ':attribute skal være en gyldig URL.',
    'uuid' => ':attribute skal være et gyldigt UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Statamic Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may validation messages for the custom rules provided by Statamic.
    |
    */

    'unique_entry_value' => 'Denne værdi er allerede taget.',
    'unique_user_value' => 'Denne værdi er allerede taget.',
    'duplicate_field_handle' => 'Felt med handle af :handle kan ikke benyttes mere end en gang.',
    'one_site_without_origin' => 'Mindst ét ​​websted må ikke have en oprindelse.',
    'origin_cannot_be_disabled' => 'Kan ikke vælge en deaktiveret oprindelse.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
