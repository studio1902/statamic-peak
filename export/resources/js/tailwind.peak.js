import plugin from 'tailwindcss/plugin'

export default {
    plugins: [
        plugin(function ({ addBase, theme }) {
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
