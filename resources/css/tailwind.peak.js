import plugin from 'tailwindcss/plugin'

export default {
    plugins: [
        plugin(function ({ matchUtilities, addBase, theme }) {
            matchUtilities(
                {
                    stack: (value) => ({
                        '> *': {
                            '--stack-space': value,
                        },
                        '> *:not(.no-space-y, .no-space-b) + *:not(.no-space-y, .no-space-t)': {
                            'margin-block-start': `var(--stack-item-space, var(--stack-space, ${theme(
                                'spacing.16'
                            )}))`,
                        },
                    }),
                    'stack-space': (value) => ({
                        '--stack-item-space': value,
                        '&:is([class*="stack-"][class*="stack-space-"] > *)': {
                            '--stack-item-space': value,
                        },
                    }),
                },
                { values: theme('spacing') }
            ),
            // Render screen names in the breakpoint display.
            addBase(Object.entries(theme('screens'))
                .filter((value) => typeof value[1] == 'string')
                .sort((a, b) => {
                    return (
                        a[1].replace(/\D/g, "") -
                        b[1].replace(/\D/g, "")
                    )
                })
                .map((value) => {
                    return {
                        [`@media (min-width: ${value[1]})`]: {
                            '.breakpoint::before': {
                                content: `"${value[0]}"`,
                            },
                        },
                    }
                })
            )
        }),
    ],
}
