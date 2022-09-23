const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
    darkMode: "class",
    
    theme: {
        extend: {
            colors: {
                brand: {
                    DEFAULT: "#005A5D",
                    50: "#EFF5F5",
                    100: "#CCDEDF",
                    200: "#99BDBE",
                    300: "#669C9E",
                    400: "#337B7D",
                    500: "#005A5D",
                    600: "#00484A",
                    700: "#003638",
                    800: "#002425",
                    900: "#001213",
                },
            },
            fontFamily: {
                sans: ["Inter var", ...defaultTheme.fontFamily.sans],
            },
        },
    },

    content: [
        "./app/**/*.php",
        "./resources/**/*.html",
        "./resources/**/*.js",
        "./resources/**/*.jsx",
        "./resources/**/*.ts",
        "./resources/**/*.tsx",
        "./resources/**/*.php",
        "./resources/**/*.vue",
        "./resources/**/*.twig",
    ],
    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
    ],
};
