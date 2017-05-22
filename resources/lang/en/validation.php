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

    'accepted'             => 'El :attribute puede ser aceptado.',
    'active_url'           => 'El :attribute no es una URL válida.',
    'after'                => 'El :attribute debe ser una fecha después de :date.',
    'alpha'                => 'El :attribute debe contener letras.',
    'alpha_dash'           => 'El :attribute solo puede tener letras, numeros, and signos.',
    'alpha_num'            => 'El :attribute solo puede tener letras y números.',
    'array'                => 'El :attribute debe ser un arreglo.',
    'before'               => 'El :attribute debe ser una fecha antes de :date.',
    'between'              => [
        'numeric' => 'El :attribute debe ser entre :min y :max.',
        'file'    => 'El :attribute debe ser entre :min y :max kilobytes.',
        'string'  => 'El :attribute debe ser entre :min y :max caracteres.',
        'array'   => 'El :attribute debe tener entre :min y :max items.',
    ],
    'boolean'              => 'The :attribute campo puede ser verdadero o falso.',
    'confirmed'            => 'El :attribute no se ha marcado la confirmación.',
    'date'                 => 'The :attribute no es una fecha válida.',
    'date_format'          => 'The :attribute does not match the format :format.',
    'different'            => 'The :attribute and :other must be different.',
    'digits'               => 'The :attribute must be :digits digits.',
    'digits_between'       => 'The :attribute must be between :min and :max digits.',
    'distinct'             => 'El :attribute field has a duplicate value.',
    'email'                => 'El :attribute debe ser una dirección de correo válida.',
    'exists'               => 'El selected :attribute is invalid.',
    'filled'               => 'El :attribute campo es requerido.',
    'image'                => 'El :attribute debe ser una imagen.',
    'in'                   => 'The selected :attribute is invalid.',
    'in_array'             => 'The :attribute field does not exist in :other.',
    'integer'              => 'The :attribute must be an integer.',
    'ip'                   => 'The :attribute must be a valid IP address.',
    'json'                 => 'The :attribute must be a valid JSON string.',
    'max'                  => [
        'numeric' => 'The :attribute no puede ser mas grande que :max.',
        'file'    => 'The :attribute no puede ser mas grande que :max kilobytes.',
        'string'  => 'The :attribute no puede ser mas grande que :max characters.',
        'array'   => 'The :attribute no puede ser mas grande que :max items.',
    ],
    'mimes'                => 'The :attribute must be a file of type: :values.',
    'min'                  => [
        'numeric' => 'El :attribute debe ser mayor a :min.',
        'file'    => 'EL :attribute debe ser mayor a :min kilobytes.',
        'string'  => 'El :attribute debe ser mayor a :min characters.',
        'array'   => 'El :attribute debe tener mayor a :min items.',
    ],
    'not_in'               => 'The selected :attribute is invalid.',
    'numeric'              => 'El :attribute debe ser un número.',
    'present'              => 'The :attribute field must be present.',
    'regex'                => 'The :attribute format is invalid.',
    'required'             => 'EL campo :attribute es obligatorio.',
    'required_if'          => 'EL campo :attribute es obligatorio cuando :other es :value.',
    'required_unless'      => 'The :attribute field is required unless :other is in :values.',
    'required_with'        => 'The :attribute field is required when :values is present.',
    'required_with_all'    => 'The :attribute field is required when :values is present.',
    'required_without'     => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same'                 => 'The :attribute and :other must match.',
    'size'                 => [
        'numeric' => 'EL :attribute debe ser :size.',
        'file'    => 'El :attribute debe ser :size kilobytes.',
        'string'  => 'El :attribute debe ser :size caracteres.',
        'array'   => 'El :attribute debe contener :size items.',
    ],
    'string'               => 'El :attribute debe ser una cadena de caracteres.',
    'timezone'             => 'EL :attribute debe ser una zona válida.',
    'unique'               => 'The :attribute has already been taken.',
    'url'                  => 'El :attribute formato es incorrecto.',

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
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
