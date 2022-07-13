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

    'accepted' => ':attribute musí být přijatý.',
    'accepted_if' => ':attribute musí být přijatý, když :other je :value.',
    'active_url' => ':attribute není platná URL adresa.',
    'after' => ':attribute musí být datum po :date.',
    'after_or_equal' => ':attribute musí být datum po nebo rovno :date.',
    'alpha' => ':attribute musí obsahovat pouze písmena.',
    'alpha_dash' => ':attribute musí obsahovat pouze písmena, čísla, pomlčky a podtržítka.',
    'alpha_num' => ':attribute musí obsahovat pouze písmena a čísla.',
    'array' => ':attribute musí být pole.',
    'before' => ':attribute musí být datum před :date.',
    'before_or_equal' => ':attribute musí být datum před nebo rovno :date.',
    'between' => [
        'numeric' => ':attribute musí být mezi :min až :max.',
        'file' => ':attribute musí mít mezi :min až :max kilobytes.',
        'string' => ':attribute musí mít mezi :min až :max znaky.',
        'array' => ':attribute musí obsahovat :min až :max položky.',
    ],
    'boolean' => ':attribute pole musí být true nebo false.',
    'confirmed' => 'The :attribute confirmation does not match.',
    'current_password' => 'Heslo není správné.',
    'date' => ':attribute není platné datum.',
    'date_equals' => ':attribute musí být rovné :date.',
    'date_format' => ':attribute neodpovídá formátu :format.',
    'declined' => ':attribute musí být odmítnut.',
    'declined_if' => ':attribute musí být odmítnut, když :other je :value.',
    'different' => ':attribute a :other se musí lišit.',
    'digits' => ':attribute musí být :digits číslic.',
    'digits_between' => ':attribute musí mít :min až :max číslic.',
    'dimensions' => ':attribute má neplatné rozměry obrázku.',
    'distinct' => ':attribute pole má duplicitní hodnotu.',
    'email' => ':attribute musí být platná e-mailová adresa.',
    'ends_with' => ':attribute musí končit jednou z následujících hodnot: :values.',
    'enum' => 'Vybraný :attribute je neplatný.',
    'exists' => 'Vybraný :attribute je neplatný.',
    'file' => ':attribute musí být soubor.',
    'filled' => ':attribute pole musí mít hodnotu.',
    'gt' => [
        'numeric' => ':attribute musí být větší než :value.',
        'file' => ':attribute musí být větší než :value kilobytes.',
        'string' => ':attribute musí být větší než :value znaků.',
        'array' => ':attribute musí mít více než :value položek.',
    ],
    'gte' => [
        'numeric' => ':attribute musí být větší nebo roven :value.',
        'file' => ':attribute musí být větší nebo roven :value kilobytes.',
        'string' => ':attribute musí být větší nebo roven :value znaků.',
        'array' => ':attribute musí mít :value položek nebo více.',
    ],
    'image' => ':attribute musí být obrázek.',
    'in' => 'Vybraný :attribute je neplatný.',
    'in_array' => ':attribute pole neexistuje v :other.',
    'integer' => 'The :attribute musí být celé číslo.',
    'ip' => ':attribute musí být platná IP adresa.',
    'ipv4' => ':attribute musí být platná IPv4 adresa.',
    'ipv6' => ':attribute musí být platná IPv6 adresa.',
    'json' => ':attribute musí být platný JSON.',
    'lt' => [
        'numeric' => ':attribute musí být menší než :value.',
        'file' => ':attribute musí být menší než :value kilobytes.',
        'string' => ':attribute musí být menší než :value znaků.',
        'array' => ':attribute musí mít méně než :value položek.',
    ],
    'lte' => [
        'numeric' => ':attribute musí být menší nebo rovno :value.',
        'file' => ':attribute musí být menší nebo rovno :value kilobytes.',
        'string' => ':attribute musí být menší nebo rovno :value znaků.',
        'array' => ':attribute nesmí mít více než :value položek.',
    ],
    'mac_address' => ':attribute musí být platná MAC adresa.',
    'max' => [
        'numeric' => ':attribute nesmí být větší než :max.',
        'file' => ':attribute nesmí být větší než :max kilobytes.',
        'string' => ':attribute nesmí být větší než :max znaků.',
        'array' => ':attribute nesmí mít více než :max položek.',
    ],
    'mimes' => ':attribute musí být soubor typu: :values.',
    'mimetypes' => ':attribute musí být soubor typu: :values.',
    'min' => [
        'numeric' => ':attribute musí mít alespoň :min.',
        'file' => ':attribute musí mít alespoň :min kilobytes.',
        'string' => ':attribute musí mít alespoň :min znaků.',
        'array' => ':attribute musí mít alespoň :min položek.',
    ],
    'multiple_of' => ':attribute musí být násobkem :value.',
    'not_in' => 'Vybraný :attribute je neplatný.',
    'not_regex' => ':attribute formát je neplatný.',
    'numeric' => ':attribute musí být číslo.',
    'password' => 'Heslo je neplatné.',
    'present' => ':attribute pole musí být přítomno.',
    'prohibited' => ':attribute pole je zakázáno.',
    'prohibited_if' => ':attribute pole je zakázáno, když :other je :value.',
    'prohibited_unless' => ':attribute pole je zakázáno pokud není :other v :values.',
    'prohibits' => 'The :attribute field prohibits :other from being present.',
    'regex' => ':attribute formát je neplatný.',
    'required' => ':attribute pole je povinné.',
    'required_array_keys' => ':attribute pole musí obsahovat záznam pro: :values.',
    'required_if' => ':attribute pole je povinné, když :other je :value.',
    'required_unless' => ':attribute pole je povinné, pokud není :other v :values.',
    'required_with' => ':attribute pole je povinné, pokud :values je přítomno.',
    'required_with_all' => ':attribute pole je povinné, pokud :values jsou přítomné.',
    'required_without' => ':attribute pole je povinné, pokud :values nejsou přítomné.',
    'required_without_all' => ':attribute pole je povinné pokud žádná z :values není přítomna.',
    'same' => ':attribute a :other se musí shodovat.',
    'size' => [
        'numeric' => ':attribute musí být :size.',
        'file' => ':attribute musí být :size kilobytes.',
        'string' => ':attribute musí být :size znaků.',
        'array' => ':attribute musí obsahovat :size položek.',
    ],
    'starts_with' => ':attribute musí začínat jedním z následujících: :values.',
    'string' => ':attribute musí být řetězec.',
    'timezone' => ':attribute musí být platné časové pásmo.',
    'unique' => ':attribute už byl použit.',
    'uploaded' => ':attribute se nepodařilo nahrát.',
    'url' => ':attribute musí být platná URL',
    'uuid' => ':attribute must be a valid UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Statamic Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may validation messages for the custom rules provided by Statamic.
    |
    */

    'unique_entry_value' => 'Tato hodnota už byla použita.',
    'unique_user_value' => 'Tato hodnota už byla použita.',
    'duplicate_field_handle' => 'Pole s :handle nemůže být použito více než jednou.',
    'one_site_without_origin' => 'At least one site must not have an origin.',
    'origin_cannot_be_disabled' => 'Cannot select a disabled origin.',

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
