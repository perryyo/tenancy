<?php

return [
    'identification' => [

        /**
         * Whether to initiate tenant identification early.
         *
         * @info This will set up a middleware with high priority to
         * resolve the Environment and run the tenant identification.
         *
         * @var bool
         */
        'eager' => true,
    ]
];
